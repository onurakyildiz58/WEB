@extends('layouts.front')

@section('title', 'Siparişim')

@section('content')
    <div class="py-3 mb-4 shadow-sm bg-warning border-top">
        <div class="container">
            <h6 class="mb-0">
                <a href="{{ url('/') }}">Robo Raven</a> / <a href="{{ url('my-orders') }}">Siparişlerim</a> / {{ $orders->tracking_no }}
            </h6>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Siparişim
                            <a class="btn btn-primary float-end" href="{{ url('my-orders') }}"><i class="fa-solid fa-arrow-left"></i> Gerİ</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 order">
                                <h4>Sipariş Detayları</h4>
                                <hr>
                                <label for="">İsim</label>
                                <div class="border mb-3 ">{{ $orders->name }}</div>
                                <label for="">Soy İsim</label>
                                <div class="border mb-3 ">{{ $orders->lname }}</div>
                                <label for="">Mail Adresi</label>
                                <div class="border mb-3 ">{{ $orders->email }}</div>
                                <label for="">Telefon Numarası</label>
                                <div class="border mb-3 ">{{ $orders->phone }}</div>
                                <label for="">Sipariş Adresi</label>
                                <div class="border mb-3 ">
                                    {{ $orders->address1 }} <br>
                                    {{ $orders->address2 }} <br>
                                    {{ $orders->state }} <br>
                                    {{ $orders->city }} /
                                    {{ $orders->county }}
                                </div>
                                <label for="">Posta Kodu</label>
                                <div class="border mb-3 ">{{ $orders->pincode }}</div>
                            </div>
                            <div class="col-md-6">
                                <h4>Ürün Detayları</h4>
                                <hr>
                                <table class="table table-striped">
                                    <thead>
                                    <tr>
                                        <td class="tablo">Ürün Adı</td>
                                        <td class="tablo">Ürün Miktarı</td>
                                        <td class="tablo">Ürün Fiyatı</td>
                                        <td class="tablo">Ürün</td>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($orders->orderitems as $item)
                                            <tr>
                                                <td>{{ $item->products->name }}</td>
                                                <td>{{ $item->qty }}</td>
                                                <td>{{ $item->price }} TL</td>
                                                <td>
                                                    <img src="{{ asset('assets/uploads/product/'.$item->products->image) }}" alt="ürün resmi" style="width: 50px">
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <h4 class="float-end">Toplam Fiyat : {{ $orders->total_price }} TL</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
