<!doctype html>
<html lang="tr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Ticaret E-Commerce</title>

    @vite(['resources/js/app.js','resources/sass/app.scss'])

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
                        <a class="nav-link {{\Illuminate\Support\Str::of(url()->current())->contains("/users") ? "active" : ""}}"
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
            </div>

            <h4>Kullanıcı Düzenle</h4>
            <div class="table-responsive overflow-hidden">
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
            </div>
        </main>
    </div>
</div>

</body>
</html>
