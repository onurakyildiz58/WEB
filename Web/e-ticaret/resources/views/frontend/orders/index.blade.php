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
                                    <td>{{ $item->status == '0' ? 'Onaylanıyor' : 'Onaylandı' }}</td>
                                    <td>
                                        <a class="btn btn-primary" href="{{ url('view_order/'.$item->id) }}"><i class="fa-solid fa-magnifying-glass"></i> İncele</a>
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
