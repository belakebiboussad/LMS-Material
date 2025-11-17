@extends('layouts.guest')

@section('content')
<div class="container login-page">
     <div class="login-box">
        <div class="logo">
            <a href="javascript:void(0);"><b>{{ config('app.name') }}</b></a>
            <abbr title="Livestock managment system">LMS </abbr>
        </div>
        <div class="card">
            <div class="body">
                <form id="sign_in" method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="msg">{{ __('auth.Login') }}</div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">person</i>
                        </span>
                        <div class="form-line">
                            <x-input-label for="email" :value="__('auth.Email_Address')" /><br>
                            <input class="mdl-textfield__input @error('email') is-invalid @enderror" type="text" id="email" name="email" value="admin@example.com" required autocomplete="off" autofocus />
                            @error('email')
                             <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">lock</i>
                        </span>
                        <div class="form-line">
                            <x-input-label for="password" :value="__('auth.Password')" />
                            <input type="password" class="form-control" name="password" placeholder="Password" value="password" required>
                            <x-input-error :message="$errors->get('password') class=" mt-2" />
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-check form-switch d-flex  col-xs-8 p-t-5">
                            <input type="checkbox" name="rememberme" id="rememberme" class="form-check-input chk-col-pink" {{ old('remember') ? 'checked' : '' }}>
                             <label class="form-check-label mb-0 ms-2" for="rememberme">{{ __('auth.Remember_Me') }}</label>   
                              @error('password')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>
                        
                        <div class="col-xs-4">
                            <button class="btn btn-block bg-pink waves-effect" type="submit">{{ __('Login') }}</button>
                        </div>
                    </div>
                    <div class="row m-t-15 m-b--20">
                        <div class="col-xs-6">
                            <a href="{{ route('register') }}">{{ __('auth.Register') }}</a>
                        </div>
                        <div class="col-xs-6 align-right">
                            <a href="forgot-password.html">{{ __('auth.Forgot_Your_Password?') }}</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
     </div>
</div>
@endsection