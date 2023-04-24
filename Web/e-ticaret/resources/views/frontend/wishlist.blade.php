@extends('layouts.front')

@section('title', 'İstek Listem')

@section('content')
    <div class="py-3 mb-4 shadow-sm bg-warning border-top">
        <div class="container">
            <h6 class="mb-0">
                <a href="{{ url('/') }}">Robo Raven</a> / İstek Listem
            </h6>
        </div>
    </div>
    <div class="container">
        <div class="card shadow wishlistitem">
            @if($wishlist->count() > 0)
                <div class="card-body">
                    @foreach($wishlist as $item)
                        <div class="row product_data">
                            <div class="col-md-2">
                                <img src="{{ asset('assets/uploads/product/'.$item->product->image)  }}" alt="ürün resmi" style="height: 70px;width: 70px;">
                            </div>
                            <div class="col-md-2">
                                <h3 class="mt-4">{{ $item->product->name }}</h3>
                            </div>
                            <div class="col-md-2 ">
                                <h3 class="mt-4 price">{{ $item->product->selling_price }} TL</h3>
                            </div>
                            <div class="col-md-2">
                                <input type="hidden" class="prod_id" value="{{ $item->prod_id }}">
                                @if($item->product->qty > 0 and $item->product->status == 0)
                                    <label for="Quantity">Miktar</label>
                                    <div class="input-group text-center mb-3" style="width: 130px">
                                        <button class="input-group-text decrement-btn" style="cursor: pointer">-</button>
                                        <input class="form-control qty-input text-center" type="text" name="quantity" value="1"/>
                                        <button class="input-group-text increment-btn"  style="cursor: pointer">+</button>
                                    </div>
                                @else
                                    <div class="input-group text-center mb-3" style="width: 130px">
                                        <input class="form-control text-center bg-danger  mt-3" style="color: white" type="text" value="Stokta Yok" disabled/>
                                    </div>
                                @endif
                            </div>
                            <div class="col-md-2">
                                <button type="button" class="btn btn-success mt-3 addToCartBtn"><i class="fas fa-cart-shopping"></i> Sepete Ekle</button>
                            </div>
                            <div class="col-md-2">
                                <button type="button" class="btn btn-danger mt-3 remove-wishlist-item"><i class="fas fa-trash"></i> Sil</button>
                            </div>
                        </div>
                        <hr>
                    @endforeach
                </div>
            @else
                <div class="card-body text-center">
                    <h2><i class="fa-solid fa-heart"></i> İstek Listeniz Boştur</h2>
                    <a href="{{ url('category') }}" class="btn btn-outline-primary float-end">Alışverişe Devam Et</a>
                </div>
            @endif
        </div>
    </div><br><br><br><br><br><br><br><br>
@endsection

@section('scripts')
    <script>
        $(document).ready(function ()
        {
            $('.increment-btn').click(function (e) {
                e.preventDefault();
                var value_inc = $(this).closest('.product_data').find('.qty-input').val();
                var value = parseInt(value_inc, 10);
                value = isNaN(value) ? 0 : value;
                if (value < 10) {
                    value++;
                    $(this).closest('.product_data').find('.qty-input').val(value);
                }
            });
            $('.decrement-btn').click(function (e) {
                e.preventDefault();
                var value_inc = $(this).closest('.product_data').find('.qty-input').val();
                var value = parseInt(value_inc, 10);
                value = isNaN(value) ? 0 : value;
                if (value > 1) {
                    value--;
                    $(this).closest('.product_data').find('.qty-input').val(value);
                }
            });
        });
        $(document).on('click', '.addToCartBtn', function (e)
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
                    $('.wishlistitem').load(location.href + ' .wishlistitem');
                    swal(response.status);
                }
            });
        });
        $(document).on('click', '.remove-wishlist-item', function (e)
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
                url: "/remove-from-wishlist",
                data: {
                    'product_id': product_id,
                },
                datatype: "dataType",
                success: function (response){
                    $('.wishlistitem').load(location.href + ' .wishlistitem');
                    swal(response.status);
                }
            });
        });
    </script>
@endsection
