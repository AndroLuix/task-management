<!-- home.blade.php -->
@extends('layout.app')

@section('title', 'welcome to Accellera')
@include('layout.navbar')
@section('content')

    <div class="min-h-screen flex flex-col  justify-center">
        <div class=" mx-auto">
            <div class="mb-10">
                <h1 class="text-3xl font-bold underline mb-5">
                    Hello {{ Auth::user()->name }}!
                </h1>
                <div id="imageContainer" style="position: relative;">
                    <img id="movingImage" src="{{ asset('img/dot-arrow.png') }}" width="75" height="75"
                        style="position:absolute; left:0; z-index: 999;">
                    <p id="hiddenText" class="text-lg hiddenText" style="opacity: 0;">
                        Welcome to Accellera. <br>
                        We're glad to have you here!
                    </p>
                </div>
                <div class="mt-20">Manage Your Task for Your Project</div>
            </div>
            
        </div>
        <div class=" text-center mt-20">
            <div>
                <a href=""
                    class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">
                    Create a Folder <span><i class="fa fa-folder ml-2" aria-hidden="true"></i>
                    </span>
                </a>
                <p class="text-xl  p-5 font-semibold text-white-600/100 dark:text-white-500/100">
                    Create a folder to be able to store projects inside and better organize your work!
                </p>
    
            </div>
        </div>
    </div>

 

    <script src="{{ asset('js/dashboard.js') }}"></script>

@endsection
