@extends("backend.shared.backend_theme")
@section("title", "Kullanıcı Modülü")
@section("subtitle",'Şifre Güncelle' )
@section("btn_url",url("/users"))
@section("btn_label","Geri Dön")
@section("btn_icon","fa-solid fa-arrow-left")
@section("content")
    <form action="{{url("/users/$user->user_id/change-password")}}" method="post">
        @csrf
        <div class="col-md-6 mb-3">
            <x-input label="Şifre" type="password" placeholder="Şifre Giriniz" field="password"/>
        </div>

        <div class="col-md-6 mb-3">
            <x-input label="Şifre Tekrarı" type="password" placeholder="Şifre Tekrarı" field="password_confirmation"/>
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
