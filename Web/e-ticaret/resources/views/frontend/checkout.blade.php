@extends('layouts.front')

@section('title', 'ödeme bilgileri')

@section('content')
    <div class="py-3 mb-4 shadow-sm bg-warning border-top">
        <div class="container">
            <h6 class="mb-0">
                <a href="{{ url('/') }}">Robo Raven</a> / <a href="{{ url('cart') }}">Sepetim</a> / <a href="{{ url('checkout') }}">Ödeme Bilgilerim</a>
            </h6>
        </div>
    </div>
    @php $total = 0; $total_KDV = 0; $KDV = 0; $indirim = 0@endphp
    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-md-7">
                <div class="card shadow">
                    <div class="card-body">
                        <h6>Kullanıcı Bilgileri</h6>
                        <hr>
                        <div class="row checkout-form">
                            <div class="col-md-6">
                                <label for="firstname">İsim</label>
                                <input type="text" class="form-control" name="name">
                            </div>
                            <div class="col-md-6">
                                <label for="lastname">Soyisim</label>
                                <input type="text" class="form-control" name="lname">
                            </div>
                            <div class="col-md-6">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" name="email">
                            </div>
                            <div class="col-md-6">
                                <label for="phone">Telefon Numarası</label>
                                <input type="text" class="form-control" name="phone">
                            </div>
                            <div class="col-md-6">
                                <label for="address1">Adres</label>
                                <input type="text" class="form-control" name="address1">
                            </div>
                            <div class="col-md-6">
                                <label for="address2">Adres</label>
                                <input type="text" class="form-control" name="address2">
                            </div>
                            <div class="col-md-6">
                                <label for="address2">Şehir</label>
                                <input type="text" class="form-control" name="city">
                            </div>
                            <div class="col-md-6">
                                <label for="address2">İlçe</label>
                                <input type="text" class="form-control" name="state">
                            </div>
                            <div class="col-md-6">
                                <label for="address2">Ülke</label>
                                <input type="text" class="form-control" name="county">
                            </div>
                            <div class="col-md-6">
                                <label for="address2">PostaKodu</label>
                                <input type="text" class="form-control" name="pincode">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-5">
                <div class="card shadow">
                    <div class="card-body">
                        <h6>Sipariş Bilgileri</h6>
                        <hr>
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <td class="tablo">Ürün Adı</td>
                                    <td class="tablo">Adeti</td>
                                    <td class="tablo">Fiyatı</td>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($cartitems as $item)
                                    @if($item->prod_qty <= $item->product->qty and $item->product->status == 0)
                                        <tr>
                                            <td> {{ $item->product->name }} </td>
                                            <td> {{ $item->prod_qty }} </td>
                                            <td> {{ $item->product->selling_price }} </td>
                                        </tr>

                                        @php $total += $item->product->selling_price * $item->prod_qty  @endphp
                                        @php $total_KDV += $item->product->original_price * $item->prod_qty  @endphp
                                        @php $KDV =  $total_KDV - $total @endphp
                                        @php $indirim = $KDV*18/100 @endphp
                                    @endif
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="container">
                        <div class="row">
                            <div class="card-footer">
                                <strong><h6 style="font-size: 18px;">KDV'nin %18'i iade</h6><br></strong>
                                <h6>Fiyat + KDV : {{ $total + $KDV}}</h6><br>
                                <h6>KDV : {{ $KDV }} TL</h6><hr>
                                <h6>Toplam Fiyat : {{ $total - $indirim }} TL
                                    <a class="btn btn-primary float-end">Onayla</a>
                                </h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection