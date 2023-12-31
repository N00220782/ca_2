@extends('layouts.admin')
    @section('header')
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ $artist->name }}
        </h2>
    @endsection

    @section('content')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <p><b>Name:</b> {{ $artist->name }}</p>
                    <p><b>Genre:</b> {{ $artist->genre }}</p> 
                    <br>
                    <a href="{{ route('admin.artists.edit', $artist->id) }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                    <form method="POST" action="{{ route('artists.destroy', $artist->id) }}">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Delete</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @endsection