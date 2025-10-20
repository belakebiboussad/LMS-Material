@extends('layouts.app')
@section('content')
<div class="main-content position-relative bg-gray-100  h-100">
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
                @method('PUT')
                <div class="row">
                    <div class="mb-3 col-md-6">
                        <label class="form-label">Nom</label>
                        <input type="text" name="name" class="form-control border border-2 p-2" value='{{ old('name', $user->name) }}'>
                        @error('name')
                        <p class='text-danger inputerror'>{{ $message }} </p>
                        @enderror
                    </div>

                    <div class="mb-3 col-md-6">
                        <label class="form-label">Username</label>
                        <input type="text" name="username" class="form-control border border-2 p-2" value='{{ old('username', $user->username) }}'>
                        @error('username')
                        <p class='text-danger inputerror'>{{ $message }} </p>
                        @enderror
                    </div>

                    <div class="mb-3 col-md-6">
                        <label class="form-label">Email</label>
                        <input type="email" name="email" class="form-control border border-2 p-2" value='{{ old('email', $user->email) }}'>
                        @error('email')
                        <p class='text-danger inputerror'>{{ $message }} </p>
                        @enderror
                    </div>

                    <div class="mb-3 col-md-6">
                        <label class="form-label">Mot de passe</label>
                        <input type="password" name="password" class="form-control border border-2 p-2" value='{{ old('password', $user->password) }}'>
                        @error('password')
                        <p class='text-danger inputerror'>{{ $message }} </p>
                        @enderror
                    </div>
                </div>
                <div class="text-end mt-5">
                    <button type="submit" class="btn bg-gradient-dark">Enregistrer</button>
                </div>
            </form>

        </div>
    </div>
</div>
@endsection