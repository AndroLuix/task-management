@extends('layout.app')

@section('Your Folders | Accellera', 'welcome to Accellera')
@include('layout.navbar')
@section('content')
    <style>
        .fa-plus {
            padding: 5px;

            transition: all 1s
        }

        .fa-plus:hover {
            background: green;
            border-radius: 20%;
        }

        .float-r {
            float: right;
        }

        .make-pointer:hover {
            cursor: pointer;
        }

        .myborder {
            border: solid 1px black;
            border-radius: 20%;
            padding: 10px;
        }
    </style>
    <div class="grid grid-cols-3 gap-4">
        <div class="col-span-2">
            <div class="max-width: 1024px m-20">
                <table
                    class="w-full border-collapse border border-gray-800 dark:border-gray-700 bg-gray-900 dark:bg-gray-800">
                    <thead>
                        <tr>
                            <th
                                class="py-2 px-4 bg-gray-700 dark:bg-gray-600 border border-gray-800 dark:border-gray-700 text-gray-300 dark:text-gray-300">
                                Folder
                                <span onclick="toggleForm('form-folder')" title="Create a new Folder"> <i class="fa fa-plus"
                                        style="float: right" aria-hidden="true"> </i></span>

                            </th>

                            <th
                                class="py-2 px-4 bg-gray-700 dark:bg-gray-600 border border-gray-800 dark:border-gray-700 text-gray-300 dark:text-gray-300">
                                Projects</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($folders as $folder)
                            <tr>
                                <td
                                    class="py-2 px-2 border border-gray-800 dark:border-gray-700 text-gray-300 dark:text-gray-300">
                                    {{ $folder->name }}
                                    <span
                                        onclick="toggleFormWithParam('form-project', '{{ $folder->name }}',{{ $folder->id }}) "
                                        title="Create a new project in {{ $folder->name }}">
                                        <i class="fa fa-plus" style="float: right" aria-hidden="true">
                                        </i>

                                    </span>
                                </td>
                                <td
                                    class="py-2 px-4 border border-gray-800 dark:border-gray-700
                                     text-gray-300 dark:text-gray-300">
                                    @if ($folder->projects->count() > 0)
                                        <ul class="p-2 ml-5">
                                            @foreach ($folder->projects as $project)
                                                <li class="p-3">{{ $project->title }}

                                                    <!-- sposta progetto a una cartella -->
                                                    <div class=" myborder make-pointer float-r mx-1"
                                                        title="move the project {{ $project->title }}"
                                                        onclick="ExchageProject('form-exchange-project',
                                            {{ $project->id }},
                                             '{{ $project->title }}')">
                                                        <i class=" fa fa-arrow-up " aria-hidden="true"></i>
                                                        <i class=" fa fa-arrow-down" aria-hidden="true"></i>
                                                    </div>


                                                    <!-- aggiungi membri -->
                                                    <div class="make-pointer float-r mx-3" title="Add">
                                                        <i class=" myborder fa fa-users" aria-hidden="true"></i>
                                                    </div>

                                                    <!-- modifica -->
                                                    <div class="make-pointer float-r mx-3" title="Edit project">
                                                        <i class="myborder fa fa-pencil-square-o"></i>
                                                    </div>

                                                   
                                                      
                                                        

                                                        <form action="{{ route('project.archive', $project->id ) }}"
                                                            method="POST"
                                                            style="margin: 0; margin-left: 20px; padding"


                                                        class="  make-pointer float-r mx-3
                                                        
                                                            title="Archive">
                                                            @csrf
                                                         @method('PUT')    
                                                         <button type="submit" class="myborder fa fa-archive @if ($project->is_archived == 1) bg-yellow-600 @endif hover:bg-cyan-600"" aria-hidden="true"></i>
                                                        
                                                        </form>


                                                   
                                                           
                                                                                                        

                                                       
                                                    
                                                </li>


                                                <hr>

                                                <!-- Aggiungi qui altri dettagli del progetto se necessario -->
                                            @endforeach
                                        </ul>
                                    @else
                                        <p class="font-normal text-gray-500 dark:text-gray-400">No projects</p>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>



        <!-- POPUP-->

        <div id="form-project" style="display: none" class=" text-center mt-20">
            <!-- form project-->

            @include('projects.create-popup')
        </div>


        <div>
            <div id="form-folder" style="display: none" class=" text-center mt-20">
                <!-- form folder -->

                @include('folder.create-popup')

            </div>
        </div>



        <div>
            <div id="form-exchange-project" style="display: none" class=" text-center mt-20">
                <!-- form exchange project -->

                @include('projects.exchange-popup')
            </div>
        </div>





    </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script src="{{ asset('js/toggleForm.js') }}"></script>
    <script src="{{ asset('js/exchange.js') }}"></script>


@endsection
