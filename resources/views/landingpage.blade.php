<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.10/index.global.min.js'></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementById('calendar');
            var calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridMonth',
                dateClick: function() {
                    alert('a day has been clicked');
                },
                events: [{
                    title: 'Ini Peminjaman',
                    start: '2024-01-13',
                    end: '2024-01-15'
                }],
                editable: true,
            });
            calendar.render();
        });
    </script>
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

    <section id="slider">
        <div class="container">
            <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
                    <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="asset('template/img/tamu.jpg')" class="d-block w-100" alt="gambar1">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>First slide label</h5>
                            <p>Some representative placeholder content for the first slide.</p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="asset('template/img/tamu2.jpg')" class="d-block w-100" alt="gambar2">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>Second slide label</h5>
                            <p>Some representative placeholder content for the second slide.</p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="{{ asset('template/img/tamu3.jpg') }}" class="d-block w-100" alt="gambar3">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>Third slide label</h5>
                            <p>Some representative placeholder content for the third slide.</p>
                        </div>
                    </div>
                </div>
                <a class="carousel-control-prev" type="button" data-target="#carouselExampleCaptions"
                    data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" type="button" data-target="#carouselExampleCaptions"
                    data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
    </section>
    <!-- About section-->
    <section id="jadwal">
        <div class="container px-4">
            <div class="row gx-4 justify-content-center">
                <div id="calendar"></div>
            </div>
        </div>
    </section>
    <!-- Services section-->
    <section class="bg-light" id="tatib">
        <div class="container px-4">
            <div class="row gx-4">
                <h2 class="text-center">Tata Tertib</h2>
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
                    <a class="w-40 card mb-3 text-decoration-none h5 bg-warning" href="{{ route('LoginAdmin') }}">
                        <div class="card-body">
                            <div>
                                <i class="ion-ios-person-outline"></i>
                            </div>
                            <p class="text-center text-white ">Admin</p>
                        </div>
                    </a>
                    <a class="card mb-3 text-decoration-none h5 bg-primary" href="{{ route('LoginDosen') }}">
                        <div class="card-body">
                            <p class="text-center text-white ">Dosen</p>
                        </div>
                    </a>
                    <a class="card mb-3 text-decoration-none h5 bg-success" href="{{ route('LoginMahasiswa') }}">
                        <div class="card-body">
                            <p class="text-center text-white ">Mahasiswa</p>
                        </div>
                    </a>
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
