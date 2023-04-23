<nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-3">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">Robo Raven</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">Home</a>
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
                                <a class="dropdown-item" href="{{ url('my-orders') }}">
                                    Siparişlerim
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
<script>
    $(document).ready(function (){
        loadcard();
        loadWish();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        function loadcard()
        {
            $.ajax({
                method: 'GET',
                url: '/load-cart-data',
                success: function (response){
                    $('.cart-count').html('');
                    $('.cart-count').html(response.count);
                    //console.log(response.count);
                }
            });
        }
        function loadWish()
        {
            $.ajax({
                method: 'GET',
                url: '/load-wishlist-data',
                success: function (response){
                    $('.wishlist-count').html('');
                    $('.wishlist-count').html(response.count);
                    //console.log(response.count);
                }
            });
        }
    })

</script>
