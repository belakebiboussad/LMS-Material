@extends('layouts.guest')
@section('title')
   {{__('auth.loginPageTitle') }}
@endsection
@section('css')
<style>
</style>
@endsection

@section('content')
<div class="mdl-layout mdl-js-layout mdl-color--grey-100 mdl-auth-form">
        <main class="mdl-layout__content_auth">
            <div class="mdl-card mdl-shadow--2dp">
                <div class="mdl-card__title mdl-color--primary mdl-color-text--white">
                    <h2 class="mdl-card__title-text text-center full-span block">

                        {{ trans('titles.app') }}

                    </h2>
                </div>
                <div class="mdl-card__supporting-text">
                    <form id="sign_in" method="POST" action="{{ route('login') }}">
                     {{ csrf_field() }}
                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label {{ $errors->has('email') ? 'is-invalid' :'' }}">
                        <input type="email" name="email" id="email" class="mdl-textfield__input">
                        <label for="email" class="mdl-textfield__label">{{__('auth.Email_Address')}}</label>
                          @if ($errors->has('email'))
                                <span class="mdl-textfield__error">{{ trans('auth.emailLoginError') }}</span>
                            @endif
                    </div>
                    </form>
                </div>
            </div>
        </main>
</div>
@endsection