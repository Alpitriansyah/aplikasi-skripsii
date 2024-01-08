<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Peminjaman Ruangan Fakultas Teknik UNMUL</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('template/img/unmu_logo.png') }}" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="{{ asset('template/css/landing-page.css') }}" rel="stylesheet" />
</head>

<body id="page-top">
    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
        <div class="container px-4">
            <a class="navbar-brand" href="#page-top"><img src="{{ asset('template/img/unmu_logo.png') }}" alt=""
                    width="50"> </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive"
                aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span
                    class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="#jadwal">Jadwal</a></li>
                    <li class="nav-item"><a class="nav-link" href="#tatib">Tata Tertib</a></li>
                    <li class="nav-item"><a class="nav-link" href="#login">Login</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Header-->
    <header class="bg-primary bg-gradient text-white">
        <div class="container px-4 text-center">
            <h1 class="fw-bolder">Welcome to Scrolling Nav</h1>
            <p class="lead">A functional Bootstrap 5 boilerplate for one page scrolling websites</p>
            <a class="btn btn-lg btn-light" href="#about">Start scrolling!</a>
        </div>
    </header>
    <!-- About section-->
    <section id="jadwal">
        <div class="container px-4">
            <div class="row gx-4 justify-content-center">
                <div class="col-lg-8">
                    <h2>About this page</h2>
                    <p class="lead">This is a great place to talk about your webpage. This template is purposefully
                        unstyled so you can use it as a boilerplate or starting point for you own landing page designs!
                        This template features:</p>
                    <ul>
                        <li>Clickable nav links that smooth scroll to page sections</li>
                        <li>Responsive behavior when clicking nav links perfect for a one page website</li>
                        <li>Bootstrap's scrollspy feature which highlights which section of the page you're on in the
                            navbar</li>
                        <li>Minimal custom CSS so you are free to explore your own unique design options</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!-- Services section-->
    <section class="bg-light" id="tatib">
        <div class="container px-4">
            <div class="row gx-4">
                <div class="col-lg-6">
                    <div class="card card-shadow">
                        <div class="card-header">
                            <h2 class="text-center">Gedung Baru</h2>
                        </div>
                        <div class="card-body">
                            <p>Sebelum melakukan peminjaman ruangan untuk gedung baru silahkan download
                                file
                                di
                                bawah ini dan harap membaca. </p>
                        </div>
                        <div class="card-footer d-flex justify-content-center">
                            <a href="" class="btn btn-primary  ">Download</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="card card-shadow">
                        <div class="card-header">
                            <h2 class="text-center">Gedung Lama</h2>
                        </div>
                        <div class="card-body">
                            <p>Sebelum melakukan peminjaman ruangan untuk gedung lama silahkan download file di
                                bawah ini dan harap membaca. </p>
                        </div>
                        <div class="card-footer d-flex justify-content-center">
                            <a href="" class="btn btn-primary  ">Download</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Login Section-->
    <section id="login">
        <div class="container px-4">
            <div class="row gx-4 ">
                <div class="d-flex gap-5 justify-content-center align-items-center">
                    <div class="w-40 card mb-3 bg-warning">
                        <div class="card-body">
                            <div>
                                <i class="ion-ios-person-outline"></i>
                            </div>
                            <p class="text-center">Admin</p>
                        </div>
                    </div>
                    <div class="card mb-3 bg-primary">
                        <div class="card-body">
                            <p class="text-center">Dosen</p>
                        </div>
                    </div>
                    <div class="card mb-3 bg-success">
                        <div class="card-body">
                            <p class="text-center">Mahasiswa</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Footer-->
    <footer class="py-5 bg-dark">
        <div class="container px-4">
            <p class="m-0 text-center text-white">Copyright &copy; Fakultas Teknik Universitas Mulawarman</p>
        </div>
    </footer>
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="{{ asset('template/js/landing-page.js') }}"></script>
</body>

</html>
