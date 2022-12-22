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
                <label for="city" class="form-label">Şehir</label>
                <input type="text" class="form-control" id="city" name="city" value="{{old('city',$addr->city)}}"
                       placeholder="Şehir Giriniz">
                @error('city')
                <span class="text-bg-danger">{{$message}}</span>
                @enderror

            </div>
            <div class="col-md-6 mb-3">
                <label for="district" class="form-label">İlçe</label>
                <input type="text" class="form-control" id="district" name="district"
                       value="{{old('district',$addr->district)}}"
                       placeholder="İlçe Giriniz">
                @error('district')
                <span class="text-bg-danger">{{$message}}</span>
                @enderror

            </div>
                <div class="col-md-6 mb-3">
                    <label for="zipcode" class="form-label">Posta Kodu</label>
                    <input type="text" class="form-control" id="zipcode" name="zipcode"
                           value="{{old('zipcode',$addr->zipcode)}}"
                           placeholder="Posta Kodu Giriniz">
                    @error('zipcode')
                    <span class="text-bg-danger">{{$message}}</span>
                    @enderror

                </div>
                <div class="col-md-6 mt-5 mb-3">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="is_default" name="is_default" value="1"
                            {{$addr->is_default == 1 ? 'checked' : ''}}>
                        <label class="form-check-label" for="is_default">
                            Varsayılan
                        </label>
                    </div>
                </div>

            </div>
            <div class="col-md-12 mb-3">
                <label for="address" class="form-label">Açık Adres</label>
                <textarea type="text" class="form-control" id="address" name="address"
                          placeholder="Açık Adres Giriniz">{{$addr->address}}
                </textarea>
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
