@extends('layouts.myApp')

    @section('header')
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Venues') }}
        </h2>
    @endsection

@section('content')

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">

                        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="px-6 py-3">
                                        Name
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Address
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Capacity
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Phone Number
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Email Address
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Action
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                    
                                @forelse($venues as $venue)
                                <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        {{ $venue->name }}
                                    </th>
                                    <td class="px-6 py-4">
                                        {{ $venue->address }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $venue->capacity }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $venue->phone }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $venue->email }}
                                    </td>
                                    <td class="px-6 py-4">
                                        <a href="{{ route('venues.show', $venue->id) }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">View</a>
                                    </td>
                                </tr>
                                @empty
                                    <h4>No venues found!</h4>
                                @endforelse
                            </tbody>
                        </table>
                        {{ $venues->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection