@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Şifre Sıfırla') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('password.update') }}">
                        @csrf
                        <input type="hidden" name="token" value="{{ $token }}">
                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Adresi') }}</label>
                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>
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
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Şifre Tekrarı') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Sıfırla') }}
                                </button>
                                <div>
                                    <i class="fa-solid fa-eye reset" id="show-pass" onclick="showhide()" ></i>
                                </div>
                                <div>
                                    <i class="fa-solid fa-eye-slash reset" id="hide-pass" onclick="showhide()" ></i>
                                </div>
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
        var pass2 = document.getElementById("password-confirm");
        var show = document.getElementById("show-pass");
        var hide = document.getElementById("hide-pass");

        if(pass1.type === 'password'){
            pass1.type = 'text';
            pass2.type = 'text';
            hide.style.display = "none";
            show.style.display = "block";
        }
        else{
            pass1.type = 'password';
            pass2.type = 'password';
            hide.style.display = "block";
            show.style.display = "none";
        }
    }
</script>
@endsection
