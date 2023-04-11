<div class="sidebar" data-color="purple" data-background-color="white" data-image="../assets/img/sidebar-1.jpg">
    <div class="logo">
        <a href="#" class="simple-text logo-normal">
            RoboRaven
        </a>
    </div>
    <div class="sidebar-wrapper">
        <ul class="nav">
            <li class="nav-item {{ Request::is('dashboard') ? 'active':'' }}">
                <a class="nav-link" href="{{ url('dashboard') }}">
                    <i class="material-icons">dashboard</i>
                    <p>Admin Paneli</p>
                </a>
            </li>
            <li class="nav-item {{ Request::is('categories') ? 'active':'' }}">
                <a class="nav-link" href="{{ url('categories') }}">
                    <i class="material-icons">content_paste</i>
                    <p>Kategoriler</p>
                </a>
            </li>
            <li class="nav-item {{ Request::is('add_category') ? 'active':'' }}">
                <a class="nav-link"  href="{{ url('add_category') }}">
                    <i class="material-icons">content_paste</i>
                    <p>Kategori ekle</p>
                </a>
            </li>
            <li class="nav-item {{ Request::is('products') ? 'active':'' }}">
                <a class="nav-link" href="{{ url('products') }}">
                    <i class="material-icons">content_paste</i>
                    <p>Ürünler</p>
                </a>
            </li>
            <li class="nav-item {{ Request::is('add_product') ? 'active':'' }}">
                <a class="nav-link"  href="{{ url('add_product') }}">
                    <i class="material-icons">content_paste</i>
                    <p>Ürün ekle</p>
                </a>
            </li>
        </ul>
    </div>
</div>
