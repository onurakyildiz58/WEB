@extends('layouts.front')

@section('title')
    Kategoriler
@endsection

@section('content')
    <div class="py-3 mb-4 shadow-sm bg-warning border-top">
        <div class="container">
            <h6 class="mb-0">
                <a href="{{ url('/') }}">Robo Raven</a> / Kategoriler
            </h6>
        </div>
    </div>
    <div class="py-5">
        <div class="container">
            <div class="row">
                <h2>Kategorilerimiz</h2>
                <div class="owl-carousel owl-theme">
                    @foreach($category as $item)
                        <div class="item">
                            <a href="{{ url('view-category/'.$item->slug) }}">
                                <div class="card">
                                    <img src="{{ asset('assets/uploads/category/'. $item->image) }}" alt="kategori görseli" >
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
