@extends("backend.shared.backend_theme")
@section("title", "Ürün Modülü")
@section("subtitle",'Ürünler' )
@section("btn_url",url("/products/create"))
@section("btn_label","Ürün Ekle")
@section("btn_icon","fa-solid fa-plus")
@section("content")
    <table class="table table-striped table-sm">
        <thead>
        <tr>
            <th scope="col">Sıra</th>
            <th scope="col">Ürün Adı</th>
            <th scope="col">Kategorisi</th>
            <th scope="col">Fiyat</th>
            <th scope="col">Eski Fiyat</th>
            <th scope="col">Durum</th>
            <th scope="col">İşlemler</th>
        </tr>
        </thead>
        <tbody>
        @if(count($products) > 0)
            @foreach($products as $product)
                <tr id="{{$product->product_id}}">
                    <td>{{$loop->iteration}}</td>
                    <td>{{$product->name}}</td>
                    <td>{{$product->category->name}}</td>
                    <td>{{$product->price}}</td>
                    <td>{{$product->old_price}}</td>
                    <td>
                        @if($product->is_active == 1)
                            <span class="badge rounded-pill text-bg-success">Aktif</span>
                        @else
                            <span class="badge rounded-pill text-bg-danger">Pasif</span>
                        @endif
                    </td>
                    <td>
                        <ul class="nav float-start">
                            <li class="nav-link">
                                <a href="{{url("/products/$product->product_id/edit")}}"
                                   class="btn btn-sm btn-outline-primary">
                                    <i class="fa-solid fa-file-pen"></i>
                                    <span>Güncelle</span>
                                </a>
                            </li>
                        </ul>
                        <ul class="nav float-start">
                            <li class="nav-link">
                                <form action="{{url("/products/$product->product_id")}}" method="post">
                                    @csrf
                                    @method("DELETE")
                                    <button href="{{url("/products/$product->product_id")}}"
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
                                <a href="{{url("/products/$product->product_id/images")}}"
                                   class="btn btn-sm btn-outline-dark">
                                    <i class="fa-solid fa-images"></i>
                                    <span>Fotoğraflar</span>
                                </a>
                            </li>
                        </ul>
                    </td>
                </tr>
            @endforeach
        @else
            <tr>
                <td class="text-center" colspan="7">
                    <p>Herhangi Bir Ürün Görüntülenemiyor</p>
                </td>
            </tr>
        @endif
        </tbody>
    </table>
@endsection
