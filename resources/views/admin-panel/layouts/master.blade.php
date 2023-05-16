<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    {{-- FONT AWESOME CSS --}}
    <link rel="stylesheet" href="{{ asset('css/all.min.css') }}">
    {{-- BOOTSTRAP CSS --}}
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
</head>

<body>

    {{-- NAVBAR --}}
    <nav class="navbar navbar-expand-lg bg-dark fixed-top">
        <div class="container">
            <button class="btn btn-dark position-fixed" type="button" data-bs-toggle="offcanvas"
                data-bs-target="#staticBackdrop" aria-controls="staticBackdrop">
                <i class="fa-solid fa-bars"></i>
            </button>
            <a class="navbar-brand text-white ms-5" href="{{ route('admin.dashboard') }}">Personal Blog</a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-white" href="#" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            {{ Auth::user()->name }}
                        </a>

                        <ul class="dropdown-menu">
                            <li>
                                <form action="{{ route('logout') }}" method="POST">

                                    @csrf
                                    <button onclick="return confirm('Are you sure you want to logout?')" type="submit"
                                        class="dropdown-item">Logout</button>
                                </form>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    {{-- OFFCANVAS ITEM --}}
    <div class="offcanvas offcanvas-start bg-black" data-bs-backdrop="static" tabindex="-1" id="staticBackdrop"
        aria-labelledby="staticBackdropLabel">
        <div class="offcanvas-header d-block">
            <button type="button" class="btn-close btn-close-white float-end" data-bs-dismiss="offcanvas"
                aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link fs-5 text-white" href="{{ route('users.index') }}">User</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link fs-5 text-white" href="{{ route('skills.index') }}">Skill</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link fs-5 text-white" href="{{ route('projects.index') }}">Project</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link fs-5 text-white" href="{{ route('students.index') }}">Student</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link fs-5 text-white" href="{{ route('categories.index') }}">Category</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link fs-5 text-white" href="{{ route('posts.index') }}">Post</a>
                </li>
            </ul>
        </div>
    </div>

    {{-- MAIN CONTENT SECTION --}}
    <section id="main">
        <div class="container">
            <div class="row py-4 mt-4">
                {{-- MAIN CONTENT --}}
                <div class="col-12 mt-3 mt-sm-5">
                    @yield('content')
                </div>
            </div>
        </div>
    </section>

</body>
{{-- FONT AWESOME JS --}}
<script src="{{ asset('js/all.min.js') }}"></script>
{{-- BOOTSTRAP JS --}}
<script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
{{-- Jquery CDN --}}
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
@yield('script')

</html>
