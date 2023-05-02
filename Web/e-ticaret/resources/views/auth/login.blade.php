@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Giriş') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Adresi') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Şifre') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

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
                                        {{ __('Beni Hatırla') }}
                                    </label>
                                    <div>
                                        <i class="fa-solid fa-eye giris" id="show-pass" onclick="showhide()" ></i>
                                    </div>
                                    <div>
                                        <i class="fa-solid fa-eye-slash giris" id="hide-pass" onclick="showhide()" ></i>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary" style="margin-right: 15px">
                                    {{ __('Giriş') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-primary " href="{{ route('password.request') }}">
                                        {{ __('Şifremi unuttum') }}
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
<script>
    function showhide(){
        var pass1 = document.getElementById("password");
        var show = document.getElementById("show-pass");
        var hide = document.getElementById("hide-pass");

        if(pass1.type === 'password'){
            pass1.type = 'text';
            hide.style.display = "none";
            show.style.display = "block";
        }
        else{
            pass1.type = 'password';
            hide.style.display = "block";
            show.style.display = "none";
        }
    }
</script>
@endsection
