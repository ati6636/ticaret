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
                <label for="name" class="form-label">Adı ve Soyadı</label>
                <input type="text" class="form-control" id="name" name="name" value="{{old('name',$user->name)}}"
                       placeholder="Adı ve Soyadı Giriniz">
                @error('name')
                <span class="text-bg-danger">{{$message}}</span>
                @enderror

            </div>
            <div class="col-md-6 mb-3">
                <label for="email" class="form-label">E-Mail</label>
                <input type="email" class="form-control" id="email" name="email" value="{{old('email',$user->email)}}"
                       placeholder="E-Mail Giriniz">
                @error('email')
                <span class="text-bg-danger">{{$message}}</span>
                @enderror

            </div>
            <div class="col-md-6 mb-3">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="1" {{$user->is_admin == 1 ? 'checked' : ''}} id="is_admin" name="is_admin">
                    <label class="form-check-label" for="is_admin">
                        Yetkili Kullanıcı
                    </label>
                </div>
            </div>
            <div class="col-md-6 mb-3">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="1" {{$user->is_admin == 1 ? 'checked' : ''}} id="is_active" name="is_active">
                    <label class="form-check-label" for="is_active">
                        Aktif Kullanıcı
                    </label>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <button type="submit" class="btn btn-md btn-success "><i class="fa-solid fa-file-pen"></i> Güncelle</button>
            </div>
        </div>
    </form>
@endsection
