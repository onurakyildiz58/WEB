@extends('layouts.admin')

@section('title', 'Siparişim')

@section('content')
    <div class="card">
        <div class="card-header">
            <h4 class="pt-3" style="font-size: 30px">Sipariş
                <a class="btn btn-primary float-right" href="{{ url('orders') }}"><i class="fa-solid fa-arrow-left"></i> Gerİ</a>
            </h4>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6 order">
                    <h4>Sipariş Detayları</h4><hr>
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
                    <div class="mt-5 px-2">
                        <label>Sipariş Durumu</label>
                        <form action="{{ url('update-order/'.$orders->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <select class="form-select" name="order_status">
                                <option {{ $orders->status == '0' ? 'selected' : '' }} value="0">Beklemede</option>
                                <option {{ $orders->status == '1' ? 'selected' : '' }} value="1">Onaylandı</option>
                                <option {{ $orders->status == '2' ? 'selected' : '' }} value="2">İptal</option>
                                <option {{ $orders->status == '3' ? 'selected' : '' }} value="3">Kargo Firmasına İletildi</option>
                                <option {{ $orders->status == '4' ? 'selected' : '' }} value="4">Dağıtımda</option>
                                <option {{ $orders->status == '5' ? 'selected' : '' }} value="5">Teslim Edildi</option>
                            </select>
                            <button class="btn btn-primary mt-3 float-right" type="submit">Onayla</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
