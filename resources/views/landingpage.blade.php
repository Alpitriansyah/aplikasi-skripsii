<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <link rel="stylesheet" href="{{ asset('template/css/landing-page.css') }}">
    <link href="{{ asset('template/css/sb-admin-2.min.css') }}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.10/index.global.min.js'></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://kit.fontawesome.com/c770c54e8e.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/@fullcalendar/core/main.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/@fullcalendar/daygrid/main.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/@fullcalendar/timegrid/main.css" rel="stylesheet" />
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementById('calendar');
            var calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridMonth',
                events: @json($events),
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
                    <li class="nav-item"><a class="nav-link" href="#ruangan">Ruangan</a></li>
                    <li class="nav-item"><a class="nav-link" href="#jadwal">Jadwal</a></li>
                    <li class="nav-item"><a class="nav-link" href="#tatib">Tata Tertib</a></li>
                    <li class="nav-item"><a class="nav-link" href="#login">Login</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Header-->
    <header class="bg-black bg-gradient text-white">
        <div class="container-fluid" id="carousel_feature">
            <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active"
                        aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1"
                        aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2"
                        aria-label="Slide 3"></button>
                </div>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="{{ asset('template/img/tamu.jpg') }}" class="d-block w-100" alt="...">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>First slide label</h5>
                            <p>Some representative placeholder content for the first slide.</p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="{{ asset('template/img/tamu2.jpg') }}" class="d-block w-100" alt="...">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>Second slide label</h5>
                            <p>Some representative placeholder content for the second slide.</p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="{{ asset('template/img/tamu3.jpg') }}" class="d-block w-100" alt="...">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>Third slide label</h5>
                            <p>Some representative placeholder content for the third slide.</p>
                        </div>
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions"
                    data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
    </header>

    <!-- About section-->
    <section id="ruangan">
        <div class="container mt-2">
            <div class="row">
                <h4 class="text-center">Ruangan</h4>
                <div class="col-md-3">
                    <div class="card">
                        <div class="card-header">
                        </div>
                        <div class="card-body">
                            Test
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card">
                        <div class="card-header">
                        </div>
                        <div class="card-body">
                            Test
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card">
                        <div class="card-header d-flex flex-column align-items-center">
                            <span class="font-weight-bold">Lokasi : Gedung Lama</span>
                            <span class="font-weight-bold">D306</span>
                        </div>
                        <div class="card-body">
                            Test
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card">
                        <div class="card-header">
                        </div>
                        <div class="card-body">
                            Test
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- About section-->
    <section id="jadwal">
        <div class="container px-4">
            <div class="row gx-4 justify-content-center">
                <h2 class="text-center">Jadwal</h2>
                <div class="card">
                    <div class="card-header">
                        <h3>Keterangan :</h3>
                        <span class="badge bg-success">Dipinjam</span>
                        <span class="badge bg-primary">Diproses</span>
                    </div>
                    <div class="card-body">
                        <div id="calendar"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Services section-->
    <section class="bg-light" id="tatib">
        <div class="container px-4">
            <div class="row gx-4">
                <h2 class="text-center">Tata Tertib</h2>
                <div class="col-lg-6 col-6">
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
                <h2 class="text-center mb-4">Login</h2>
                <div class="d-flex gap-5 justify-content-center align-items-center">
                    <a class="card mb-3 text-decoration-none h5 bg-warning bg-opacity-50"
                        href="{{ route('LoginAdmin') }}" style="width: 150px">
                        <div class="card-body d-flex flex-column align-items-center">
                            <div>
                                <i class="fa-regular fa-user" id="icons-user"></i>
                            </div>
                            <p class="text-center text-white ">Admin</p>
                        </div>
                    </a>
                    <a class="card mb-3 text-decoration-none h5 bg-primary bg-opacity-50"
                        href="{{ route('LoginDosen') }}" style="width: 150px">
                        <div class="card-body d-flex flex-column align-items-center">
                            <div>
                                <i class="fa-regular fa-user" id="icons-user"></i>
                            </div>
                            <p class="text-center text-white ">Dosen</p>
                        </div>
                    </a>
                    <a class="card mb-3 text-decoration-none h5 bg-success bg-opacity-50"
                        href="{{ route('LoginMahasiswa') }}" style="width: 150px">
                        <div class="card-body d-flex flex-column align-items-center">
                            <div>
                                <i class="fa-regular fa-user" id="icons-user"></i>
                            </div>
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
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
    <!-- Core theme JS-->
    <script src="{{ asset('template/js/landing-page.js') }}"></script>
</body>

</html>
