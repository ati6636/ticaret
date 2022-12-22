@extends("backend.shared.backend_theme")
@section("title", "Kullanıcı Modülü")
@section("subtitle",'Kullanıcı Güncelle' )
@section("btn_url",url("/users"))
@section("btn_label","Geri Dön")
@section("btn_icon","fa-solid fa-arrow-left")
@section("content")
    <form action="{{url("/users/$user->user_id/addresses/$addr->address_id")}}" method="post">
        @csrf
        @method('PUT')
        <input type="hidden" name="user_id" value="{{$user->user_id}}">
        <input type="hidden" name="address_id" value="{{$addr->address_id}}">
        <div class="row">
            <div class="col-md-6 mb-3">
                <x-input label="Şehir" placeholder="Şehir Giriniz" field="city" value="{{$addr->city}}" />
            </div>

            <div class="col-md-6 mb-3">
                <x-input label="İlçe" placeholder="İlçe Giriniz" field="district" value="{{$addr->district}}" />
            </div>

                <div class="col-md-6 mb-3">
                    <x-input label="Posta Kodu" placeholder="Posta Kodu Giriniz" field="zipcode" value="{{$addr->zipcode}}" />
                </div>
                <div class="col-md-6 mt-5 mb-3">
                    <x-checkbox label="Varsayılan" field="is_default" checked="{{$addr->is_default == 1}}" />
                </div>

            </div>
            <div class="col-md-12 mb-3">
                <x-textarea label="Açık Adres" placeholder="Açık Adres Giriniz" field="address"
                            value="{{$addr->address}}"/>
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
