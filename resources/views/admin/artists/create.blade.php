@extends('layouts.admin')
@section('header')
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create an Artist') }}
        </h2>
@endsection
@section('content')
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="my-6 p-6 bg-white border-b border-gray-200 shadow-sm sm:rounded-lg">
            <form enctype="multipart/form-data" action="{{ route('admin.artists.store') }}" method="post">
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

                <div class="form-group">
                        <label for="genre">Genre</label>
                        <select id="genre" name="genre">
                            <option value="Pop">Pop</option>
                            <option value="Rock">Rock</option>
                            <option value="Metal">Metal</option>
                            <option value="Jazz">Jazz</option>
                            <option value="Hip Hop">Hip Hop</option>
                            <option value="Electronic">Electronic</option>
                        </select>
                     </div>

                <x-primary-button class="mt-6">Save Artist</x-primary-button>
            </form>
        </div>
    </div>
</div>
@endsection