@extends('layouts.admin')

@section('title')
    Kullanıcılar
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <h4>Kullanıcı Detayları
                <a class="btn btn-primary float-end" href="{{ url('users') }}"><i class="fa-solid fa-arrow-left"></i> Gerİ</a>
            </h4><hr>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-4">
                    <label>İsim Soyisim</label>
                    <div class="pb-2">{{ $user->name.' '.$user->lname }}</div><hr>
                </div>
                <div class="col-md-4">
                    <label>Email</label>
                    <div class="pb-2">{{ $user->email }}</div><hr>
                </div>
                <div class="col-md-4">
                    <label>Telefon</label>
                    <div class="pb-2">{{ $user->phone }}</div><hr>
                </div>
                <div class="col-md-4">
                    <label>Adres</label>
                    <div class="pb-2">{{ $user->address1 }}</div><hr>
                </div>
                <div class="col-md-4">
                    <label>Adres</label>
                    <div class="pb-2">{{ $user->address2 }}</div><hr>
                </div>
                <div class="col-md-4">
                    <label>Şehir</label>
                    <div class="pb-2">{{ $user->city}}</div><hr>
                </div>
                <div class="col-md-4">
                    <label>İlçe</label>
                    <div class="pb-2">{{ $user->state }}</div><hr>
                </div>
                <div class="col-md-4">
                    <label>Ülke</label>
                    <div class="pb-2">{{ $user->county }}</div><hr>
                </div>
                <div class="col-md-4">
                    <label>Posta Kodu</label>
                    <div class="pb-2">{{ $user->pincode }}</div><hr>
                </div>
            </div>
        </div>
    </div>
@endsection
