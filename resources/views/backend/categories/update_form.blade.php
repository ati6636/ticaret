@extends("backend.shared.backend_theme")
@section("title", "Kullanıcı Modülü")
@section("subtitle",'Kategori Güncelle' )
@section("btn_url",url()->previous())
@section("btn_label","Geri Dön")
@section("btn_icon","fa-solid fa-arrow-left")
@section("content")
    <form action="{{url("/categories/$category->category_id")}}" method="post">
        @csrf
        @method("PUT")
        <input type="hidden" name="category_id" value="{{$category->category_id}}">
        <div class="row">
            <div class="col-md-6 mb-3">
                <x-input label="Kategori Adı" placeholder="Kategori Adı Giriniz" field="name"
                         value="{{$category->name}}"/>
            </div>

            <div class="col-md-6 mb-3">
                <x-input label="Slug" placeholder="Slug Giriniz" field="slug"
                         value="{{$category->slug}}"/>
            </div>

            <div class="col-md-6 mb-3">
                <x-checkbox label="Aktif Kategori" field="is_active" checked="{{$category->is_active == 1}}"/>
            </div>
        </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <button type="submit" class="btn btn-md btn-success "><i class="fa-solid fa-file-pen"></i> Güncelle
                </button>
            </div>
        </div>
    </form>
@endsection
