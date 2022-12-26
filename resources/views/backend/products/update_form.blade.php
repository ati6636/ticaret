@extends("backend.shared.backend_theme")
@section("title", "Ürün Modülü")
@section("subtitle",'Ürün Güncelle' )
@section("btn_url",url()->previous())
@section("btn_label","Geri Dön")
@section("btn_icon","fa-solid fa-arrow-left")
@section("content")
    <form action="{{url("/products/$product->product_id")}}" method="post">
        @csrf
        @method("PUT")
        <input type="hidden" name="product_id" value="{{$product->product_id}}">
        <div class="row">
            <div class="col-md-12 mb-3">
                <label for="category_id" class="form-label">Kategori Seçiniz</label>
                <select name="category_id" id="category_id" class="form-control">
                    <option value="-1">Seçiniz</option>
                    @foreach($categories as $category)
                        <option
                            value="{{$category->category_id}}" {{$product->category_id == $category->category_id ? "selected" : ""}}>
                            {{$category->name}}
                        </option>
                    @endforeach
                </select>
                @error("category_id")
                <span class="text-bg-danger">{{$message}}</span>
                @enderror
            </div>

            <div class="col-md-12 mb-3">
                <x-input label="Ürün Adı" placeholder="Ürün Adı Giriniz" field="name" value="{{$product->name}}"/>
            </div>

        </div>
        <div class="row">

            <div class="col-md-6 mb-3">
                <x-input label="Ürün Fiyatı" placeholder="Ürün Fiyatı Giriniz" field="price"
                         value="{{$product->price}}"/>
            </div>

            <div class="col-md-6 mb-3">
                <x-input label="Eski Ürün Fiyatı" placeholder="Eski Ürün Fiyatı Giriniz" field="old_price"
                         value="{{$product->old_price}}"/>
            </div>

        </div>
        <div class="row">
            <div class="col-md-12 mb-3">
                <x-input label="Kısa Açıklama" placeholder="Kısa Açıklama" field="lead" value="{{$product->lead}}"/>
            </div>

            <div class="col-md-12 mb-3">
                <x-textarea label="Detaylı Açıklama" placeholder="Detaylı Açıklama" field="description"
                            value="{{$product->description}}"/>
            </div>

            <div class="col-md-6 mb-3">
                <x-checkbox label="Aktif Ürün" field="is_active" checked="{{$product->is_active == 1}}"/>
            </div>

        </div>

        <div class="row">
            <div class="col-lg-12">
                <button type="submit" class="btn btn-md btn-success btn-"><i class="fa-solid fa-floppy-disk"></i>
                    Güncelle
                </button>
            </div>
        </div>
    </form>
@endsection
