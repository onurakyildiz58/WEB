@extends('layouts.admin')

@section('title')
    Kullanıcılar
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <h4>Kullanıcılar</h4>
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Kayıt Tarihi</th>
                    <th>İsim</th>
                    <th>Email</th>
                    <th>Telefon</th>
                    <th>Göster</th>
                </tr>
                </thead>
                <tbody>
                @foreach($users as $item)
                    @if($item->role_as == '0')
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td>{{ date('d/m/Y', strtotime($item->created_at)) }}</td>
                            <td>{{ $item->name.' '.$item->lname}}</td>
                            <td>{{ $item->email }}</td>
                            <td>{{ $item->phone }}</td>
                            <td>
                                <a href="{{ url('view-user/'.$item->id) }}" class="btn btn-primary">İncele</a>
                            </td>
                        </tr>
                    @endif

                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
