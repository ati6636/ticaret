@extends("backend.shared.backend_theme")
@section("title", "Kullanıcı Modülü")
@section("subtitle",'Kullanıcılar' )
@section("btn_url",url("/users/create"))
@section("btn_label","Yeni Ekle")
@section("btn_icon","fa-solid fa-plus")
@section("content")
    <table class="table table-striped table-sm">
        <thead>
        <tr>
            <th scope="col">Sıra</th>
            <th scope="col">Adı ve Soyadı</th>
            <th scope="col">E-Mail</th>
            <th scope="col">Durum</th>
            <th scope="col">İşlemler</th>
        </tr>
        </thead>
        <tbody>
        @if(count($users) > 0)
            @foreach($users as $user)
                <tr id="{{$user->user_id}}">
                    <td>{{$loop->iteration}}</td>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td>
                        @if($user->is_active == 1)
                            <span class="badge rounded-pill text-bg-success">Aktif</span>
                        @else
                            <span class="badge rounded-pill text-bg-danger">Pasif</span>
                        @endif
                    </td>
                    <td>
                        <ul class="nav float-start">
                            <li class="nav-link">
                                <a href="{{url("/users/$user->user_id/edit")}}"
                                   class="btn btn-sm btn-outline-primary">
                                    <i class="fa-solid fa-file-pen"></i>
                                    <span>Güncelle</span>
                                </a>
                            </li>
                        </ul>
                        <ul class="nav float-start">
                            <li class="nav-link">
                                <form action="{{url("/users/$user->user_id")}}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button href="{{url("/users/$user->user_id")}}"
                                            onclick="return confirm('Bu Kaydı Silmek İstediğinize Emin misiniz?')"
                                            class="btn btn-sm btn-outline-danger">
                                        <i class="fa-solid fa-trash-can"></i>
                                        <span>Sil</span>
                                    </button>
                                </form>
                            </li>
                        </ul>
                        <ul class="nav float-start">
                            <li class="nav-link">
                                <a href="{{url("/users/$user->user_id/change-password")}}"
                                   class="btn btn-sm btn-outline-secondary">
                                    <i class="fa-solid fa-unlock"></i>
                                    <spab>Şifre Değiştir</spab>
                                </a>
                            </li>
                        </ul>
                    </td>
                </tr>
            @endforeach
        @else
            <tr>
                <td class="text-center" colspan="5">
                    <p>Herhangi Bir Kullanıcı Görüntülenemiyor</p>
                </td>
            </tr>
        @endif
        </tbody>
    </table>
@endsection
