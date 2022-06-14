<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Travelmore.com | @yield('title')</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.isotope/3.0.6/isotope.pkgd.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.js"></script>
    <style>
        .portfolio-menu{
            text-align:center;
        }
        .portfolio-menu ul li{
            display:inline-block;
            margin:0;
            list-style:none;
            padding:10px 15px;
            cursor:pointer;
            -webkit-transition:all 05s ease;
            -moz-transition:all 05s ease;
            -ms-transition:all 05s ease;
            -o-transition:all 05s ease;
            transition:all .5s ease;
        }
        .portfolio-item .item{
            /*width:303px;*/
            float:left;
            margin-bottom:10px;
        }
    </style>
</head>
<body>
@guest
    <div class="collapse bg-dark" id="navbarHeader">
        <div class="container">
            <div class="row">
                <div class="col-sm-8 col-md-7 py-4">
                    <h4 class="text-white">About</h4>
                    <p class="text-muted">Add some information about the album below, the author, or any other
                        background context. Make it a few sentences long so folks can pick up some informative
                        tidbits. Then, link them off to some social networking sites or contact information.</p>
                </div>
                <div class="col-sm-4 offset-md-1 py-4">
                    <h4 class="text-white">Contact</h4>
                    <ul class="list-unstyled">
                        <li class="nav-item">
                            <a class="nav-link {{ (request()->is('login')) ? 'active-url' : '' }}"
                               href="{{ route('login') }}">Войти</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link  {{ (request()->is('register')) ? 'active-url' : '' }}"
                               href="{{ route('register') }}">Регистрация</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="navbar navbar-dark bg-dark shadow-sm">
        <div class="container">
                <div>
                    <a href="{{ route('user.countries.index') }}" class="navbar-brand d-flex align-items-center">
                        <strong>Travelmore.com</strong>
                    </a>
                </div>
            <div>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarHeader" style="margin-right: 20px"
                        aria-controls="navbarHeader" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div>
        </div>
    </div>
@else
<header>
        <div class="collapse bg-dark" id="navbarHeader">
            <div class="container">
                <div class="row">
                    <div class="col-sm-8 col-md-7 py-4">
                        <h4 class="text-white">About</h4>
                        <p class="text-muted">Add some information about the album below, the author, or any other
                            background context. Make it a few sentences long so folks can pick up some informative
                            tidbits. Then, link them off to some social networking sites or contact information.</p>
                    </div>
                    <div class="col-sm-4 offset-md-1 py-4">
                        <h4 class="text-white">Contact</h4>
                        <ul class="list-unstyled">
                            <li><a href="#" class="text-white">Follow on Twitter</a></li>
                            <li><a href="#" class="text-white">Like on Facebook</a></li>
                            <li><a href="#" class="text-white">Email me</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="navbar navbar-dark bg-dark shadow-sm">
            <div class="container">
                @if (auth()->user()->role_id === 2)
                    <div>
                        <a href="{{ route('user.countries.index') }}" class="navbar-brand d-flex align-items-center">
                            <strong>Travelmore.com</strong>
                        </a>
                    </div>
                    <div>
                        <a href="{{route('hotels.bookings.index')}}" class="navbar-brand d-flex align-items-center">
                            <strong>Мои бронирования</strong>
                        </a>
                    </div>
                @else
                    <div>
                        <a href="{{ route('user.countries.index') }}" class="navbar-brand d-flex align-items-center">
                            <strong>Travelmore.com</strong>
                        </a>
                    </div>
                    <div>
                        <a class="navbar-brand d-flex align-items-center" href="{{route('admin.countries.index')}}">
                            Админка
                        </a>
                    </div>
                @endif
                <div>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                            data-bs-target="#navbarHeader" style="margin-right: 20px"
                            aria-controls="navbarHeader" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <a style="color: white; text-decoration: none;" href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                        Выход
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                          class="d-none">
                        @csrf
                    </form>
                </div>
            </div>
        </div>
    @endguest
</header>
<main>
    <div class="container">
        @include('user.layouts._alert')
    </div>

    @yield('content')
</main>
<footer class="text-muted py-5">
    <div class="container">
        <p class="float-end mb-1">
            <a href="#">Back to top</a>
        </p>
    </div>
</footer>
<script src="https://getbootstrap.com/docs/5.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2"
        crossorigin="anonymous">
</script>
<script>
    $(document).on('click','.delete',function(){
        let id = $(this).attr('data-id');
        $('#id').val(id);
    });
    $('.portfolio-menu ul li').click(function(){
        $('.portfolio-menu ul li').removeClass('active');
        $(this).addClass('active');

        let selector = $(this).attr('data-filter');
        $('.portfolio-item').isotope({
            filter:selector
        });
        return  false;
    });
    $(document).ready(function() {
        let popup_btn = $('.popup-btn');
        popup_btn.magnificPopup({
            type : 'image',
            gallery : {
                enabled : true
            }
        });
    });
</script>
</body>
</html>
