@extends('layouts.front')

@section('title', 'ödeme bilgileri')

@section('content')
    <div class="py-3 mb-4 shadow-sm bg-warning border-top">
        <div class="container">
            <h6 class="mb-0">
                <a href="{{ url('/') }}">Robo Raven</a> / <a href="{{ url('cart') }}">Sepetim</a> / Ödeme Bilgilerim
            </h6>
        </div>
    </div>
    @php $total = 0; $total_KDV = 0; $KDV = 0; $indirim = 0@endphp
    <div class="container mt-5 mb-5">
        <form action="{{ url('place-order') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-7">
                    <div class="card shadow">
                        <div class="card-header">
                            <h6>Kart Bilgileri</h6>
                            <hr>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="firstname">Kart Numarası</label>
                                    <input type="text" class="form-control" name="" value="">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="firstname">Kart Sahibi</label>
                                    <input type="text" class="form-control" name="" value="">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="firstname">Kart CVV</label>
                                    <input type="text" class="form-control" name="" value="">
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label for="firstname">Kart Ay</label>
                                    <select name="" class="form-control">
                                        <option value="month" selected disabled>Ay</option>
                                        <option value="01">01</option>
                                        <option value="02">02</option>
                                        <option value="03">03</option>
                                        <option value="04">04</option>
                                        <option value="05">05</option>
                                        <option value="06">06</option>
                                        <option value="07">07</option>
                                        <option value="08">08</option>
                                        <option value="09">09</option>
                                        <option value="10">10</option>
                                        <option value="11">11</option>
                                        <option value="12">12</option>
                                    </select>
                                </div>
                                <div class="col-md-3 ">
                                    <label for="firstname">Kart Yıl</label>
                                    <select class="form-control" name="">
                                        <option value="year" selected disabled>Yıl</option>
                                        <option value="2023">2023</option>
                                        <option value="2024">2024</option>
                                        <option value="2025">2025</option>
                                        <option value="2026">2026</option>
                                        <option value="2027">2027</option>
                                        <option value="2028">2028</option>
                                        <option value="2029">2029</option>
                                        <option value="2030">2030</option>
                                        <option value="2031">2031</option>
                                        <option value="2032">2032</option>
                                    </select>
                                </div>
                            </div><hr>
                        </div>

                        <div class="card-body">
                            <h6>Kullanıcı Bilgileri</h6>
                            <hr>
                            <div class="row checkout-form">
                                <div class="col-md-6">
                                    <label for="firstname">İsim</label>
                                    <input type="text" class="form-control" name="name" value="{{ Auth::user()->name }}">
                                </div>
                                <div class="col-md-6">
                                    <label for="lastname">Soyisim</label>
                                    <input type="text" class="form-control" name="lname" value="{{ Auth::user()->lname }}">
                                </div>
                                <div class="col-md-6">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control" name="email" value="{{ Auth::user()->email }}">
                                </div>
                                <div class="col-md-6">
                                    <label for="phone">Telefon Numarası</label>
                                    <input type="text" class="form-control" name="phone" value="{{ Auth::user()->phone }}">
                                </div>
                                <div class="col-md-6">
                                    <label for="address1">Adres</label>
                                    <input type="text" class="form-control" name="address1" value="{{ Auth::user()->address1 }}">
                                </div>
                                <div class="col-md-6">
                                    <label for="address2">Adres</label>
                                    <input type="text" class="form-control" name="address2" value="{{ Auth::user()->address2 }}">
                                </div>
                                <div class="col-md-6">
                                    <label for="address2">Şehir</label>
                                    <input type="text" class="form-control" name="city" value="{{ Auth::user()->city }}">
                                </div>
                                <div class="col-md-6">
                                    <label for="address2">İlçe</label>
                                    <input type="text" class="form-control" name="state" value="{{ Auth::user()->state }}">
                                </div>
                                <div class="col-md-6">
                                    <label for="address2">Ülke</label>
                                    <input type="text" class="form-control" name="county" value="{{ Auth::user()->county }}">
                                </div>
                                <div class="col-md-6">
                                    <label for="address2">Posta Kodu</label>
                                    <input type="text" class="form-control" name="pincode" value="{{ Auth::user()->pincode }}">
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
                                        <button type="submit" class="btn btn-primary float-end">Onayla</button>
                                    </h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <input value="{{ $total - $indirim }}" type="hidden" name="total_price">
        </form>
    </div>

@endsection
