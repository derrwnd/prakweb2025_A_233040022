<?php $title = 'Dashboard'; ?>
<x-dashboard-layout :$title>
    <h1 class="text-2xl font-bold mb-6">Welcome, {{ auth()->user()->name }}</h1>

    {{-- Success Alert --}}
    @if(session('success'))
    <div class="flex items-center p-4 mb-4 text-sm text-fg-success-strong rounded-base bg-success-soft border border-success-subtle" role="alert">
        <svg class="w-4 h-4 me-2 shrink-0" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
            width="24" height="24" fill="none" viewBox="0 0 24 24">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M10 11h2v5m-2-.5h4m2-2.5-8.5h.01M21 12a9 9 0 1-1-18 0 9 0 0 1 18 0Z" />
        </svg>
        <p class="flex-1"><span class="font-medium me-1">Success!</span> {{ session('success') }}</p>
        <button type="button" onclick="this.parentElement.remove()"
            class="ms-auto -mx-1.5 -my-1.5 bg-success-soft text-fg-success-strong rounded-base focus:ring-2 focus:ring-success-subtle p-1.5 hover:bg-success-medium inline-flex items-center justify-center h-8 w-8">
            <span class="sr-only">Close</span>
            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                viewBox="0 0 14 14">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="m1 1 6 6m0 0 6 6M7 7l-6 6m6-6 6-6" />
            </svg>
        </button>
    </div>
    @endif

    {{-- Header with Search and Add Post Button --}}
    <div class="px-6 py-4 border-b border-gray-200 flex justify-between items-center gap-4 bg-blue-50 rounded-t-lg">
        <form method="GET" action="{{ route('dashboard.index') }}" class="flex-1 max-w-md">
            <label for="search" class="sr-only">Search</label>
            <div class="relative">
                <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                    <svg class="w-4 h-4 text-body" aria-hidden="true"
                         xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-width="2"
                              d="m21 21-3.5-3.5M17 10a7 7 0 1 1-14 0 7 7 0 0 1 14 0Z" />
                    </svg>
                </div>
                <input type="search" name="search" id="search"
                       value="{{ request('search') }}"
                       class="block w-full p-3 ps-9 bg-white border border-gray-300 text-heading text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 shadow-xs placeholder:text-body"
                       placeholder="Search posts..." />
                <button type="submit"
                        class="absolute end-1.5 bottom-1.5 text-white bg-blue-600 hover:bg-blue-700 box-border border border-transparent focus:ring-4 focus:ring-blue-300 shadow-xs font-medium leading-5 rounded text-xs px-3 py-1.5 focus:outline-none">
                    Search
                </button>
            </div>
        </form>
        <a href="{{ route('dashboard.create') }}"
           class="inline-flex items-center px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white font-medium rounded-lg shadow-sm transition-colors duration-200 whitespace-nowrap">
            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M12 4v16m8-8H4" />
            </svg>
            Add Post
        </a>
    </div>

    @include('components.table')

</x-dashboard-layout>