<!doctype html>
<html lang="tr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Ticaret E-Commerce</title>

    @vite(['resources/js/app.js'])

    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }

        .b-example-divider {
            height: 3rem;
            background-color: rgba(0, 0, 0, .1);
            border: solid rgba(0, 0, 0, .15);
            border-width: 1px 0;
            box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
        }

        .b-example-vr {
            flex-shrink: 0;
            width: 1.5rem;
            height: 100vh;
        }

        .bi {
            vertical-align: -.125em;
            fill: currentColor;
        }

        .nav-scroller {
            position: relative;
            z-index: 2;
            height: 2.75rem;
            overflow-y: hidden;
        }

        .nav-scroller .nav {
            display: flex;
            flex-wrap: nowrap;
            padding-bottom: 1rem;
            margin-top: -1px;
            overflow-x: auto;
            text-align: center;
            white-space: nowrap;
            -webkit-overflow-scrolling: touch;
        }
    </style>


    <!-- Custom styles for this template -->
    <link href="{{asset('css/dashboard.css')}}" rel="stylesheet">
</head>
<body>

<header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
    <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3 fs-6" href="#">Ticaret E-Commerce</a>
    <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse"
            data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false"
            aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <input class="form-control form-control-dark w-100 rounded-0 border-0" type="text" placeholder="Search"
           aria-label="Search">
    <div class="navbar-nav">
        <div class="nav-item text-nowrap">
            <a class="nav-link px-3" href="#">Çıkış Yap</a>
        </div>
    </div>
</header>

<div class="container-fluid">
    <div class="row">
        <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
            <div class="position-sticky pt-3 sidebar-sticky">
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link {{Str::of(url()->current())->contains("/users") ? "active" : ""}}"
                           aria-current="page" href="#">
                            <span class="align-text-bottom"><i class="fas fa-home-user"></i></span>
                            Yönetim Paneli
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/users">
                            <span class="align-text-bottom"><i class="fas fa-users"></i></span>
                            Kullanıcılar
                        </a>
                    </li>
                </ul>
            </div>
        </nav>

        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
            <div
                class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2">Kullanıcılar</h1>
                <div class="btn-toolbar mb-2 mb-md-0">
                    <div class="btn-group me-2">
                        <a href="/users/create" class="btn btn-sm btn-outline-danger">Yeni Ekle</a>
                    </div>
                </div>
            </div>

            <div class="table-responsive">
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
                                            <a href="{{url("/users/$user->user_id/edit")}}" class="btn btn-outline-primary">
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
                                                <button href="{{url("/users/$user->user_id")}}" onclick="return confirm('Bu Kaydı Silmek İstediğinize Emin misiniz?')" class="btn btn-outline-danger">
                                                    <i class="fa-solid fa-trash-can"></i>
                                                    <span>Sil</span>
                                                </button>
                                            </form>
                                        </li>
                                    </ul>
                                    <ul class="nav float-start">
                                        <li class="nav-link">
                                            <a href="{{url("/users/$user->user_id")}}" class="btn btn-outline-secondary">
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
            </div>
        </main>
    </div>
</div>
</body>
</html>
