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
