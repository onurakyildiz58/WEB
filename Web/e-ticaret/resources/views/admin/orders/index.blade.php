@extends('layouts.admin')

@section('title')
    Siparişler
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <h4 class="pt-3" style="font-size: 30px">Siparişler
                <a href="{{ url('order-history') }}" class="btn btn-danger float-right">Tüm Sİparİşler</a>
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
                        <td>{{ $item->status == '0' ? 'Beklemede' : 'Onaylandı' }}</td>
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
