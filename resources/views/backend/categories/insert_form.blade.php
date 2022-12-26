@extends("backend.shared.backend_theme")
@section("title", "Kullanıcı Modülü")
@section("subtitle",'Yeni Kategori Ekle' )
@section("btn_url",url("/categories"))
@section("btn_label","Geri Dön")
@section("btn_icon","fa-solid fa-arrow-left")
@section("content")
    <form action="/categories" method="post">
        @csrf
        <div class="row">
            <div class="col-md-6 mb-3">
                <x-input label="Kategori Adı" placeholder="Kategori Adı Giriniz" field="name"/>
            </div>

            <div class="col-md-6 mt-5">
                <x-checkbox label="Aktif Kategori" field="is_active"/>
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
