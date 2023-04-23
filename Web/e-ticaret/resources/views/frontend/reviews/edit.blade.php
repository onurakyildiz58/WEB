@extends('layouts.front')

@section('title', 'Yorum Güncelleme')

@section('content')
    <div class="py-3 mb-4 shadow-sm bg-warning border-top">
        <div class="container">
            <h6 class="mb-0">
                <a href="{{ url('/') }}">Robo Raven</a> / <a href="{{ url('category') }}">Kategoriler</a> / <a href="{{ url('view-category/'.$prod_check->category->slug) }}">{{$prod_check->category->name}}</a> / <a href="{{ url('view-category/'.$prod_check->category->slug.'/'.$prod_check->slug) }}">{{ $prod_check->name }}</a> / Yorum Düzenle
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
                        <h5>{{ $review->product->name }} Ürünü Hakkında Yorumu Güncelleyiniz</h5>
                        <form action="{{ url('/edit-review') }}" method="POST">
                            @csrf
                            @method('PUT')
                            <input type="hidden" name="review_id" value="{{ $review->id }}">
                            <textarea class="form-control mb-3" rows="5" name="review" placeholder="Yorum Yazınız">{{ $review->user_review }}</textarea>
                            <button class="btn btn-success" type="submit">Yorumu Güncelle</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div><br><br><br>
@endsection
