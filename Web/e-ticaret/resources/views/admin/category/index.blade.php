@extends('layouts.admin')

@section('title')
    Kategoriler
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <h4>Kategoriler</h4>
        </div>
        <br>
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>İsim</th>
                        <th>Açıklama</th>
                        <th>Görsel</th>
                        <th>Güncelle/Sil</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($category as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->description }}</td>
                        <td>
                            <img src="{{ asset('assets/uploads/category/'. $item->image) }}" style="width: 150px" alt="image here">
                        </td>
                        <td>
                            <a href="{{ url('edit-cate/'.$item->id) }}" class="btn btn-primary">Düzenle</a>
                            <a href="{{ url('delete-category/'.$item->id) }}" class="btn btn-danger">Sil</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection
