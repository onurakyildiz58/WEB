@extends('layouts.admin')

@section('title')
    Kategori Ekle
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <h4>Kategori ekle</h4>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ url('insert-category') }}" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="">İsim</label>
                        <input type="text" class="form-control" name="name">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">Slug</label>
                        <input type="text" class="form-control" name="slug">
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="">Açıklama</label>
                        <textarea name="description" rows="3" class="form-control"></textarea>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">Durum</label>
                        <input type="checkbox" name="status">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">popülarite</label>
                        <input type="checkbox" name="popular">
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="">Meta Başlığı</label>
                        <input type="text" class="form-control" name="meta_title">
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="">Meta Açıklaması</label>
                        <textarea name="meta_description" rows="3" class="form-control"></textarea>
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="">Meta Anahtar Kelimeleri</label>
                        <textarea name="meta_keywords" rows="3" class="form-control"></textarea>
                    </div>
                    <div class="col-md-12 mb-3">
                        <input class="form-control form-control-sm" id="formFileSm" type="file" name="image">
                    </div>
                    <div class="col-md-12 mb-3">
                        <button type="submit" class="btn btn-primary">Kaydet</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

@endsection
