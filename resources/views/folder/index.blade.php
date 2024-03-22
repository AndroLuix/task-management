@extends('layout.app')

@section('Your Folders', 'welcome to Accellera')
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
        .make-pointer:hover{
            cursor: pointer;
        }
    </style>
    <div class="max-width: 1024px m-20">
        <table class="w-full border-collapse border border-gray-800 dark:border-gray-700 bg-gray-900 dark:bg-gray-800">
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
                        <td class="py-2 px-2 border border-gray-800 dark:border-gray-700 text-gray-300 dark:text-gray-300">
                            {{ $folder->name }}
                            <span onclick="toggleFormWithParam('form-project', '{{$folder->name}}',{{$folder->id}})" title="Create a new project in {{ $folder->name }}">
                                <i class="fa fa-plus" style="float: right" aria-hidden="true">
                                </i>

                            </span>
                        </td>
                        <td class="py-2 px-4 border border-gray-800 dark:border-gray-700 text-gray-300 dark:text-gray-300">
                            @if ($folder->projects->count() > 0)
                                <ul>
                                    @foreach ($folder->projects as $project)
                                        <li>{{ $project->title }}
                                           <div class="make-pointer float-r" title="move the project {{$project->title}}"
                                            onclick="ExchageProject('form-exchange-project',
                                            {{$project->id}},
                                             '{{ $project->title}}')">
                                            <i  class=" fa fa-arrow-up" aria-hidden="true"></i>
                                            <i  class=" fa fa-arrow-down" aria-hidden="true"></i>
                                        </div>
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

    <div id="form-project" style="display: none" class=" text-center mt-20">
        <!-- form -->
        @include('projects.create-popup')
    </div>

    <div>
        <div id="form-folder" style="display: none" class=" text-center mt-20">
            <!-- form -->
            @include('folder.create-popup')
        </div>
    </div>
    
    <div>
        <div id="form-exchange-project" style="display: none" class=" text-center mt-10">
            <!-- form exchange project -->
           @include('projects.exchange-popup')
        </div>
    </div>

    





    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script src="{{ asset('js/toggleForm.js') }}"></script>
    <script src="{{ asset('js/exchange.js') }}"></script>

@endsection
