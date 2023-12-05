@extends('layouts.admin')
@section('header')
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit') }}: {{ $show->name }} ({{ $show->date }})
        </h2>
@endsection
@section('content')
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="my-6 p-6 bg-white border-b border-gray-200 shadow-sm sm:rounded-lg">
            <form enctype="multipart/form-data" action="{{ route('admin.shows.update', $show->id) }}" method="post">
                @csrf
                <x-text-input
                    type="text"
                    name="name"
                    field="name"
                    placeholder="Name"
                    class="w-full"
                    autocomplete="off"
                    :value="@old('name')"></x-text-input>

                    <br>
                <br>

                <x-text-input
                    type="text"
                    name="date"
                    field="date"
                    placeholder="Date"
                    class="w-full"
                    autocomplete="off"
                    :value="@old('date')"></x-text-input>

                    <br>
                <br>

                <x-text-input
                    type="text"
                    name="start_time"
                    field="start_time"
                    placeholder="Start Time"
                    class="w-full"
                    autocomplete="off"
                    :value="@old('start_time')"></x-text-input>

                    <br>
                <br>

                <x-text-input
                    type="text"
                    name="end_time"
                    field="end_time"
                    placeholder="End Time"
                    class="w-full"
                    autocomplete="off"
                    :value="@old('end_time')"></x-text-input>

                    <br>
                <br>

                <x-text-input
                    type="text"
                    name="ticket_price"
                    field="ticket_price"
                    placeholder="Ticket Price"
                    class="w-full"
                    autocomplete="off"
                    :value="@old('ticket_price')"></x-text-input>

                    <br>
                <br>

                <textarea
                    name="description"
                    rows="10"
                    field="description"
                    placeholder="Description"
                    class="w-full mt-6"
                    :value="@old('description')"></textarea>

                    <br>
                <br>

                <div class="form-group">
                    <label for="venue">Venue</label>
                    <select name="venue_id">
                        @foreach($venues as $venue)
                            <option {{old('venue_id') == $venue->id ? "selected" : ""}} value="{{$venue->id}}">{{$venue->name}}</option>
                        @endforeach
                    </select>
                 </div>

                <br>

                <div class="form-group">
                    <label for="artists"> <strong> Artists</strong> <br> </label>
                    @foreach($artists as $artist)
                        <input id="{{$artist->id}}" type="checkbox", value="{{$artist->id}}" name="artists[]">
                       <label for="{{$artist->id}}">{{$artist->name}}</label>
                       <br>
                    @endforeach
                </div>

                <input
                    type="file"
                    name="show_image"
                    placeholder="Show image"
                    class="w-full mt-6"
                    field="show_image"
                />

                <x-primary-button class="mt-6">Save Show</x-primary-button>
            </form>
        </div>
    </div>
</div>
@endsection