@extends("backend.shared.backend_theme")
@section("title", "Ürün Modülü")
@section("subtitle",'Yeni Ürün Ekle' )
@section("btn_url",url()->previous())
@section("btn_label","Geri Dön")
@section("btn_icon","fa-solid fa-arrow-left")
@section("content")
    <form action="/products" method="post">
        @csrf
        <div class="row">
            <div class="col-md-12 mb-3">
                <label for="category_id" class="form-label">Kategori Seçiniz</label>
                <select name="category_id" id="category_id" class="form-control">
                    <option value="-1">Seçiniz</option>
                    @foreach($categories as $category)
                        <option value="{{$category->category_id}}">{{$category->name}}</option>
                    @endforeach
                </select>
                @error("cataegory_id")
                <span class="text-bg-danger">{{$message}}</span>
                @enderror
            </div>

            <div class="col-md-12 mb-3">
                <x-input label="Ürün Adı" placeholder="Ürün Adı Giriniz" field="name"/>
            </div>

        </div>
        <div class="row">

            <div class="col-md-6 mb-3">
                <x-input label="Ürün Fiyatı" placeholder="Ürün Fiyatı Giriniz" field="price"/>
            </div>

            <div class="col-md-6 mb-3">
                <x-input label="Eski Ürün Fiyatı" placeholder="Eski Ürün Fiyatı Giriniz" field="old_price"/>
            </div>

        </div>
        <div class="row">
            <div class="col-md-12 mb-3">
                <x-input label="Kısa Açıklama" placeholder="Kısa Açıklama" field="lead"/>
            </div>

            <div class="col-md-12 mb-3">
                <x-textarea label="Detaylı Açıklama" placeholder="Detaylı Açıklama" field="description"/>
            </div>

            <div class="col-md-6 mb-3">
                <x-checkbox label="Aktif Ürün" field="is_active"/>
            </div>

        </div>

        <div class="row">
            <div class="col-lg-12">
                <button type="submit" class="btn btn-md btn-success btn-"><i class="fa-solid fa-floppy-disk"></i>
                    Kaydet
                </button>
            </div>
        </div>
    </form>
@endsection
