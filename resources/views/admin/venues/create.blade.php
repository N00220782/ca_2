@extends('layouts.admin')
@section('header')
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create a Venue') }}
        </h2>
@endsection
@section('content')
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="my-6 p-6 bg-white border-b border-gray-200 shadow-sm sm:rounded-lg">
            <form enctype="multipart/form-data" action="{{ route('admin.venues.store') }}" method="post">
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
                    name="address"
                    field="address"
                    placeholder="Address"
                    class="w-full"
                    autocomplete="off"
                    :value="@old('address')"></x-text-input>

                    <br>
                <br>

                <x-text-input
                    type="text"
                    name="capacity"
                    field="capacity"
                    placeholder="Capacity"
                    class="w-full"
                    autocomplete="off"
                    :value="@old('capacity')"></x-text-input>

                    <br>
                <br>

                <x-text-input
                    type="text"
                    name="phone"
                    field="phone"
                    placeholder="Phone Number"
                    class="w-full"
                    autocomplete="off"
                    :value="@old('phone')"></x-text-input>

                    <br>
                <br>

                <x-text-input
                    type="text"
                    name="email"
                    field="email"
                    placeholder="Email Address"
                    class="w-full"
                    autocomplete="off"
                    :value="@old('email')"></x-text-input>

                <x-primary-button class="mt-6">Save Venue</x-primary-button>
            </form>
        </div>
    </div>
</div>
@endsection