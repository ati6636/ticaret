@extends("backend.shared.backend_theme")
@section("title", "Kullanıcı Adres Modülü")
@section("subtitle",'Yeni Adres Ekle' )
@section("btn_url",url("/users/$user->user_id/addresses"))
@section("btn_label","Geri Dön")
@section("btn_icon","fa-solid fa-arrow-left")
@section("content")
    <form action="{{url("/users/$user->user_id/addresses")}}" method="post">
        @csrf
        <input type="hidden" name="user_id" value="{{$user->user_id}}">
        <div class="row">
            <div class="col-md-6 mb-3">
                <x-input label="Şehir" placeholder="Şehir Giriniz" field="city" />
            </div>

            <div class="col-md-6 mb-3">
                <x-input label="İlçe" placeholder="İlçe Giriniz" field="district" />
            </div>

            <div class="col-md-6 mb-3">
                <x-input label="Posta Kodu" placeholder="Posta Kodu Giriniz" field="zipcode" />
            </div>

            <div class="col-md-6 mt-5 mb-3">
                <x-checkbox label="Varsayılan" field="is_default" />
            </div>

            <div class="col-md-12 mb-3">
                <x-textarea label="Açık Adres" placeholder="Açık Adres Giriniz" field="address" />
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
