<!-- home.blade.php -->
@extends('layout.app')

@section('title', 'welcome to Accellera')
@include('layout.navbar')
@section('content')

<div class="min-h-full flex items-center justify-center">
    <div class="col-span-1">
        <div class="text-center">
            <h1 class="text-3xl font-bold mb-4">
                Hello!
            </h1>
            
            <div id="imageContainer" class="mb-10" style="position: relative;">
                <img id="movingImage" src="{{asset('img/dot-arrow.png')}}" width="75" height="75" 
                style="position:absolute; left:0; z-index: 999;">
                <p id="hiddenText" class="text-lg"  style="opacity: 0;">
                    Welcome to Accellera. <br> 
                    We're glad to have you here!
                </p>
            </div>
            <div class="mt-20">Manage Your Task for Your Business</div>
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
        hiddenText.style.width = thirdWidth + 'px';
    });
</script>

<style>
    @keyframes moveImage {
        0% { left: 0; }
        100% { left: 240px; } /* Change this value based on your preference */
    }

    .moveAnimation {
        animation: moveImage 3s forwards;
    }
</style>

@endsection
