@extends('layouts.front')

@section('title', $products->name)

@section('content')
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="{{ url('/rating') }}" method="POST">
                    @csrf
                    <input type="hidden" value="{{ $products->id }}" name="prod_id">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">{{ $products->name }} Ürününü Puanla</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="rating-css">
                            <div class="star-icon">
                                @if($user_rating)
                                    @for($i = 1; $i<=$user_rating->stars_rated; $i++)
                                        <input type="radio" value="{{ $i }}" name="product_rating" checked id="rating{{ $i }}">
                                        <label for="rating{{ $i }}" class="fa fa-star"></label>
                                    @endfor
                                    @for($i = $user_rating->stars_rated+1; $i<=5; $i++)
                                        <input type="radio" value="{{ $i }}" name="product_rating" id="rating{{ $i }}">
                                        <label for="rating{{ $i }}" class="fa fa-star"></label>
                                    @endfor
                                @else
                                    <input type="radio" value="1" name="product_rating" checked id="rating1">
                                    <label for="rating1" class="fa fa-star"></label>
                                    <input type="radio" value="2" name="product_rating" id="rating2">
                                    <label for="rating2" class="fa fa-star"></label>
                                    <input type="radio" value="3" name="product_rating" id="rating3">
                                    <label for="rating3" class="fa fa-star"></label>
                                    <input type="radio" value="4" name="product_rating" id="rating4">
                                    <label for="rating4" class="fa fa-star"></label>
                                    <input type="radio" value="5" name="product_rating" id="rating5">
                                    <label for="rating5" class="fa fa-star"></label>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kapat</button>
                        <button type="submit" class="btn btn-primary">Puanla</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="py-3 mb-4 shadow-sm bg-warning border-top">
        <div class="container">
            <h6 class="mb-0">
                <a href="{{ url('/') }}">Robo Raven</a> / <a href="{{ url('category') }}">Kategoriler</a> / <a href="{{ url('view-category/'.$products->category->slug) }}">{{$products->category->name}}</a> / {{ $products->name }}
            </h6>
        </div>
    </div>
    <div class="container">
        <div class="card shadow product_data add">
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
                        <hr>
                        <label class="me-3">Orijinal Fiyat : <s>{{ $products->original_price }} TL</s></label>
                        <label class="fw-bold">Satış Fiyatı : {{ $products->selling_price }} TL</label>
                        <div class="rating float-end">
                            <p>{{ $rating->count() }} Değerlendirme</p>
                            @for($i = 1; $i<=number_format($rating_val); $i++)
                                <i class="fa fa-star" style="color: #eed219"></i>
                            @endfor
                            @for($i = number_format($rating_val) + 1; $i<=5; $i++)
                                <i class="fa fa-star"></i>
                            @endfor
                            @if($rating_val > 0)
                                {{ number_format($rating_val) }}
                            @else
                                Puanlama Yok
                            @endif

                        </div>
                        <p class="mt-3">
                            {!! $products->description !!}
                        </p>
                        <div>
                            <button type="button" class="btn btn-success" style="margin-right: 10px" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                {{ $products->name }} Ürününü Puanla
                            </button>
                            <a href="{{ url('addComment/'.$products->slug.'/user_comments') }}" class="btn btn-primary">
                                {{ $products->name }} Ürün Hakkında Yorum Yap
                            </a>
                        </div>
                        <hr>
                        @if($products->qty > 0 and $products->status == 0)
                            <label class="badge bg-success">Stokta Var</label>
                        @else
                            <label class="badge bg-danger">Stokta Yok</label>
                        @endif
                        <div class="row mt-2"   >
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
        @php $user_rated = 0 @endphp
        <div class="col-md-12 shadow mt-3 p-3">
            <h2 class="">Yorumlar</h2><hr>
            @foreach($reviews as $item)
                <div class="user-review">
                    <label class="fw-bold">{{ $item->user->name.' '.$item->user->lname }}</label><br>
                    @if($item->user_id == Auth::id())
                        <a href="{{ url('edit-review/'.$products->slug.'/userreview') }}" class="float-end btn btn-primary" >Düzenle</a>
                    @endif
                    @php $rating_comment = App\Models\Rating::where('prod_id', $products->id)->where('user_id', $item->user->id)->first(); @endphp
                    @if($rating_comment)
                        @php $user_rated = $rating_comment->stars_rated @endphp
                            @for($i = 1; $i<=$user_rated; $i++)
                                <i class="fa fa-star" style="color: #eed219"></i>
                            @endfor
                            @for($i = $user_rated + 1; $i<=5; $i++)
                                <i class="fa fa-star"></i>
                            @endfor
                    @endif

                    <small>{{$item->created_at->format('d/M/Y')}} tarihinde incelendi</small>
                    <p class="pt-2">
                        {{ $item->user_review }}
                    </p><hr>
                </div>
            @endforeach
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
                        //window.location.reload();
                        $('.add').load(location.href + " .add");
                        swal(response.status);
                    }
                });
            });

            $(document).on('click', '.addToWishListBtn', function (e)
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
                        //window.location.reload();
                        $('.add').load(location.href + " .add");
                        swal(response.status);
                    }
                });
            });

        });

    </script>
@endsection
