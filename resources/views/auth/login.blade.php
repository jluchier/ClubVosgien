@extends('layouts.app')
@section('login', "navActive")

@section('content')
    <div class="w3-display-container" style="height: 100%">
        <div class="w3-display-topmiddle w3-card-4">
            <div class="w3-container w3-theme-dark">
                <h1>{{ __('auth.login') }}</h1>
            </div>

            <div class="w3-container">
                {{ Form::open(['route' => 'login', 'method'=>'post' ]) }}

                <div class="w3-section">
                    {{ Form::label('email', __('auth.email')) }}
                    {{ Form::email('email', null, ["class" => "w3-input w3-border w3-round w3-border-green", "required" => true, "placeholder"=>'Saisissez ici votre courriel ']) }}
                </div>

                <div class="w3-section">
                    {{ Form::label('password', __('auth.password')) }}
                    {{ Form::password('password', ["class" => "w3-input w3-border w3-round w3-border-green", "required" => true, "placeholder"=>'Saisissez ici votre mot de passe']) }}
                    <a href="{{ route('password.request') }}">{{ __('auth.pwd_Request') }}</a>
                </div>

                <div class="w3-section">
                    {{ Form::label('remember', __('auth.remember')) }}
                    {{ Form::checkbox('remember', true, ["class" => "w3-check"]) }}
                    {{ Form::submit(__('auth.send'), ["class" => "w3-input w3-button w3-theme-dark w3-round"]) }}
                </div>

                {{ Form::close() }}
            </div>

        </div>
    </div>
@endsection
