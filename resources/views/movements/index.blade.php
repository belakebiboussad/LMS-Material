@extends('layouts.app')
@section('title', __('movement.index'))
{{ __('Dashboard') }}
@section('content')
<main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg">
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
                @endif
                <div class="card my-4">
                    <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                        <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                            <h4 class="text-white mx-3">{{ __('movement.index') }}</h4>
                        </div>
                    </div>
                     <div class="me-3 my-3 text-end">
                        <a class="btn bg-gradient-dark  mb-0" href="{{ route('movements.create') }}"><i class="material-icons text-sm">add</i>&nbsp;&nbsp;
                            {{ __('movement.create') }}
                        </a>
                    </div>
                    <div class="card-body px-0 pb-2">
                        <div class="table-responsive p-0">
                            <table class="table align-items-center mb-0">
                                <thead>
                                    <tr>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection