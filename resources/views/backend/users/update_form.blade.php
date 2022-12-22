@extends("backend.shared.backend_theme")
@section("title", "Kullanıcı Modülü")
@section("subtitle",'Kullanıcı Güncelle' )
@section("btn_url",url("/users"))
@section("btn_label","Geri Dön")
@section("btn_icon","fa-solid fa-arrow-left")
@section("content")
    <form action="{{url("/users/$user->user_id")}}" method="post">
        @csrf
        @method('PUT')
        <input type="hidden" name="user_id" value="{{$user->user_id}}">
        <div class="row">
            <div class="col-md-6 mb-3">
                <x-input label="Adı ve Soyadı" placeholder="Adı ve Soyadı Giriniz" field="name"
                         value="{{$user->name}}"/>
            </div>

            <div class="col-md-6 mb-3">
                <x-input label="E-Mail" type="email" placeholder="E-Mail Giriniz" field="email"
                         value="{{$user->email}}"/>
            </div>

            <div class=" col-md-6 mb-3">
                <x-checkbox label="Yetkili Kullanıcı" field="is_admin" checked="{{$user->is_admin == 1}}"/>
            </div>

            <div class="col-md-6 mb-3">
                <x-checkbox label="Aktif Kullanıcı" field="is_active" checked="{{$user->is_active == 1}}"/>
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
