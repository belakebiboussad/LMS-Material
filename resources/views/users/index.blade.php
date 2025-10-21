@extends('layouts.app')
@section('content')
<main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg">
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card my-4">
                    <div class="card-header">
                        <div class="bg-gradient-primary shadow-primary border-radius-lg">
                            <h6 class="text-white mx-3"></h6>
                        </div>
                    </div>
                    <div class="me-3 my-3 text-end">
                        <a class="btn mb-0" href="{{ route('users.create') }}"><i
                                class="material-icons text-sm">add</i>&nbsp;&nbsp;
                            {{ __('User add') }}
                        </a>
                    </div>
                    <div class="card-body px-0 pb-2">
                        <div class="table-responsive p-0">
                            <table class="table align-items-center mb-0">
                                <thead>
                                    <tr>
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            nom</th>
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            username</th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            EMAIL</th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            ROLE</th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Date création
                                        </th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Status
                                        </th>
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
                                            <span class="text-secondary">{{ $user->roles->first()->name }}</span>
                                        </td>
                                        <td class="align-middle text-center">
                                            <span class="text-secondary text-xs">{{ $user->created_at }}</span>
                                        </td>
                                        <td class="align-middle text-center text-sm">
                                            @if($user->status == 1)
                                            <span class="badge badge-sm bg-gradient-success">Active</span>
                                            @else
                                            <span class="badge badge-sm bg-gradient-danger">Inactive</span>
                                            @endif
                                        </td>
                                        <td class="align-middle">
                                            <a rel="tooltip" class="btn btn-success btn-link"
                                                href="{{ route('users.edit',$user) }}" data-original-title=""
                                                title="">
                                                <i class="material-icons">edit</i>
                                                <div class="ripple-container"></div>
                                            </a>
                                            <form action="{{ route('users.destroy',$user) }}" method="POST" style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-link" {{ Auth::id() === $user->id ? 'disabled' :''}}>
                                                     <i class="material-icons" style="font-size: 18px;">close</i>
                                                </button>
                                            </form>
                                            <div class="ripple-container"></div>
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