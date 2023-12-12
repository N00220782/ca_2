@extends('layouts.myApp')
    @section('header')
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ $venue->name }}
        </h2>
    @endsection

    @section('content')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <p><b>Name:</b> {{ $venue->name }}</p>
                    <p><b>Address:</b> {{ $venue->address }}</p> 
                    <p><b>Capacity:</b> {{ $venue->capacity }}</p>
                    <p><b>Phone Number:</b> {{ $venue->phone }}</p> 
                    <p><b>Email Address:</b> {{ $venue->email }}</p>
                    <br>
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    Show(s) playing in this venue:
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Date:
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($venue->shows as $show)
                            <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                                <td class="px-6 py-4">
                                    {{ $show->name }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $show->date }}
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <br>
                </div>
            </div>
        </div>
    </div>

    @endsection