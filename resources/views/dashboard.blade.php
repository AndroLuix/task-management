<!-- home.blade.php -->
@extends('layout.app')

@section('title', 'welcome to Accellera')
@include('layout.navbar')
@section('content')

<div class="min-h-screen flex flex-col  justify-center">
    <div class=" mx-auto">
        <div class="mb-10">
            <h1 class="text-3xl font-bold underline mb-4">
                Hello!
            </h1>
            <div id="imageContainer" style="position: relative;">
                <img id="movingImage" src="{{ asset('img/dot-arrow.png') }}" width="75" height="75" 
                style="position:absolute; left:0; z-index: 999;">
                <p id="hiddenText" class="text-lg hiddenText" style="opacity: 0;">
                    Welcome to Accellera. <br> 
                    We're glad to have you here!
                </p>
            </div>
            <div class="mt-20">Manage Your Task for Your Business</div>
        </div>
        <div class=" text-center">
           
        </div>
    </div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        var image = document.getElementById('movingImage');
        var hiddenText = document.getElementById('hiddenText');

        image.addEventListener('animationend', function() {
            hiddenText.style.opacity = '1';
        });
        
        image.classList.add('moveAnimation');
    });
</script>

<style>
    @keyframes moveImage {
        0% { left: 0; }
        100% { left: 260px; } /* Cambia questo valore in base alle tue preferenze */
    }

    @keyframes fadeInText {
        0% { opacity: 0; }
        80% { opacity: 0; }
        100% { opacity: 1; }
    }

    .hiddenText {
        opacity: 0;
        animation: fadeInText 3s forwards;
    }

    .moveAnimation {
        animation: moveImage 3s forwards;
    }

    @media (max-width: 640px) {
        #imageContainer {
            position: relative;
            left: 0;
        }
        @keyframes moveImage {
        0% { left: 0; }
        100% { left: 80%; } /* Cambia questo valore in base alle tue preferenze */
    }

        #movingImage {
            position: static;
        }

        #hiddenText {
            opacity: 1;
            position: static;
        }

        .mt-20 {
            margin-top: 2rem;
        }

        .m-5 {
            margin: 1.25rem;
        }
        #hiddenText{
            width: 80%;
        }
    }
</style>
@endsection
