@extends('layouts.admin')
    @section('header')
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ $show->name }} ({{ $show->date }})
        </h2>
    @endsection

    @section('content')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="content flex p-6 text-gray-900 dark:text-gray-100">
                    <div>
                    <img class="rounded" width="400" src={{ asset("storage/images/" . $show->show_image) }} />
                </div><div class="ml-4">
                    <p><b>Date:</b> {{ $show->date }}</p> 
                    <p><b>Start Time:</b> {{ $show->start_time }}</p>
                    <p><b>End Time:</b> {{ $show->end_time }}</p>
                    <p><b>Ticket Price:</b> {{ $show->ticket_price }}</p>
                    <p><b>Description:</b> {{ $show->description }}</p>
                    <p><b>Venue:</b> {{ $show->venue->name }}</p> 
                    <p><b>Artist(s):</b>
                        @foreach($show->artists as $artist)
                        {{ $artist->name }}
                        @endforeach
                    </p>
                        <a href="{{ route('admin.shows.edit', $show->id) }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                        <form method="POST" action="{{ route('shows.destroy', $show->id) }}">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Delete</button>
                        </form>
                </div>
                
            </div>
        </div>
    </div>
</div>

@endsection