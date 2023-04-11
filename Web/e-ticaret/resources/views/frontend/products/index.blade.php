@extends('layouts.front')

@section('title')
    {{ $category->name }}
@endsection

@section('content')
    <div class="py-3 mb-4 shadow-sm bg-warning border-top">
        <div class="container">
            <h6 class="mb-0">
                <a href="{{ url('/') }}">Robo Raven</a> / <a href="{{ url('category') }}">Kategoriler</a> / {{ $category->name }}
            </h6>
        </div>
    </div>
    <div class="py-5">
        <div class="container">
            <div class="row">
                <h2>{{ $category->name }}</h2>
                @foreach($products as $item)
                    <div class="com-md-3 mb-3 w-25">
                        <div class="card">
                            <a href="{{ url('view-category/'.$category->slug.'/'.$item->slug) }}">
                                <img src="{{ asset('assets/uploads/product/'. $item->image) }}" alt="ürün görseli" class="w-100">
                                <div class="card-body">
                                    <h5>{{ $item->name }}</h5>
                                    <small><s>{{ $item->original_price }} TL</s></small>
                                    <small>{{ $item->selling_price }} TL</small>
                                </div>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
