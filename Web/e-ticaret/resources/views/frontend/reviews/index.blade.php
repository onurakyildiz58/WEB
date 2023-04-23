@extends('layouts.front')

@section('title', 'Yorum Yap')

@section('content')
    <div class="py-3 mb-4 shadow-sm bg-warning border-top">
        <div class="container">
            <h6 class="mb-0">
                <a href="{{ url('/') }}">Robo Raven</a> / <a href="{{ url('category') }}">Kategoriler</a> / <a href="{{ url('view-category/'.$prod_check->category->slug) }}">{{$prod_check->category->name}}</a> / <a href="{{ url('view-category/'.$prod_check->category->slug.'/'.$prod_check->slug) }}">{{ $prod_check->name }}</a> / Yorum Yap
            </h6>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Yorum Yap</h4>
                    </div>
                    <div class="card-body">
                        @if($verified_purchase->count() > 0)
                           <h5>{{ $prod_check->name }} Ürünü Hakkında Yorum Yapınız</h5>
                            <form action="{{ url('/add-review') }}" method="POST">
                                @csrf
                                <input type="hidden" name="prod_id" value="{{ $prod_check->id }}">
                                <textarea class="form-control mb-3" rows="5" name="review" placeholder="Yorum Yazınız"></textarea>
                                <button class="btn btn-success" type="submit">Yorumu Kaydet</button>
                            </form>
                        @else
                            <div class="alert alert-danger">
                                <h5 class="text-center pt-5">Yorum Yapmak İçin Ürünü Satın Alınız</h5>
                                <div class="card-body text-center">
                                    <a href="{{ url('category') }}" class="btn btn-outline-primary float-end">Alışverişe Devam Et</a>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div><br><br><br>
@endsection
