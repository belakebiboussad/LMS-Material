@extends('layouts.guest')
@section('css')
	<style type="text/css">
            
		form {
			max-width: 300px;
			margin: 0 auto;
		}

		.mdl-grid {
			margin-top: 15%;
		}
	</style>
@endsection
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{-- __('Login') --}}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="row mb-3">
                            <label for="email" class="col-md-8 col-form-label text-md-end">{{ __('Email Address') }}</label>
                            <div class="mdl-textfield mdl-js-textfield">
                                <input class="mdl-textfield__input @error('email') is-invalid @enderror" type="text" id="email" name="email" value="{{ old('email') }}" required autocomplete="off" autofocus>
                                <label class="mdl-textfield__label" for="email">Email</label>
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>
                            <div class="mdl-textfield mdl-js-textfield @error('password') is-invalid @enderror">
                                <input class="mdl-textfield__input" type="password" id="password"  name="password" required autocomplete="current-password">
                                <label class="mdl-textfield__label" for="password">Password</label>
                                 @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                           
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection