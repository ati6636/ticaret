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
                <label for="city" class="form-label">Şehir</label>
                <input type="text" class="form-control" id="city" name="city"
                       value="{{old("city")}}"
                       placeholder="Şehir Giriniz">
                @error('city')
                <span class="text-bg-danger">{{$message}}</span>
                @enderror
            </div>
            <div class="col-md-6 mb-3">
                <label for="district" class="form-label">İlçe</label>
                <input type="text" class="form-control" id="district" name="district"
                       value="{{old("district")}}"
                       placeholder="İlçe Giriniz">
                @error('district')
                <span class="text-bg-danger">{{$message}}</span>
                @enderror

            </div>
            <div class="col-md-6 mb-3">
                <label for="zipcode" class="form-label">Posta Kodu</label>
                <input type="text" class="form-control" id="zipcode" name="zipcode"
                       placeholder="Posta Kodu Giriniz">
                @error('zipcode')
                <span class="text-bg-danger">{{$message}}</span>
                @enderror

            </div>
            <div class="col-md-6 mt-5 mb-3">
                <div class="form-check">
                    <label class="form-check-label" for="is_default">
                        Varsayılan
                    </label>
                    <input class="form-check-input" type="checkbox" value="1" id="is_default"
                           name="is_default">
                </div>

            </div>
            <div class="col-md-12 mb-3">
                <label for="address" class="form-label">Açık Adres</label>
                <textarea name="address" class="form-control" id="address" cols="5" rows="10"></textarea>
                @error('address')
                <span class="text-bg-danger">{{$message}}</span>
                @enderror

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
