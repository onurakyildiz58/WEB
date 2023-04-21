@extends('layouts.admin')

@section('title')
    Ürün Güncelle
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <h4>Ürün Düzenle</h4>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ url('update-product/'.$products->id) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-md-12 mb-3">
                        <select class="form-select">
                            <option selected value="">{{ $products->category->name }}</option>
                        </select>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">İsim</label>
                        <input type="text" class="form-control" name="name" value="{{ $products->name }}">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">Slug</label>
                        <input type="text" class="form-control" name="slug" value="{{ $products->slug }}">
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="">Kısa Açıklama</label>
                        <textarea name="small_description" rows="3" class="form-control">{{ $products->small_description }}</textarea>
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="">Açıklama</label>
                        <textarea name="description" rows="3" class="form-control">{{ $products->description }}</textarea>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">Orijinal fiyat</label>
                        <input type="number" class="form-control" name="original_price" value="{{ $products->original_price }}">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">Satış Fiyatı</label>
                        <input type="number" class="form-control" name="selling_price"  value="{{ $products->selling_price }}">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">Vergi</label>
                        <input type="number" class="form-control" name="tax"  value="{{ $products->tax }}">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">Miktar</label>
                        <input type="number" class="form-control" name="qty"  value="{{ $products->qty }}">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">Durum</label>
                        <input type="checkbox" name="status" {{ $products->status == '1' ? 'checked' : '' }}>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">Trend</label>
                        <input type="checkbox" name="trending" {{ $products->trending == '1' ? 'checked' : '' }}>
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="">Meta başlığı</label>
                        <input type="text" class="form-control" name="meta_title"  value="{{ $products->meta_title }}">
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="">Meta Açıklaması</label>
                        <textarea name="meta_description" rows="3" class="form-control">{{ $products->meta_description }}</textarea>
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="">Meta Anahtar Kelimeleri</label>
                        <textarea name="meta_keywords" rows="3" class="form-control">{{ $products->meta_keywords }}</textarea>
                    </div>
                    @if($products->image)
                        <img src="{{ asset('assets/uploads/product/'.$products->image) }}" alt="ürün görsel" style="width: 150px">
                    @endif
                    <div class="col-md-12 mb-3">
                        <input class="form-control" type="file" name="image" value="{{ $products->image }}">
                    </div>
                    <div class="col-md-12 mb-3">
                        <button type="submit" class="btn btn-primary">Güncelle</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

@endsection
