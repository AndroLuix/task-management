<!-- home.blade.php -->
@extends('layout.app')

@section('title', 'Welcome to Accellera')
@include('layout.navbar')

@section('content')
<div class="flex flex-wrap justify-center">
    <div class="w-full md:w-1/2 p-4">
        <!-- Visualizzazione dei progetti -->
        <div class="bg-gray-800 rounded-lg p-4">
            <h2 class="text-white text-2xl font-semibold mb-4">Projects</h2>
            <!-- Inserisci qui la tua logica per visualizzare i progetti -->
            <!-- Esempio: -->
            <ul class="text-white">
                <li>Project 1</li>
                <li>Project 2</li>
                <li>Project 3</li>
            </ul>
        </div>
    </div>

    <div class="w-full md:w-1/2 p-4">
        <!-- Form per creare un nuovo progetto -->
        <div class="bg-gray-800 rounded-lg p-4">
            <h2 class="text-white text-2xl font-semibold mb-4">Create Project</h2>
            <form action="{{ route('projects.store') }}" method="POST">
                @csrf
                <div class="mb-4">
                    <label for="project_name" class="block text-white">Project Name:</label>
                    <input type="text" id="project_name" name="project_name
