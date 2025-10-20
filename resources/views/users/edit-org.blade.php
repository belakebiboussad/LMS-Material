@extends('layouts.app')
@section('content')
<div class="main-content position-relative bg-gray-100 max-height-vh-100 h-100">
    <div class="container-fluid px-2 px-md-4">
        <div class="card card-body mx-3 mx-md-4">
            <div class="row gx-4 mb-2">
                {{-- <div class="col-auto">
                    <div class="avatar avatar-xl position-relative">
                        <img src="{{ asset('assets') }}/img/bruce-mars.jpg" alt="profile_image"
                class="w-100 border-radius-lg shadow-sm">
            </div>
        </div>
        <div class="col-auto my-auto">
            <div class="h-100">
                <h5 class="mb-1">
                    {{ $user->name }}
                </h5>
                <p class="mb-0 font-weight-normal text-sm">
                    {{ $user->roles->first()->name }}
                </p>
            </div>
        </div> --}}
        <div class="col-lg-4 col-md-6 my-sm-auto ms-sm-auto me-sm-0 mx-auto mt-3">
            <div class="nav-wrapper position-relative end-0">
                <ul class="nav nav-pills nav-fill p-1" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link mb-0 px-0 py-1 active " data-bs-toggle="tab" href="javascript:;"
                            role="tab" aria-selected="true">
                            <i class="material-icons text-lg position-relative">home</i>
                            <span class="ms-1">App</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link mb-0 px-0 py-1 " data-bs-toggle="tab" href="javascript:;"
                            role="tab" aria-selected="false">
                            <i class="material-icons text-lg position-relative">email</i>
                            <span class="ms-1">Messages</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link mb-0 px-0 py-1 " data-bs-toggle="tab" href="javascript:;"
                            role="tab" aria-selected="false">
                            <i class="material-icons text-lg position-relative">settings</i>
                            <span class="ms-1">Settings</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="card card-plain h-100">
        <div class="card-header pb-0 p-3">
            <div class="row">
                <div class="col-md-8 d-flex align-items-center">
                    <h6 class="mb-3">Modifier l'utilisateur</h6>
                </div>
            </div>
        </div>
        <div class="card-body p-3">
            @if (session('status'))
            <div class="row">
                <div class="alert alert-success alert-dismissible text-white" role="alert">
                    <span class="text-sm">{{ Session::get('status') }}</span>
                    <button type="button" class="btn-close text-lg py-3 opacity-10"
                        data-bs-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
            @endif
            @if (Session::has('demo'))
            <div class="row">
                <div class="alert alert-danger alert-dismissible text-white" role="alert">
                    <span class="text-sm">{{ Session::get('demo') }}</span>
                    <button type="button" class="btn-close text-lg py-3 opacity-10"
                        data-bs-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
            @endif
            <form method='POST' action="{{ route('users.update',$user) }}">
                @csrf
                <div class="row">

                    <div class="mb-3 col-md-6">
                        <label class="form-label">Email</label>
                        <input type="email" name="email" class="form-control border border-2 p-2" value='{{ old('email', $user->email) }}'>
                        @error('email')
                        <p class='text-danger inputerror'>{{ $message }} </p>
                        @enderror
                    </div>

                    <div class="mb-3 col-md-6">
                        <label class="form-label">Name</label>
                        <input type="text" name="name" class="form-control border border-2 p-2" value='{{ old('name', auth()->user()->name) }}'>
                        @error('name')
                        <p class='text-danger inputerror'>{{ $message }} </p>
                        @enderror
                    </div>

                    <div class="mb-3 col-md-6">
                        <label class="form-label">Phone</label>
                        <input type="number" name="phone" class="form-control border border-2 p-2" value='{{ old('phone', auth()->user()->phone) }}'>
                        @error('phone')
                        <p class='text-danger inputerror'>{{ $message }} </p>
                        @enderror
                    </div>

                    <div class="mb-3 col-md-6">
                        <label class="form-label">Location</label>
                        <input type="text" name="location" class="form-control border border-2 p-2" value='{{ old('location', auth()->user()->location) }}'>
                        @error('location')
                        <p class='text-danger inputerror'>{{ $message }} </p>
                        @enderror
                    </div>

                    <div class="mb-3 col-md-12">
                        <label for="floatingTextarea2">About</label>
                        <textarea class="form-control border border-2 p-2"
                            placeholder=" Say something about yourself" id="floatingTextarea2" name="about"
                            rows="4" cols="50">{{ old('about', auth()->user()->about) }}</textarea>
                        @error('about')
                        <p class='text-danger inputerror'>{{ $message }} </p>
                        @enderror
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="mb-3 col-md-6">
                        <label class="form-label">Username</label>
                        <input type="text" name="username" class="form-control border border-2 p-2" value='{{ old('username', $user->username) }}'>
                        @error('username')
                        <p class='text-danger inputerror'>{{ $message }} </p>
                        @enderror
                    </div>
                </div>
                <div class="text-end">
                    <button type="submit" class="btn bg-gradient-dark">Submit</button>
                </div>
            </form>

        </div>
    </div>
</div>

</div>
</div>
@endsection