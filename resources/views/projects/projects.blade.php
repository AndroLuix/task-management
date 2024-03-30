<!-- home.blade.php -->
@extends('layout.app')

@section('title', 'Projects | Accellera')
@include('layout.navbar')

@section('content')
    <div class="flex flex-wrap justify-center">
        <div class="w-full md:w-1/2 p-4">
            <!-- Visualizzazione dei progetti -->
            <div class="bg-gray-800 rounded-lg p-4">
                <h2 class="text-white text-2xl font-semibold mb-4">Projects</h2>
              
               
                <div class="max-w-sm w-full lg:max-w-full lg:flex">
                    <div class="h-48 lg:h-auto lg:w-48 flex-none bg-cover rounded-t lg:rounded-t-none lg:rounded-l text-center overflow-hidden" style="background-image: url('/img/card-left.jpg')" title="Woman holding a mug">
                    </div>
                    <div class="border-r border-b border-l border-gray-400 lg:border-l-0 lg:border-t lg:border-gray-400 bg-white rounded-b lg:rounded-b-none lg:rounded-r p-4 flex flex-col justify-between leading-normal">
                      <div class="mb-8">
                        <p class="text-sm text-gray-600 flex items-center">
                          
                        </p>
                        <div class="text-gray-900 font-bold text-xl mb-2">{{$projectFirst->title}}</div>
                        <p class="text-gray-700 text-base">{{$projectFirst->description}}</p>
                      </div>
                      <div class="flex items-center">
                        @isset($projectFirst->propic)
                        <img class="w-10 h-10 rounded-full mr-4" 
                        src="{{$projectFirst->propic}}" >
                         @else 
                            <a href="{{ route('project.edit', $projectFirst->id) }}"
                            class="focus:outline-none 
                            text-white bg-green-700 hover:bg-green-800 
                            focus:ring-4 focus:ring-green-300 font-medium rounded-lg 
                            text-sm px-5 py-2.5 me-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 
                            dark:focus:ring-green-800">
                            Add File</a>
                         
                        @endisset

                        


                        
                        <div class="text-sm">

                            @if($projectFirst->is_private = 1)
                            <a  class="text-white bg-gradient-to-br from-purple-600 to-blue-500 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2 make-pointer" title="Publish your project" >Your project is private</a>
                            @else
                            <a  class="text-gray-900 bg-gradient-to-r from-red-200 via-red-300 to-yellow-200 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-red-100 dark:focus:ring-red-400 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2 make-pointer" title="Make Private">Your project is Public</a>
                            @endif

                            <p class="mt-5 mb-3 text-gray-500 dark:text-gray-400">Created at {{$projectFirst->created_at}}</p>

                        </div>
                      </div>
                    </div>
                  </div>
            </div>
        </div>

        <div class="w-full md:w-1/2 p-4">
            <!-- Form per creare un nuovo progetto -->
            <div class="bg-gray-800 rounded-lg p-4">
                <h2 class="text-white text-2xl font-semibold mb-4">Create Project</h2>
            </div>
        </div>
    </div>
</div>


@endsection
