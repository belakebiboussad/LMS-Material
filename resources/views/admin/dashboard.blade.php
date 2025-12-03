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
    

