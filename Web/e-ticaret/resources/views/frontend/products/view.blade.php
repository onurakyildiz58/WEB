@extends('layouts.front')

@section('title', $products->name)

@section('content')

    <div class="py-3 mb-4 shadow-sm bg-warning border-top">
        <div class="container">
            <h6 class="mb-0">
                <a href="{{ url('/') }}">Robo Raven</a> / <a href="{{ url('category') }}">Kategoriler</a> / <a href="{{ url('view-category/'.$products->category->slug) }}">{{$products->category->name}}</a> / {{ $products->name }}
            </h6>
        </div>
    </div>
    <div class="container">
        <div class="card shadow product_data">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4 border-right w-25">
                        <img src="{{ asset('assets/uploads/product/'. $products->image) }}" class="w-100" alt="prod image">
                    </div>
                    <div class="col-md-8">
                        <h2 class="mb-0">
                            {{ $products->name }}
                            @if($products->trending == '1')
                                <label style="font-size: 16px" class="float-end badge bg-danger trending_tag">Trend</label>
                            @endif
                        </h2>
                        <br>
                        <label class="me-3">Orijinal Fiyat : <s>{{ $products->original_price }} TL</s></label>
                        <label class="fw-bold">Satış Fiyatı : {{ $products->selling_price }} TL</label>
                        <p class="mt-3">
                            {!! $products->description !!}
                        </p>
                        <br>
                        @if($products->qty > 0 and $products->status == 0)
                            <label class="badge bg-success">Stokta Var</label>
                        @else
                            <label class="badge bg-danger">Stokta Yok</label>
                        @endif
                        <div class="row mt-2">
                            <div class="col-md-2">
                                <label for="Quantity">Adet</label>
                                <div class="input-group text-center mb-3">
                                    <input type="hidden" value="{{ $products->id }}" class="prod_id">
                                    <button class="input-group-text decrement-btn " style="cursor: pointer">-</button>
                                    <input class="form-control qty-input text-center" type="text" name="quantity" value="1"/>
                                    <button class="input-group-text increment-btn"  style="cursor: pointer">+</button>
                                </div>
                            </div>
                            <div class="col-md-10">
                                <br>
                                @if($products->qty > 0 and $products->status == 0)
                                    <button type="button" class="btn btn-success me-3 float-start addToWishListBtn">İstek Listesine Ekle <i class="fas fa-heart"></i></button>
                                    <button type="button" class="btn btn-primary me-3 float-start addToCartBtn">Sepete Ekle <i class="fas fa-cart-shopping"></i></button>
                                @else
                                    <button type="button" class="btn btn-success me-3 float-start addToWishListBtn">İstek Listesine Ekle <i class="fas fa-heart"></i></button>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function ()
        {
            $('.increment-btn').click(function (e)
            {
                e.preventDefault();
                var value_inc = $('.qty-input').val();
                var value = parseInt(value_inc, 10);
                value = isNaN(value) ? 0 : value;
                if(value < 10)
                {
                    value++;
                    $('.qty-input').val(value);
                }
            });
            $('.decrement-btn').click(function (e)
            {
                e.preventDefault();
                var value_inc = $('.qty-input').val();
                var value = parseInt(value_inc, 10);
                value = isNaN(value) ? 0 : value;
                if(value > 1)
                {
                    value--;
                    $('.qty-input').val(value);
                }
            });
            $('.addToCartBtn').click(function (e)
            {
                e.preventDefault();

                var product_id = $(this).closest('.product_data').find('.prod_id').val();
                var product_qty = $(this).closest('.product_data').find('.qty-input').val();

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    method: "POST",
                    url: "/add-to-cart",
                    data: {
                        'product_id': product_id,
                        'product_qty': product_qty,
                    },
                    datatype: "dataType",
                    success: function (response){
                        window.location.reload();
                        swal(response.status);
                    }
                });
            });
            $('.addToWishListBtn').click(function (e)
            {
                e.preventDefault();

                var product_id = $(this).closest('.product_data').find('.prod_id').val();

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    method: "POST",
                    url: "/add-to-wishlist",
                    data: {
                        'product_id': product_id,
                    },
                    datatype: "dataType",
                    success: function (response){
                        window.location.reload();
                        swal(response.status);
                    }
                });
            });
        });
    </script>
@endsection
