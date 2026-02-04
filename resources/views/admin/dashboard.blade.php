 {{-- <x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>d
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                 <div class="p-6 text-gray-900">
                    {{ __("You're logged in!") }}
                
                </div>
            </div>
        </div>
    </div>
</x-app-layout> --}}

@extends('layouts.app')
@section('title', 'Dashboard')
@section('content')
<div class="container-fluid">
    <div class="block-header">
        <h2>DASHBOARD</h2>
        <i class="fas fa-star"></i>
    </div>
    <!-- test -->
   <div class="flex items-center justify-center h-screen max-w-2xl mx-auto">
        
    <div class="relative max-w-sm">
    <div class="absolute inset-y-0 start-0 flex items-center ps-3.5 pointer-events-none">
        <svg class="h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
        <path d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z"/>
        </svg>
    </div>
    <input datepicker id="default-datepicker" type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Select date">
    </div>

    </div>


<!-- test -->
    {{-- @include('partials.dashboard-stats') --}}
    <!-- Widgets -->
    {{-- @include('partials.dashboard-widgets') --}}
    <!-- #END# Widgets -->
    <!-- CPU Usage -->
    {{-- @include('partials.dashboard-cpu-usage') --}}
    <!-- #END# CPU Usage -->
    <div class="row clearfix">
        <!-- Visitors -->
        {{-- @include('partials.dashboard-visitors') --}}
        <!-- #END# Visitors -->
        <!-- Latest Social Trends -->
        {{-- @include('partials.dashboard-latest-social-trends') --}}
        <!-- #END# Latest Social Trends -->
    </div>
    <div class="row clearfix">
        <!-- Answered Tickets -->
        {{-- @include('partials.dashboard-answered-tickets') --}}
        <!-- #END# Answered Tickets -->
        <!-- Recent Activities -->
        {{-- @include('partials.dashboard-recent-activities') --}}
        <!-- #END# Recent Activities -->
    </div>
</div>
@endsection
    

