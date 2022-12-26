@extends("backend.shared.backend_theme")
@section("title", "Ürünler Modülü")
@section("subtitle",'Fotoğraflar' )
@section("btn_url",url("/products/$product->product_id/images/create"))
@section("btn_label","Yeni Ekle")
@section("btn_icon","fa-solid fa-plus")
@section("content")
    <table class="table table-striped table-sm">
        <thead>
        <tr>
            <th scope="col">Sıra</th>
            <th scope="col">Fotoğraf</th>
            <th scope="col">Açıklama</th>
            <th scope="col">Durum</th>
            <th scope="col">İşlemler</th>
        </tr>
        </thead>
        <tbody>
        @php
            @endphp
        @if(count($product->images) > 0)
            @foreach($product->images as $image)
                <tr id="{{$image->image_id}}">
                    <td>{{$image->seq}}</td>
                    <td>{{$image->image_url}}</td>
                    <td>{{$image->alt}}</td>
                    <td>
                        @if($image->is_active == 1)
                            <span class="badge rounded-pill text-bg-success">Aktif</span>
                        @else
                            <span class="badge rounded-pill text-bg-danger">Pasif</span>
                        @endif
                    </td>
                    <td>
                        <ul class="nav float-start">
                            <li class="nav-link">
                                <a href="{{url("/products/$product->product_id/images/$image->image_id/edit")}}"
                                   class="btn btn-sm btn-outline-primary">
                                    <i class="fa-solid fa-file-pen"></i>
                                    <span>Güncelle</span>
                                </a>
                            </li>
                        </ul>
                        <ul class="nav float-start">
                            <li class="nav-link">
                                <form action="{{url("/products/$product->product_id/images/$image->image_id")}}"
                                      method="post">
                                    @csrf
                                    @method("DELETE")
                                    <button href="{{url("/products/$product->product_id/images/$image->image_id")}}"
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
                <td class="text-center" colspan="5">
                    <p>Herhangi Bir Fotograf Görüntülenemiyor</p>
                </td>
            </tr>
        @endif
        </tbody>
    </table>
@endsection
