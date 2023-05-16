<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <!-- FONTAWESOME CSS -->
    <link rel="stylesheet" href="{{ asset('css/all.min.css') }}">
    <!-- BOOTSTRAP CSS -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <!-- Custom Css -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body class="fs-5">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <!-- HEADER SECTION -->
                <section id="header">
                    <div class="row bg-black py-5 text-white">
                        <div class="col-sm-2"></div>
                        <div class="col-sm-4 text-center">
                            <img src="{{ asset('image/mkn.jpg') }}" class="header-img mt-sm-5 mt-lg-1">
                        </div>
                        <div class="col-sm-4 text-center">
                            <br>
                            <p>Hello!</p>
                            <p>It's me.</p>
                            <p>Min Khant Naung</p>
                            <p>Happy Coder</p>
                            <a href="{{ route('ui.posts') }}">
                                <button class="btn btn-primary">
                                    <i class="fa-solid fa-eye"></i>
                                    Explore My Blogs
                                </button>
                            </a>
                        </div>
                        <div class="col-md-2"></div>
                    </div>
                </section>

                <!-- NAVIGATION SECTION -->
                <section id="navbar">
                    <div class="row bg-black sticky">
                        <nav class="navbar navbar-expand-lg">
                            <div class="container-fluid">
                                <button class="navbar-toggler bg-white justify-content-end" type="button"
                                    data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav"
                                    aria-expanded="false" aria-label="Toggle navigation">
                                    <span class="navbar-toggler-icon"></span>
                                </button>
                                <div class="collapse navbar-collapse justify-content-between" id="navbarNav">
                                    <ul class="navbar-nav">
                                        <li class="nav-item">
                                            <a class="nav-link active text-white fw-bold" aria-current="page"
                                                href="{{ route('ui.index') }}">Home</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link text-white fw-bold"
                                                href="{{ route('ui.index', '#skills') }}">Skills</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link text-white fw-bold"
                                                href="{{ route('ui.posts') }}">Blogs</a>
                                        </li>
                                    </ul>
                                    <ul class="navbar-nav">
                                        @guest
                                            <li class="nav-item">
                                                <a class="nav-link text-white fw-bold pe-3"
                                                    href="{{ url('/login') }}">Login</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link text-white fw-bold pe-3"
                                                    href="{{ url('/register') }}">Register</a>
                                            </li>
                                        @endguest
                                        @auth
                                            <li class="nav-item">
                                                <a class="nav-link text-white fw-bold pe-3" href=""
                                                    onclick="event.preventDefault(); if(confirm('Are you sure you want to logout?')) {document.querySelector('#logout-form').submit();}">Logout</a>
                                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                                    class="d-none">
                                                    @csrf
                                                </form>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link text-white fw-bold pe-3"
                                                    href="{{ url('/login') }}">{{ strToUpper(Auth::user()->name) }}</a>
                                            </li>
                                        @endauth
                                    </ul>
                                </div>
                            </div>
                        </nav>
                    </div>
                </section>

                @yield('content')

                <!-- FOOTER -->
                <section id="footer">
                    <div class="row bg-black text-white">
                        <div class="col-12">
                            <div class="container">
                                <div class="row my-5">
                                    <div class="col-md-4 col-sm-6 pt-5">
                                        <div class="footer-div">
                                            <h5>ABOUT THIS WEBSITE</h5>
                                            <p class="fs-6">Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                                                Et, accusamus fuga sint est
                                                dolorum asperiores omnis consectetur soluta quae cumque inventore
                                                cupiditate veritatis, nam necessitatibus
                                                laboriosam optio, eaque consequuntur ratione.</p>
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-sm-6 pt-5">
                                        <div class="footer-div">
                                            <h5>CONTACT INFO</h5>
                                            <p class="fs-6">Phone: 09258138856
                                            </p>
                                            <p class="fs-6">Email: minkhantnaungkzw@gmail.com</p>
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-sm-6 pt-5">
                                        <div class="footer-div">
                                            <h5>FOLLOW ME ON</h5>
                                            <a href="" class="fs-2 pe-3">
                                                <i class="fa-brands fa-square-facebook"></i>
                                            </a>
                                            <a href="" class="fs-2 pe-3">
                                                <i class="fa-brands fa-square-instagram"></i>
                                            </a>
                                            <a href="" class="fs-2 pe-3">
                                                <i class="fa-brands fa-linkedin"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>



</body>
<!-- FONTAWESOME JS -->
<script src="{{ asset('js/all.min.js') }}"></script>
<!-- BOOTSTRAP JS -->
<script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
<!-- CUSTOM JS -->
<script src="{{ asset('js/script.js') }}"></script>

</html>
