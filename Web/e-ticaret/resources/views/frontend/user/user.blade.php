@extends('layouts.front')

@section('title', 'ödeme bilgileri')

@section('content')
    <div class="py-3 mb-4 shadow-sm bg-warning border-top">
        <div class="container">
            <h6 class="mb-0">
                <a href="{{ url('/') }}">Robo Raven</a> / Bilgilerim
            </h6>
        </div>
    </div>
    <div class="card p-5" >
        <div class="card-header">
            <h4 class="pt-3" style="font-size: 30px">Kullanıcı Detayları
                <a class="btn btn-success float-end" href="{{ url('update_user') }}">Güncelle</a>
            </h4>
        </div><hr>
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
                    <div class="pb-2">{{ $user->city }}</div><hr>
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
