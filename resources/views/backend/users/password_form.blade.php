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
            <label for="password" class="form-label">Şifre</label>
            <input type="password" class="form-control" id="password" name="password"
                   placeholder="Şifre Giriniz">
            @error('password')
            <span class="text-bg-danger">{{$message}}</span>
            @enderror

        </div>
        <div class="col-md-6 mb-3">
            <label for="password_confirmation" class="form-label">Şifre Tekrarı</label>
            <input type="password" class="form-control" id="password_confirmation"
                   name="password_confirmation"
                   placeholder="Şifrenizi Tekrar Giriniz">
            @error('password')
            <span class="text-bg-danger">{{$message}}</span>
            @enderror

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
