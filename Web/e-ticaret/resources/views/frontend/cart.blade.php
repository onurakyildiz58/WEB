@extends('layouts.front')

@section('title', 'Sepetim')

@section('content')
    <div class="py-3 mb-4 shadow-sm bg-warning border-top">
        <div class="container">
            <h6 class="mb-0">
                <a href="{{ url('/') }}">Robo Raven</a> / Sepetim
            </h6>
        </div>
    </div>
    <div class="container my-5">
        <div class="card shadow cartitems">
            @if($cart->count() > 0)
                <div class="card-body">
                    @php $total = 0; $total_KDV = 0; $KDV = 0; $indirim = 0@endphp
                    @foreach($cart as $item)
                        <div class="row product_data">
                            <div class="col-md-2">
                                <img src="{{ asset('assets/uploads/product/'.$item->product->image)  }}" alt="ürün resmi" style="height: 70px;width: 70px;">
                            </div>
                            <div class="col-md-3">
                                <h3 class="mt-4">{{ $item->product->name }}</h3>
                            </div>
                            <div class="col-md-2 ">
                                <h3 class="mt-4 price">{{ $item->product->selling_price }} TL</h3>
                                <h3 class="mt-4 price" style="display: none">{{ $item->product->original_price }} TL</h3>
                            </div>
                            <div class="col-md-3">
                                <input type="hidden" class="prod_id" value="{{ $item->prod_id }}">
                                @if($item->product->qty >= $item->prod_qty and $item->product->status == 0)
                                    <label for="Quantity">Miktar</label>
                                    <div class="input-group text-center mb-3" style="width: 130px">
                                        <button class="input-group-text decrement-btn changeQuantity" style="cursor: pointer">-</button>
                                        <input class="form-control qty-input text-center" type="text" name="quantity" value="{{ $item->prod_qty }}"/>
                                        <button class="input-group-text increment-btn changeQuantity"  style="cursor: pointer">+</button>
                                    </div>
                                    @php $total += $item->product->selling_price * $item->prod_qty  @endphp
                                    @php $total_KDV += $item->product->original_price * $item->prod_qty  @endphp
                                    @php $KDV =  $total_KDV - $total @endphp
                                    @php $indirim = $KDV*18/100 @endphp
                                @else
                                    <div class="input-group text-center mb-3" style="width: 130px">
                                        <input class="form-control text-center bg-danger  mt-3" style="color: white" type="text" value="Stokta Yok" disabled/>
                                    </div>
                                @endif
                            </div>
                            <div class="col-md-2">
                                <button class="btn btn-danger mt-3 delete-cart-item"><i class="fas fa-trash"></i> Sil</button>
                            </div>
                        </div>
                        <hr>

                    @endforeach
                    <div class="container my-5">
                        <div class="row">
                            <div class="card-footer">
                                <strong><h6 style="font-size: 18px;">KDV'nin %18'i iade</h6><br></strong>
                                <h6>Fiyat + KDV : {{ $total }}</h6><br>
                                <h6>KDV : {{ $KDV }} TL</h6><hr>
                                <h6>Toplam Fiyat : {{ $total - $indirim }} TL
                                    <a class="btn btn-outline-success float-end" href="{{ url('checkout') }}">Satın Al</a>
                                </h6>
                            </div>
                        </div>
                    </div>
                </div>
            @else
                <div class="card-body text-center">
                    <h2><i class="fas fa-cart-shopping"></i> Sepetiniz Boştur</h2>
                    <a href="{{ url('category') }}" class="btn btn-outline-primary float-end">Alışverişe Devam Et</a>
                </div>
            @endif

        </div>
    </div><br><br><br><br><br>
@endsection
@section('scripts')
    <script>
        $(document).ready(function ()
        {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
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
            $(document).on('click', '.delete-cart-item', function (e){
                e.preventDefault();
                var prod_id = $(this).closest('.product_data').find('.prod_id').val();

                $.ajax({
                    method: "POST",
                    url: "delete-cart-item",
                    data: {
                        'prod_id': prod_id,
                    },
                    success: function (response){
                        $('.cartitems').load(location.href + " .cartitems");
                        swal("", response.status);
                    }
                });
            });
            $('.changeQuantity').click(function (e){
                e.preventDefault();
                var prod_id = $(this).closest('.product_data').find('.prod_id').val();
                var prod_qty= $(this).closest('.product_data').find('.qty-input').val();
                $.ajax({
                    method: "POST",
                    url: "update-cart",
                    data: {
                        'prod_id' : prod_id,
                        'prod_qty' : prod_qty,
                    },
                    success: function (response){
                        window.location.reload();
                    }
                });
            });
        });
    </script>
@endsection
