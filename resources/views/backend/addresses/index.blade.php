@extends("backend.shared.backend_theme")
@section("title", "Kullanıcı Modülü")
@section("subtitle",'Kullanıcı Adresleri' )
@section("btn_url",url("/users/$user->user_id/addresses/create"))
@section("btn_label","Yeni Ekle")
@section("btn_icon","fa-solid fa-plus")
@section("content")
    <table class="table table-striped table-sm">
        <thead>
        <tr>
            <th scope="col">Sıra</th>
            <th scope="col">Şehir</th>
            <th scope="col">İlçe</th>
            <th scope="col">Posta Kodu</th>
            <th scope="col">Açık Adres</th>
            <th scope="col">Varsayılan</th>
            <th scope="col">İşlemler</th>
        </tr>
        </thead>
        <tbody>
        @php
            @endphp
        @if(count($addrs) > 0)
            @foreach($addrs as $addr)
                <tr id="{{$addr->address_id}}">
                    <td>{{$loop->iteration}}</td>
                    <td>{{$addr->city}}</td>
                    <td>{{$addr->district}}</td>
                    <td>{{$addr->zipcode}}</td>
                    <td>{{$addr->address}}</td>
                    <td>
                        @if($addr->is_default == 1)
                            <span class="badge rounded-pill text-bg-success">Evet</span>
                        @else
                            <span class="badge rounded-pill text-bg-danger">Hayır</span>
                        @endif
                    </td>
                    <td>
                        <ul class="nav float-start">
                            <li class="nav-link">
                                <a href="{{url("/users/$user->user_id/addresses/$addr->address_id/edit")}}"
                                   class="btn btn-sm btn-outline-primary">
                                    <i class="fa-solid fa-file-pen"></i>
                                    <span>Güncelle</span>
                                </a>
                            </li>
                        </ul>
                        <ul class="nav float-start">
                            <li class="nav-link">
                                <form action="{{url("/users/$user->user_id/addresses/$addr->address_id")}}" method="post">
                                    @csrf
                                    @method("DELETE")
                                    <button href="{{url("/users/$user->user_id/addresses/$addr->address_id")}}"
                                       onclick="return confirm('Bu Kaydı Silmek İstediğinize Emin misiniz?')"
                                       class="btn btn-sm btn-outline-danger list-item-delete">
                                        <i class="fa-solid fa-trash-can"></i>
                                        <span>Sil</span>
                                    </button>
                                </form>
                            </li>
                        </ul>
                    </td>
                </tr>
            @endforeach
        @else
            <tr>
                <td class="text-center" colspan="7">
                    <p>Herhangi Bir Adres Görüntülenemiyor</p>
                </td>
            </tr>
        @endif
        </tbody>
    </table>
@endsection
