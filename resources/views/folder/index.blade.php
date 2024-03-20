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
    </style>
    <div class="max-width: 1024px m-20">
        <table class="w-full border-collapse border border-gray-800 dark:border-gray-700 bg-gray-900 dark:bg-gray-800">
            <thead>
                <tr>
                    <th
                        class="py-2 px-4 bg-gray-700 dark:bg-gray-600 border border-gray-800 dark:border-gray-700 text-gray-300 dark:text-gray-300">
                        Folder</th>
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
                            <span>
                                <a href="#"  title="Create a new project in {{$folder->name}}" >
                                    <i class="fa fa-plus" style="float: right" aria-hidden="true">
                                    </i>
                                </a>
                            </span>
                        </td>
                        <td class="py-2 px-4 border border-gray-800 dark:border-gray-700 text-gray-300 dark:text-gray-300">
                            @if ($folder->projects->count() > 0)
                                <ul>
                                    @foreach ($folder->projects as $project)
                                        <li>{{ $project->title }}</li>
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
    <script src="{{ asset('js/dashboard.js') }}"></script>
@endsection
