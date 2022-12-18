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
                <label for="name" class="form-label">Adı ve Soyadı</label>
                <input type="text" class="form-control" id="name" name="name"
                       value="{{old("name")}}"
                       placeholder="Adı ve Soyadı Giriniz">
                @error('name')
                <span class="text-bg-danger">{{$message}}</span>
                @enderror
            </div>
            <div class="col-md-6 mb-3">
                <label for="email" class="form-label">E-Mail</label>
                <input type="email" class="form-control" id="email" name="email"
                       value="{{old("email")}}"
                       placeholder="E-Mail Giriniz">
                @error('email')
                <span class="text-bg-danger">{{$message}}</span>
                @enderror

            </div>
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
            <div class="col-md-6 mb-3">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="1" id="is_admin" name="is_admin"
                    <label class="form-check-label" for="is_admin">
                        Yetkili Kullanıcı
                    </label>
                </div>
            </div>
            <div class="col-md-6 mb-3">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="1" id="is_active"
                           name="is_active">
                    <label class="form-check-label" for="is_active">
                        Aktif Kullanıcı
                    </label>
                </div>
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
