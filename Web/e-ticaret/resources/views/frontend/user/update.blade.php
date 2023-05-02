@extends('layouts.front')

@section('title', 'ödeme bilgileri')

@section('content')
    <div class="py-3 mb-4 shadow-sm bg-warning border-top">
        <div class="container">
            <h6 class="mb-0">
                <a href="{{ url('/') }}">Robo Raven</a> / Bilgilerim / Güncelle
            </h6>
        </div>
    </div>
    <div class="card p-5" >
        <div class="card-header">
            <h4 class="pt-3" style="font-size: 30px">Kullanıcı Detayları
                <a class="btn btn-success float-end" href="{{ url('my-profil') }}">Gerİ</a>
            </h4>
        </div><hr>
        <div class="card-body">
            <form action="{{ url('update_user_info') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-5 mt-2 m-auto">
                        <label>İsim</label>
                        <input class="form-control" name="name" value="{{ $user->name }}">
                    </div>
                    <div class="col-md-5 mt-2 m-auto">
                        <label>Soy İsim</label>
                        <input class="form-control" name="lname" value="{{ $user->lname }}">
                    </div>
                    <div class="col-md-5 mt-2 m-auto">
                        <label>Email</label>
                        <input class="form-control" name="email" value="{{ $user->email }}">
                    </div>
                    <div class="col-md-5 mt-2 m-auto">
                        <label>Şifre</label>
                        <input class="form-control" name="password" value="">
                    </div>
                    <div class="col-md-5 mt-2 m-auto">
                        <label>Telefon</label>
                        <input class="form-control" name="phone" value="{{ $user->phone }}">
                    </div>
                    <div class="col-md-5 mt-2 m-auto">
                        <label>adres</label>
                        <input class="form-control" name="address1" value="{{ $user->address1 }}">
                    </div>
                    <div class="col-md-5 mt-2 m-auto">
                        <label>adres</label>
                        <input class="form-control" name="address2" value="{{ $user->address2 }}">
                    </div>
                    <div class="col-md-5 mt-2 m-auto">
                        <label>İl</label>
                        <input class="form-control" name="city" value="{{ $user->city }}">
                    </div>
                    <div class="col-md-5 mt-2 m-auto">
                        <label>İlçe</label>
                        <input class="form-control" name="state" value="{{ $user->state }}">
                    </div>
                    <div class="col-md-5 mt-2 m-auto">
                        <label>Ülke</label>
                        <input class="form-control" name="county" value="{{ $user->county }}">
                    </div>
                    <div class="col-md-5 mt-2 m-auto">
                        <label>Posta Kodu</label>
                        <input class="form-control" name="pincode" value="{{ $user->pincode }}">
                    </div>
                    <div class="mt-4">
                        <button class="btn btn-primary float-end" type="submit">Güncelle</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
