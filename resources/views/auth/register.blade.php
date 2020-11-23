@extends('layouts.app')
@section('register', "navActive")

@section('content')
    <div class="w3-display-container" style="height: 100%">
        <div class="w3-display-topmiddle w3-card-4">
            <div class="w3-container w3-theme-dark">
                <h1>{{ __('auth.register') }}</h1>
            </div>
            <div class="w3-container">
                {{ Form::open(['route'=>'register', 'method'=>'post' ]) }}
                <div class="w3-section">
                    @csrf

                    {{ Form::label('name', __('auth.name')) }}
                    {{ Form::text('name', null, ["class" => "w3-input w3-border w3-round w3-border-green", "required" => true, "placeholder"=>'Entrez votre nom']) }}

                    @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="w3-section">

                    {{ Form::label('email', __('auth.email')) }}
                    {{ Form::email('email', null, ["class" => "w3-input w3-border w3-round w3-border-green", "required" => true, "placeholder"=>'Saisissez ici votre courriel']) }}

                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="w3-section">

                    {{ Form::label('password', __('auth.password')) }}
                    {{ Form::password('password', ["class" => "w3-input w3-border w3-round w3-border-green", "required" => true, "placeholder"=>'Saisissez ici votre mot de passe']) }}

                    @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="w3-section">
                    {{ Form::label('password_confirmation', __('auth.pwd_Confirmation')) }}
                    {{ Form::password('password_confirmation', ["class" => "w3-input w3-border w3-round w3-border-green", "required" => true, "placeholder"=>'Confirmez ici votre mot de passe']) }}

                    @error('password-confirm')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="w3-section">
                    {{ Form::submit(__('auth.send'), ["class" => "w3-input w3-button w3-theme-dark w3-round"]) }}
                </div>
            </div>
        </div>
    </div>
@endsection
