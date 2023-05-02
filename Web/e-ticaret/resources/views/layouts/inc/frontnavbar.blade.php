<nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-3">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}" style="padding-right: 75px">Robo Raven</a>
        <div class="search-bar" style="width: 40%">
            <form method="POST" action="{{ url('search-product') }}">
                @csrf
                <div class="input-group">
                    <input type="search" class="form-control" id="search-bar" placeholder="Ürün Ara" aria-describedby="basic-addon1" name="keyWord" required>
                    <button type="submit" class="input-group-text" style="background-color: #eee"><i class="fa-solid fa-search"></i></button>
                </div>
            </form>
        </div>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    @if(Auth::check())
                        <a class="nav-link active" aria-current="page">
                            Bakiyeniz :
                            <span class="money-count"></span>
                            TL
                        </a>
                    @endif
                </li>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{ url('category') }}">Kategori</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{ url('cart') }}"><i class="fas fa-cart-shopping"></i>
                        @if(Auth::check())
                            <span class="badge badge-pill rounded-circle bg-primary cart-count top-0 start-100 translate-middle" style="font-size: 10px">0</span>
                        @endif
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{ url('wishlist') }}"><i class="fa-solid fa-heart"></i>
                        @if(Auth::check())
                            <span class="badge badge-pill rounded-circle bg-primary wishlist-count top-0 start-100 translate-middle" style="font-size: 10px">0</span>
                        @endif
                    </a>
                </li>

                    @guest
                        @if (Route::has('login'))
                            <li class="nav-item ">
                                <a class="nav-link active" href="{{ route('login') }}">{{ __('Giriş') }}</a>
                            </li>
                        @endif

                        @if (Route::has('register'))
                        <li class="nav-item ">
                            <a class="nav-link active" href="{{ route('register') }}">{{ __('Kayıt') }}</a>
                        </li>
                        @endif
                        @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>
                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ url('my-profil') }}">
                                    Profilim
                                </a>
                                <a class="dropdown-item" href="{{ url('my-orders') }}">
                                    Siparişlerim
                                </a>
                                <a class="dropdown-item" href="{{ url('add-money') }}">
                                    Bakiye Ekle
                                    <svg width="28" height="28" viewBox="0 0 28 28" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            fill-rule="evenodd" clip-rule="evenodd"
                                            d="M26.8333 7.58366C26.8333 4.03983 23.9605 1.16699 20.4167 1.16699C16.8728 1.16699 14 4.03983
                                            14 7.58366C14 11.1275 16.8728 14.0003 20.4167 14.0003C23.9605 14.0003 26.8333 11.1275 26.8333
                                            7.58366ZM21.0008 8.16699L21.0013 11.0871C21.0013 11.4092 20.7401 11.6704 20.418 11.6704C20.0958
                                            11.6704 19.8346 11.4092 19.8346 11.0871L19.8341 8.16699H16.9115C16.5897 8.16699 16.3288 7.90583
                                             16.3288 7.58366C16.3288 7.26149 16.5897 7.00033 16.9115 7.00033H19.8339L19.8333 4.08212C19.8333
                                              3.75995 20.0945 3.49879 20.4167 3.49879C20.7388 3.49879 21 3.75995 21 4.08212L21.0005
                                              7.00033H23.9127C24.2345 7.00033 24.4954 7.26149 24.4954 7.58366C24.4954 7.90583 24.2345
                                              8.16699 23.9127 8.16699H21.0008ZM20.4167 15.167L20.4112 15.167H18.9583C18.4751 15.167
                                               18.0833 15.5587 18.0833 16.042C18.0833 16.5252 18.4751 16.917 18.9583 16.917H21.2917C21.7749
                                               16.917 22.1667 16.5252 22.1667 16.042C22.1667 15.5587 21.7749 15.167 21.2917 15.167H20.4221L20.4167
                                               15.167ZM23.3333 21.292V14.5858C23.9644 14.3226 24.5522 13.9767 25.0833 13.5615V21.292C25.0833
                                               23.0639 23.6469 24.5003 21.875 24.5003H7.29167C5.19759 24.5003 3.5 22.8027 3.5 20.7087V6.41699C3.5
                                               6.38092 3.50218 6.34535 3.50642 6.31042C3.50217 6.24928 3.5 6.18755 3.5 6.12533C3.5 4.67558 4.67525
                                               3.50033 6.125 3.50033H14.0255C13.6795 4.04074 13.4001 4.62794 13.1991 5.25033H6.125C5.64175 5.25033
                                               5.25 5.64208 5.25 6.12533C5.25 6.60857 5.64175 7.00033 6.125 7.00033H12.8554C12.8408 7.19285 12.8333
                                               7.38738 12.8333 7.58366C12.8333 7.9804 12.8638 8.37003 12.9225 8.75033H6.125C5.81819 8.75033 5.52368
                                               8.69769 5.25 8.60096V20.7087C5.25 21.8362 6.16409 22.7503 7.29167 22.7503H21.875C22.6804 22.7503 23.3333
                                                22.0974 23.3333 21.292Z" fill="black"></path></svg>
                                </a>
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                           document.getElementById('logout-form').submit();">
                                    {{ __('Çıkış Yap') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endguest
            </ul>
        </div>
    </div>
</nav>
<script href="{{ asset('frontend/js/custom.js') }}" rel="stylesheet"></script>
