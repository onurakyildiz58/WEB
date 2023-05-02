@extends('layouts.front')

@section('title', 'Siparişlerim')

@section('content')
    <div class="py-3 mb-4 shadow-sm bg-warning border-top">
        <div class="container">
            <h6 class="mb-0">
                <a href="{{ url('/') }}">Robo Raven</a> / Siparişlerim
            </h6>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Siparişlerim</h4>
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
                                        <a class="btn btn-primary" href="{{ url('view_order/'.$item->id) }}"><i class="fa-solid fa-magnifying-glass"></i> İncele</a>
                                    </td>
                                    <td>
                                        @if($item->status == '2')
                                            <a class="btn btn-danger" href="{{ url('delete_order/'.$item->id.'/'.$item->total_price) }}"><i class="fa-solid fa-trash"></i> Sil</a>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
