@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <br><br>
        <div class="col s12">

            <div>
                <div class="col s12 center-align"><h5 class="green-text text-dark-4">{{ __('Login') }}</h5></div>

                <div>
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row">
                            <div class="col s12">
                                <div class="form-check">
                                    <label>
                                    <input class="filled-in" checked="checked" type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}>
                                    <span>
                                        {{ __('Remember Me') }}
                                    </span>
                                </label>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col s12">
                                @if (Route::has('password.request'))
                                    <a class="green-text text-dark-4" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                            <div class="col s12 center-align">
                                <button class="waves-effect waves-light btn green lighten-1" type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>
                            </div>

                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
