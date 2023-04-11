@extends('layouts.admin')

@section('content')
    <div class="card">
        <div class="card-header">
            <h4>Ürünler</h4>
        </div>
        <br>
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Kategori</th>
                    <th>İsim</th>
                    <th>Satış Fiyatı</th>
                    <th>Görsel</th>
                    <th>Güncelle/Sil</th>
                </tr>
                </thead>
                <tbody>
                @foreach($products as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->category->name }}</td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->selling_price }} TL</td>
                        <td>
                            <img src="{{ asset('assets/uploads/product/'. $item->image) }}" style="width: 150px" alt="image here">
                        </td>
                        <td>
                            <a href="{{ url('edit-prod/'.$item->id) }}" class="btn btn-primary">Düzenle</a>
                            <a href="{{ url('delete-prod/'.$item->id) }}" class="btn btn-danger">Sil</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection
