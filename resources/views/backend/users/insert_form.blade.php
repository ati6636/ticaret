@extends("backend.shared.backend_theme")
@section("title", "Kullanıcı Modülü")
@section("subtitle",'Yeni Kullanıcı Ekle' )
@section("btn_url",url("/users"))
@section("btn_label","Geri Dön")
@section("btn_icon","fa-solid fa-arrow-left")
@section("content")
    <form action="/users" method="post">
        @csrf
        <div class="row">
            <div class="col-md-6 mb-3">
                <x-input label="Adı ve Soyadı" placeholder="Adı ve Soyadı Giriniz" field="name"/>
            </div>

            <div class="col-md-6 mb-3">
                <x-input label="E-Mail" type="email" placeholder="E-Mail Giriniz" field="email"/>
            </div>

            <div class="col-md-6 mb-3">
                <x-input label="Şifre" type="password" placeholder="Şifre Giriniz" field="password"/>
            </div>

            <div class="col-md-6 mb-3">
                <x-input label="Şifre Tekrarı" type="password" placeholder="Şifre Tekrarı" field="password_confirmation"/>
            </div>

            <div class="col-md-6 mb-3">
                <x-checkbox label="Yetkili Kullanıcı" field="is_admin"/>
            </div>

            <div class="col-md-6 mb-3">
                <x-checkbox label="Aktif Kullanıcı" field="is_active"/>
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
