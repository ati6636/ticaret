@extends("backend.shared.backend_theme")
@section("title", "Fotoğraf Modülü")
@section("subtitle",'Yeni Fotoğraf Ekle' )
@section("btn_url",url("/products/$product->product_id/images"))
@section("btn_label","Geri Dön")
@section("btn_icon","fa-solid fa-arrow-left")
@section("content")
    <form action="{{url("/products/$product->product_id/images")}}" method="post" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="product_id" value="{{$product->product_id}}">
        <div class="row">
            <div class="col-md-6 mb-3">
                <x-input label="Dosya Yükle" placeholder="" field="image_url" type="file" />
            </div>

            <div class="col-md-6 mb-3">
                <x-input label="Açıklama" placeholder="Kısa Açıklama Giriniz" field="alt" />
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 mb-3">
                <x-input label="Sıra No" placeholder="Sıra No Giriniz" field="seq" />
            </div>

            <div class="col-md-6 mt-5 mb-3">
                <x-checkbox label="Aktif" field="is_active" />
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <button type="submit" class="btn btn-md btn-success"><i class="fa-solid fa-floppy-disk"></i>
                    Kaydet
                </button>
            </div>
        </div>
    </form>
@endsection
