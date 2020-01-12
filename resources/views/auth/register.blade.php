@extends('layouts.app')
@section('register', "navActive")

@section('content')
    <div class="w3-display-container" style="height: 100%">
        <div class="w3-display-topmiddle w3-card-4">
            <div class="w3-container w3-theme-dark">
                {{ __('Register') }}
            </div>
            <div class="w3-container">
                {{ Form::open(['route'=>'register', 'method'=>'post' ]) }}
            </div>
            <div class="w3-section">
                @csrf
                {{ Form::label('name', __('name')) }}
                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            {{--            <div class="card">
                            <div class="card-header"></div>

                            <div class="card-body">
                                    @csrf

                                    <div class="form-group row">
                                        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                                        <div class="col-md-6">
                                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                            @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>--}}

            <div class="w3-section">
                {{ Form::label('email', __('E-Mail Address')) }}
                <form>
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                </form>

                @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror

            </div>
            {{--                        <div class="form-group row">
                                        <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                                        <div class="col-md-6">
                                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                            @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>--}}
            <div class="w3-section">

                {{ Form::label('password', __('password')) }}
                <form>
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                </form>

                @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror

                {{ Form::label('password-confirm', __('Confirm Password')) }}
                <div class="w3-right">
                    <form>
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                    </form>
                </div>
            </div>

            <div class="w3-section">
                {{ Form::submit(__('Register'), ["class" => "w3-input w3-button w3-theme-dark w3-round"]) }}
            </div>
            {{--                       <div class="form-group row">
                                       <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                                       <div class="col-md-6">
                                           <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                           @error('password')
                                           <span class="invalid-feedback" role="alert">
                                                   <strong>{{ $message }}</strong>
                                               </span>
                                           @enderror
                                       </div>--}}


            {{--                        <div class="form-group row">
                                        <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                                        <div class="col-md-6">
                                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                        </div>
                                    </div>--}}

            {{--      <div class="form-group row mb-0">
                      <div class="col-md-6 offset-md-4">
                          <button type="submit" class="btn btn-primary">
                              {{ __('Register') }}
                          </button>
                      </div>
                  </div>
              </form>--}}
        </div>
    </div>
@endsection
