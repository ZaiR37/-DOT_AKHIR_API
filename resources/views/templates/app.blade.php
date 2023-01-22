<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

    <link rel="stylesheet" href="{{ asset('css/fontawesome/css/all.css') }}">
    <!-- <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css" /> -->
    <link rel="stylesheet" href="owlcarousel/owl.carousel.min.css">
    <link rel="stylesheet" href="owlcarousel/owl.theme.default.min.css">
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">

</head>
<body id="page-top">
    <!-- header -->
    <nav class="shadow-sm bg-white">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 d-flex justify-content-center align-items-center">
                    <a class="navbar-brand text-base fw-bold" href="{{ url('/') }}"><i class="fa-solid fa-book-open title-icon"></i> Esa Library</a>
                </div>
                <div class="col-lg-5 d-md-block d-sm-none py-2">
                    <!-- <div class="d-flex flex-column"> -->
                        <!-- <nav class="py-3 d-flex">
                            <ul class="nav ms-auto">
                                <li class="nav-item"><a href="#" class="nav-link px-2 link-color" aria-current="page">Home</a></li>
                                <li class="nav-item"><a href="#" class="nav-link px-2 link-color">Books Listing</a></li>
                                <li class="nav-item"><a href="#" class="nav-link px-2 link-color">About</a></li>
                            </ul>
                        </nav> -->
                        <!-- <form class="col-12 mb-3 mb-lg-0">
                        <div class="input-group">
                            <input class="form-control border-end-0 border rounded-pill" type="search" placeholder="distributed object database..">
                            <span class="input-group-append">
                                <button class="btn btn-outline-success border-bottom-0 border rounded-pill ms-n5" type="button">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                        </div>
                        </form>
                    </div> -->
                </div>
                <div class="col-lg-4 py-3 d-flex justify-content-center align-items-center">
                    <nav class="py-3 d-flex">
                        <ul class="nav ms-auto">
                            <li class="nav-item"><a href="{{ url('/') }}/#home" class="nav-link px-2 link-color">Home</a></li>
                            <li class="nav-item"><a href="{{ url('/search-tags')}}" class="nav-link px-2 link-color">Book Listings</a></li>
                            <li class="nav-item"><a href="{{ url('/about') }}" class="nav-link px-2 link-color">About</a></li>
                        </ul>
                    </nav>
                    <!-- <div class="d-flex btn-group">
                        <a href="#" class="btn btn-success px-4 border-2 text-color-light">Login</a>
                        <a href="#" class="btn btn-outline-success border-2 px-4 text-color">Sign up</a>
                    </div> -->
                </div>
            </div>
        </div>
    </nav>
    <!--  -->
    @yield('content')

    <!-- footer -->
    <section class="bg-white">
        <div class="container">
            <footer class="pb-3 pt-5">
                <ul class="nav justify-content-center border-bottom pb-3 mb-3">
                    <li class="nav-item"><a href="{{ url('/') }}/#home" class="nav-link px-2 link-color">Home</a></li>
                    <li class="nav-item"><a href="{{ url('/search-tags')}}" class="nav-link px-2 link-color">Book Listings</a></li>
                    <li class="nav-item"><a href="{{ url('/about') }}" class="nav-link px-2 link-color">About</a></li>
                </ul>
                <p class="text-center text-muted">In collaborated effort to pass distributed object database assignment</p>
            </footer>
        </div>
    </section>

    <!-- tulisan jawa / javascript -->
    <script type="text/javascript" src="//code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <script type="text/javascript" src="owlcarousel/owl.carousel.min.js"></script>
    <!-- <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script> -->

    <script type="text/javascript">
    jQuery(function() {

    $(".owl-2").owlCarousel({
        items:1,
        margin:10,
        nav:false,
        dots:false,
        autoplay:true,
        autoplayTimeout:3000,
        loop: true,
        animateOut: 'fadeOut',
        animateIn: 'fadeIn',
    })
})
</script>
</body>
</html>