<!-- home.blade.php -->
@extends('layout.app')

@section('title', 'welcome to Accellera')
@include('layout.navbar')
@section('content')

    <div class="min-h-screen flex flex-col justify-center">
        <div class=" mx-auto">
            <div class="mb-10">
                <h1 class="text-3xl font-bold underline mb-5">
                    Hello {{ Auth::user()->name }}!
                </h1>
                <div id="imageContainer" style="position: relative;">
                    <img id="movingImage" src="{{ asset('img/dot-arrow.png') }}" width="75" height="75"
                        style="position:absolute; left:0;">
                    <p id="hiddenText" class="text-lg hiddenText" style="opacity: 0;">
                        Welcome to Accellera. <br>
                        We're glad to have you here!
                    </p>
                </div>
                <div class="mt-20">Manage Your Task for Your Project</div>


               
            </div>

            @if (session('success'))
            <div id="pop-up" class="bg-green-100 border border-green-400 m-5 text-green-700 px-4 p-3 rounded relative"
                role="alert">
                <span class="block sm:inline">{{ session('success') }}</span>
                <span onclick="closeAlert('pop-up')" class="absolute top-0 bottom-0 right-0 px-4 py-3">
                    <svg  class="fill-current h-6 w-6 text-green-500" role="button"
                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                        <title>Close</title>
                        <path
                            d="M14.348 14.849a1.2 1.2 0 0 1-1.697 1.697l-2.651-2.651-2.651 2.651a1.2 1.2 0 1 1-1.697-1.697l2.651-2.651-2.651-2.651a1.2 1.2 0 1 1 1.697-1.697l2.651 2.651 2.651-2.651a1.2 1.2 0 0 1 1.697 1.697l-2.651 2.651 2.651 2.651z" />
                    </svg>
                </span>
            </div>
        @endif
        </div>



        @if (Auth::user()->is_manager == 1)
            <div class=" text-center mt-20">
                <div>
                    <a href="#form-folder" onclick="toggleForm('form-folder')"
                        class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">
                        Create a Folder <span><i class="fa fa-folder ml-2" aria-hidden="true"></i>
                        </span>
                    </a>
                    <p class="text-xl  p-5 font-semibold text-white-600/100 dark:text-white-500/100">
                        Create a folder to be able to store projects inside and better organize your work!

                       
                    </p>

                </div>
            </div>
        @endif

        <div id="form-folder" style="display: none" class=" text-center mt-20">
            <!-- form -->
            @include('folder.create-popup')
        </div>

        
    </div>

    @if (count($folders) > 0)
    <div class=" text-center mt-20">
        <div>
            <a href="#form-project-in" onclick="toggleForm('form-project')"
                class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">
                Create a Project <span><i class="fa fa-chevron-circle-right" aria-hidden="true"></i>

                </span>
            </a>
            <p class="text-xl  p-5 font-semibold text-white-600/100 dark:text-white-500/100">
                Create a project to get started
            </p>

        </div>
    </div>
@endif

<div id="form-project" style="display: none" class=" text-center mt-20">
    <!-- form -->
    @include('projects.create-popup')
</div>





    <script src="{{ asset('js/toggleForm.js') }}"></script>
    <script src="{{ asset('js/dashboard.js') }}"></script>

@endsection
