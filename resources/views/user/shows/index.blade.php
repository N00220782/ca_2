@extends('layouts.myApp')

    @section('header')
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Shows') }}
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
                                        Date
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Start Time
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        End Time
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Ticket Price
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Venue
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Action
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                    
                                @forelse($shows as $show)
                                <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        {{ $show->name }}
                                    </th>
                                    <td class="px-6 py-4">
                                        {{ $show->date }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $show->start_time }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $show->end_time }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $show->ticket_price }}
                                    </td>
                                     <td class="px-6 py-4">
                                        {{ $show->venue->name }} 
                                    </td> 
                                    <td class="px-6 py-4">
                                        <a href="{{ route('shows.show', $show->id) }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">View</a>
                                    </td>
                                </tr>
                                @empty
                                    <h4>No Shows found!</h4>
                                @endforelse
                            </tbody>
                        </table>
                        {{ $shows->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection