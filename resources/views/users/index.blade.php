@extends('layouts.app')
@section('title', __('titles.users.index'))
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
                            <h4 class="text-white mx-3">{{ __('user.index') }}</h4>
                        </div>
                    </div>
                    <div class="me-3 my-3 text-end">
                        <a class="btn bg-gradient-dark  mb-0" href="{{ route('users.create') }}"><i class="material-icons text-sm">add</i>&nbsp;&nbsp;
                            {{ __('user.create') }}

                        </a>
                    </div>
                    <div class="card-body px-0 pb-2">
                        <div class="table-responsive p-0">
                            <table class="table align-items-center mb-0">
                                <thead>
                                    <tr>
                                        <th
                                            class="text-uppercase text-secondary text-md font-weight-bolder opacity-7">
                                            {{ __('user.name')}}</th>
                                        <th
                                            class="text-uppercase text-secondary text-md font-weight-bolder opacity-7 ps-2">
                                            {{ __('user.username') }}</th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-md font-weight-bolder opacity-7">
                                            {{ __('user.email') }}</th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-md font-weight-bolder opacity-7">
                                           {{ __('user.role') }}</th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-md font-weight-bolder opacity-7">
                                              {{ __('user.status') }}
                                        </th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-md font-weight-bolder opacity-7">
                                            {{ __('creation_at') }}</th>
                                        <th class="text-secondary opacity-7"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($users as $user)
                                    <tr>
                                        <td>
                                            <div class="align-middle text-center">
                                                <span class="text-secondary">{{ $user->name }}</span>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="align-middle text-center">
                                                <span class="text-secondary">{{ $user->username }}</span>
                                            </div>
                                        </td>
                                        <td class="align-middle text-center">
                                            <p class="text-secondary">{{ $user->email }}
                                            </p>
                                        </td>
                                        <td class="align-middle text-center">
                                            <span class="text-secondary">{{ $user->roles->first()->name ?? '' }}</span>
                                        </td>
                                        <td class="align-middle text-center text-sm">
                                            @if($user->status == 1)
                                            <span class="badge badge-sm bg-gradient-success">Active</span>
                                            @else
                                            <span class="badge badge-sm bg-gradient-danger">Inactive</span>
                                            @endif
                                        </td>
                                        <td class="align-middle text-center">
                                            <span class="text-secondary text-lg">{{ $user->created_at->format('H:i:s d/m/Y') }}</span>
                                        </td>
                                        <td class="align-middle">
                                            <a rel="tooltip" class="btn btn-lg btn-info btn-link"
                                                href="{{ route('users.show',$user) }}" data-original-title=""
                                                title="">
                                                <i class="material-icons">visibility</i>
                                                <div class="ripple-container"></div>
                                            </a>
                                            <a rel="tooltip" class="btn btn-lg btn-success btn-link"
                                                href="{{ route('users.edit',$user) }}" data-original-title=""
                                                title="">
                                                <i class="material-icons">edit</i>
                                            </a>
                                            <a href="{{ route('users.destroy', $user) }}"
                                                class="btn btn-lg btn-danger btn-link font-weight-bold text-md"
                                                data-toggle="tooltip" data-original-title="Delete user"
                                                onclick="event.preventDefault(); if(confirm('{{ ('Are you sure you want to delete this user?') }}')){ document.getElementById('delete-form-{{ $user->id }}').submit(); }"
                                                {{ Auth::id() === $user->id ? 'disabled' :''}}>
                                                <i class="material-icons">delete</i>
                                            </a>
                                            <form id="delete-form-{{ $user->id }}" action="{{ route('users.destroy', $user->id) }}" method="POST" style="display: none;">
                                                @csrf
                                                @method('DELETE')
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
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