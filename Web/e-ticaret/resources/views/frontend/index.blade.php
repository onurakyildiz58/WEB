@extends('layouts.front')

@section('title')
    Robo Raven
@endsection

@section('content')
    @foreach($user as $item)
        {{ $item->money }} para
    @endforeach

    @include('layouts.inc.slider')

    <div class="py-5">
        <div class="container">
            <div class="row">
                <h2>Trend Ürünlerimiz</h2>
                <div class="owl-carousel owl-theme">
                    @foreach($featured_products as $item)
                        <div class="item">
                            <div class="card">
                                <img src="{{ asset('assets/uploads/product/'. $item->image) }}" alt="ürün görseli" >
                                <div class="card-body">
                                    <h5>{{ $item->name }}</h5>
                                    <small><s>{{ $item->original_price }} TL</s></small>
                                    <small>{{ $item->selling_price }} TL</small>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <div class="py-5">
        <div class="container">
            <div class="row">
                <h2>Trend Kategorilerimiz</h2>
                <div class="owl-carousel owl-theme">
                    @foreach($featured_category as $item)
                        <div class="item">
                            <a href="{{ url('view-category/'.$item->slug) }}">
                                <div class="card">
                                    <img src="{{ asset('assets/uploads/category/'. $item->image) }}" alt="ürün görseli" >
                                    <div class="card-body">
                                        <h5>{{ $item->name }}</h5>
                                        <p>{{ $item->description }}</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $('.owl-carousel').owlCarousel({
            loop:true,
            margin:10,
            nav:false,
            dots:false,
            responsive:{
                0:{
                    items:1
                },
                600:{
                    items:3
                },
                1000:{
                    items:5
                }
            }
        })
    </script>

@endsection
