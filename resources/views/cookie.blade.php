@extends('layout.app')

@section('title', 'Welcome')

@section('content')
<h1 class="text-3xl font-bold mb-4">Cookie Policy</h1>
 <style>
    tr{
        border: solid 1px white;
    }
 </style>
<p>...</p>
<h2 class="text-2xl font-semibold mt-8 mb-4">How do we use cookies?</h2>
@foreach(Cookies::getCategories() as $category)
<table class="w-full mb-8">
    <caption class="text-lg font-semibold mb-4">{{ $category->title }}</caption>
    <thead>
        <tr>
            <th class="px-4 py-2 bg-dark-200">Cookie</th>
            <th class="px-4 py-2 bg-dark-200">Description</th>
            <th class="px-4 py-2 bg-dark-200">Duration</th>
        </tr>
    </thead>
    <tbody>
        @foreach($category->getCookies() as $cookie)
        <tr>
            <td class="px-4 py-2">{{ $cookie->name }}</td>
            <td class="px-4 py-2">{{ $cookie->description }}</td>
            <td class="px-4 py-2">{{ \Carbon\CarbonInterval::minutes($cookie->duration)->cascade() }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
@endforeach

<p>...</p>

@endsection
