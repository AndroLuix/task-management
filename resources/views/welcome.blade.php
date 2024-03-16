<!-- home.blade.php -->
@extends('layout.app')

@section('title', 'Welcome')

@section('content')
<div class="min-h-screen flex items-center justify-center">
    <div class="max-w-4xl mx-auto grid grid-cols-2 gap-5">
        <div class="col-span-1">
            <div class="text-center">
                <h1 class="text-3xl font-bold underline mb-4">
                    Hello!
                </h1>
                <p class="text-lg">
                    Welcome to Task Management. We're glad to have you here!
                </p>
            </div>
        </div>
        <div class="col-span-1 m-5">
            <div class="flex flex-col justify-end items-end h-full">
                <div>
                   <a href="{{ route('login') }}"><h2 class="text-2xl font-semibold mb-4">Login</h2></a>
                 
                    <p class="mt-4 text-sm">You don't have an account? 
                        <a href="{{ route('register') }}" class="bg-white hover:bg-gray-100 text-gray-800 font-semibold py-2 px-4 border border-gray-400 rounded shadow m-2">Sign in</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
