@extends('layouts.app')

@section('content')
<div class="container">
    @include('inc.messages-login')
    <div class="row justify-content-center">
        <div class="col-md-7">
            <div class="card auth-form">

                <div class="card-body text-auth-form">
                    <form method="POST" action="{{ route('login') }}">
                    <h4 class="text-center form-login-title">Masuk</h4>
                    <p class="form-login-subtitle col-md-12 text-center">Silahkan masukkan Nomor HP dan Password yang sudah Anda daftarkan</p>
                        @csrf

                        <div class="form-group row">
                            <label for="phone" class="col-md-4 col-form-label text-md-right">{{ __('Nomor HP') }}</label>
                                                    
                            <div class="col-md-6">
                                <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" autocomplete="phone" autofocus>

                                @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-2 text-center">
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-login">
                                    {{ __('Masuk') }}
                                </button>
                            </div>
                        </div>

                        <div class="form-group row mb-0 text-center">
                            <div class="col-md-12">
                                <p>
                                    Belum punya akun?
                                    <a class="register-form-login" href="{{ route('register') }}">{{ __('Buat Akun') }}</a>.
                                </p>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
