@extends('layouts.admin')

@section('title')
    Siparişler
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <h4 class="pt-3" style="font-size: 30px">Onaylanan Siparişler
                <a href="{{ url('orders') }}" class="btn btn-danger float-right">Yenİ Sİparİşler</a>
            </h4>
        </div>
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                <tr>
                    <td class="tablo">Sipariş Tarihi</td>
                    <td class="tablo">Takip Numarası</td>
                    <td class="tablo">Toplam Fiyat</td>
                    <td class="tablo">Durum</td>
                    <td class="tablo"></td>
                </tr>
                </thead>
                <tbody>
                @foreach($orders as $item)
                    <tr>
                        <td>{{ date('d/m/Y', strtotime($item->created_at)) }}</td>
                        <td>{{ $item->tracking_no }}</td>
                        <td>{{ $item->total_price }} TL</td>
                        <td>
                            @if($item->status == '0')
                                Beklemede
                            @elseif($item->status == '1')
                                Onaylandı
                            @elseif($item->status == '2')
                                İptal
                            @elseif($item->status == '3')
                                Kargo Firmasına İletildi
                            @elseif($item->status == '4')
                                Dağıtımda
                            @elseif($item->status == '5')
                                Teslim Edildi
                            @endif
                        </td>
                        <td>
                            <a class="btn btn-primary" href="{{ url('admin/view_order/'.$item->id) }}"><i class="fa-solid fa-magnifying-glass"></i> İncele</a>
                        </td>
                    </tr>
                @endforeach

                </tbody>
            </table>
        </div>
    </div>
@endsection
