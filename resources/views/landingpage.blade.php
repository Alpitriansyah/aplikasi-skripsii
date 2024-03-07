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
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.11/index.global.min.js'></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    {{-- <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script> --}}
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.30.1/moment.min.js"
        integrity="sha512-hUhvpC5f8cgc04OZb55j0KNGh4eh7dLxd/dPSJ5VyzqDWxsayYbojWyl5Tkcgrmb/RVKCRJI1jNlRbVP4WWC4w=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://kit.fontawesome.com/c770c54e8e.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/@fullcalendar/core/main.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/@fullcalendar/daygrid/main.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/@fullcalendar/timegrid/main.css" rel="stylesheet" />
    <style>
        .fc-dayGridMonth-view .fc-dayGrid-day {
            height: 80px;
            /* Sesuaikan tinggi sel bulan sesuai kebutuhan Anda */
        }

        .fc-dayGridMonth-view .fc-event {
            font-size: 12px;
            /* Sesuaikan ukuran font sesuai kebutuhan Anda */
            line-height: 1.2;
            /* Sesuaikan nilai ini sesuai kebutuhan Anda */
            height: 100%;
            /* Memastikan acara tidak memperpanjang seluruh sel */
        }
    </style>
    <script>
        document.addEventListener('DOMContentLoaded', function() {

            var calendarEl = document.getElementById('calendar');
            var calendar = new FullCalendar.Calendar(calendarEl, {
                timeZone: 'local',
                themeSystem: 'boostrap5',
                headerToolbar: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'dayGridMonth,timeGridWeek,timeGridDay'
                },
                buttonText: {
                    today: 'Sekarang',
                    month: 'Bulan',
                    week: 'Minggu',
                    day: 'Hari'
                },
                eventTimeFormat: {
                    hour: 'numeric',
                    minute: '2-digit',
                    meridiem: 'short'
                },
                eventDurationEditable: false,
                displayEventEnd: false, // Tidak menampilkan waktu akhir acara di tampilan bulan
                themeSystem: 'bootstrap',
                events: {!! json_encode($events) !!},
                displayEventTime: true,
                eventClick: function(info) {
                    console.log('Event clicked:', info);
                    $('#eventRoom').text(info.event.title);
                    $('#eventStart').text(info.event.start.toLocaleString());
                    $('#eventEnd').text(info.event.end.toLocaleString());
                    $('#eventNeed').text(info.event.extendedProps.keperluan);
                    $('#eventStatus').text(info.event.extendedProps.status);
                    $('#eventModal').modal('show');
                },
                slotEventOverlap: false, // Menghindari event tumpang tindih di tampilan hari
                splitDays: true, // Menampilkan setiap tanggal sebagai event yang berbeda
            });
            calendar.render();

        });
    </script>
    <script>
        function testing() {
            var test = {!! json_encode($events) !!}
            console.log(test);
        }
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
            <a class="navbar-brand" href="#page-top">
                <div class="d-flex justify-content-center align-items-center">
                    <img src="{{ asset('template/img/unmu_logo.png') }}" alt="" width="50">
                    <h5 class="ml-1">Peminjaman Ruangan Fakultas Teknik</h5>
                </div>

            </a>
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
                        <img src="{{ asset('template/img/ruangan1.jpg') }}" class="d-block w-100" alt="...">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>Gedung Baru</h5>
                            <p>Ruangan 303</p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="{{ asset('template/img/ruangan2.jpg') }}" class="d-block w-100" alt="...">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>Gedung Baru</h5>
                            <p>Ruangan 305</p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="{{ asset('template/img/ruangan3.jpg') }}" class="d-block w-100" alt="...">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>Gedung Baru</h5>
                            <p>Ruangan 304</p>
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
                <h2 class="text-center">Ruangan</h2>
                @foreach ($ruanganAll as $item)
                    <div class="col-md-3 mb-2">
                        <div class="card">
                            <div class="card-header d-flex flex-column align-items-center">
                                <span class="font-weight-bold">Lokasi : {{ $item->lokasi }}</span>
                                <span class="font-weight-bold text-center">{{ $item->name }}</span>
                            </div>
                            <div class="card-body">
                                <img src="{{ asset('storage/' . $item->foto) }}" alt="Ruangan" class="card-img">
                            </div>
                        </div>
                    </div>
                @endforeach
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
                        <span class="badge bg-success">Talkshow</span>
                        <span class="badge bg-primary">Pelatihan</span>
                        <span class="badge bg-danger">Musyawarah Besar</span>
                    </div>
                    <div class="card-body">
                        <div id="calendar"></div>
                        <!-- Modal -->
                        <div class="modal fade" id="eventModal" tabindex="-1" role="dialog"
                            aria-labelledby="eventModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="eventModalLabel">Detail Peminjaman</h5>
                                        <button type="button" class="close" data-dismiss="modal"
                                            aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <p><strong>Ruangan:</strong> <span id="eventRoom"></span></p>
                                        <p><strong>Waktu Mulai:</strong> <span id="eventStart"></span></p>
                                        <p><strong>Waktu Selesai:</strong> <span id="eventEnd"></span></p>
                                        <p><strong>Keperluan:</strong> <span id="eventNeed"></span></p>
                                        <p><strong>Status:</strong> <span id="eventStatus"></span></p>
                                    </div>
                                </div>
                            </div>
                        </div>
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
                            <a href="{{ route('donwloadGedungBaru') }}" class="btn btn-primary  ">Download</a>
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
                            <a href="{{ route('donwloadGedungLama') }}" class="btn btn-primary  ">Download</a>
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
