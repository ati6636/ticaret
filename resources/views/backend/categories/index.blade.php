@extends("backend.shared.backend_theme")
@section("title", "Kullanıcı Modülü")
@section("subtitle",'Kategoriler' )
@section("btn_url",url("/categories/create"))
@section("btn_label","Kategori Ekle")
@section("btn_icon","fa-solid fa-plus")
@section("content")
    <table class="table table-striped table-sm">
        <thead>
        <tr>
            <th scope="col">Sıra</th>
            <th scope="col">Adı</th>
            <th scope="col">Slug</th>
            <th scope="col">Durum</th>
            <th scope="col">İşlemler</th>
        </tr>
        </thead>
        <tbody>
        @if(count($categories) > 0)
            @foreach($categories as $category)
                <tr id="{{$category->category_id}}">
                    <td>{{$loop->iteration}}</td>
                    <td>{{$category->name}}</td>
                    <td>{{$category->slug}}</td>
                    <td>
                        @if($category->is_active == 1)
                            <span class="badge rounded-pill text-bg-success">Aktif</span>
                        @else
                            <span class="badge rounded-pill text-bg-danger">Pasif</span>
                        @endif
                    </td>
                    <td>
                        <ul class="nav float-start">
                            <li class="nav-link">
                                <a href="{{url("/categories/$category->category_id/edit")}}"
                                   class="btn btn-sm btn-outline-primary">
                                    <i class="fa-solid fa-file-pen"></i>
                                    <span>Güncelle</span>
                                </a>
                            </li>
                        </ul>
                        <ul class="nav float-start">
                            <li class="nav-link">
                                <form action="{{url("/categories/$category->category_id")}}" method="post">
                                    @csrf
                                    @method("DELETE")
                                    <button href="{{url("/categories/$category->category_id")}}"
                                            onclick="return confirm('Bu Kaydı Silmek İstediğinize Emin misiniz?')"
                                            class="btn btn-sm btn-outline-danger">
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
                <td class="text-center" colspan="5">
                    <p>Herhangi Bir Kategori Görüntülenemiyor</p>
                </td>
            </tr>
        @endif
        </tbody>
    </table>
@endsection
