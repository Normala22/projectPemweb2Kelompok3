<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard</title>
    <link rel="stylesheet" href="sidebar.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        body {
            position: relative;
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
        }

        body::before {
            content: '';
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(to right, #ffecd2, #fcb69f);
            background-size: cover;
            background-repeat: no-repeat;
            filter: blur(1.5px);
            z-index: -1;
        }

        .content {
            position: relative;
            z-index: 1;
            background-color: rgba(255, 255, 255, 0.9); 
            padding: 20px;
            border-radius: 10px;
            margin-top: 50px;
        }

        .header_title {
            color: #F7DCB9;
            flex-grow: 1;
            text-align: right;
            font-size: 1.2rem;
            display: flex;
            align-items: center;
            justify-content: flex-end;
            gap: 0.5rem;
        }

        .header_title i {
            margin-right: 10px;
        }

        .container {
            padding-top: 90px; 
        }

        /* Custom Card Styles */
        .card {
            border: none;
            border-radius: 15px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease-in-out;
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
        }

        .card .card-body {
            padding: 20px;
            text-align: center;
        }

        .card .card-title {
            font-size: 1.25rem;
            font-weight: 600;
            margin-bottom: 10px;
        }

        .card .card-text {
            font-size: 1rem;
            color: #6c757d;
        }

        .card .btn {
            border-radius: 5px;
            padding: 8px 20px;
        }

        /* Big Icon Styles */
        .big-icon {
            font-size: 4rem;
            margin-bottom: 15px;
        }

        /* Card Colors */
        .card-buku {
            background-color: #FFF2D7; 
        }

        .card-anggota {
            background-color: #FFE0B5; 
        }

        .card-peminjaman {
            background-color: #F8C794; 
        }

        .card-pengembalian {
            background-color: #D8AE7E; 
        }

        .btn-primary {
            background-color: #ED9455; /* Warna latar belakang untuk tombol */
            color: #fff; /* Warna teks untuk tombol */
            border: none;
            border-radius: 5px;
            padding: 8px 20px;
            transition: background-color 0.3s;
        }

        .btn-primary:hover {
            background-color: #FFBB70; /* Warna latar belakang saat dihover */
            color: #fff; /* Warna teks saat dihover */
        }

        /* CSS BUKAN ADMIN */
        @if (!Auth::user()->is_admin)
        .not-admin {
            text-align: center;
            margin: 20px 0;
        }

        .not-admin h5 {
            font-size: 1.5rem;
            color: grey;
            margin-bottom: 20px;
            animation: fadeIn 1s ease-in-out;
        }

        .not-admin .card {
            background: linear-gradient(to bottom right, #ffffff, #f3f4f6);
            color: #333;
        }

        .not-admin .card:hover {
            background: linear-gradient(to bottom right, #fff7e8, #ffe3c7);
        }

        .not-admin .card-title {
            color: #444;
        }

        .not-admin .card-text {
            color: #666;
        }

        .not-admin .btn-primary {
            background-color: #ff7e5f;
            border: none;
        }

        .not-admin .btn-primary:hover {
            background-color: #ff6f50;
        }

        .not-admin i {
            color: #ff7e5f;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
            }
            to {
                opacity: 1;
            }
        }
        @endif
    </style>
</head>
<body id="body-pd">
    <header class="header d-flex align-items-center" id="header">
        <div class="header_toggle"> <i class='bx bx-menu' id="header-toggle"></i> </div>
        <div class="header_title">
            <i class="fas fa-user"></i> Selamat Datang, {{ Auth::user()->name }}
        </div>
    </header>
    <div class="l-navbar" id="nav-bar">
        <nav class="nav">
            <div> 
                <a href="#" class="nav_logo"> <i class='bx bx-layer nav_logo-icon'></i> <span class="nav_logo-name">Perpustakaan</span> </a>
                <div class="nav_list"> 
                    <a href="{{ route('dashboard.index') }}" class="nav_link"><i class='bx bx-home nav_icon'></i> <span class="nav_name">Dashboard</span> </a>
                    @if (!Auth::user()->is_admin)
                    <a href="{{ route('data.buku2') }}" class="nav_link"><i class='bx bx-book-heart nav_icon'></i> <span class="nav_name">Rekomendasi Buku</span> </a>
                    @endif
                    @can('admin')
                        <a href="{{ route('buku.index') }}" class="nav_link"><i class='bx bx-grid-alt nav_icon'></i> <span class="nav_name">Data Buku</span> </a> 
                        <a href="{{ route('dashboard.showDataPengguna') }}" class="nav_link"><i class='bx bx-user nav_icon'></i> <span class="nav_name">Data Anggota</span> </a> 
                        <a href="{{ route('peminjaman.index') }}" class="nav_link"> <i class='bx bx-message-square-detail nav_icon'></i> <span class="nav_name">Peminjaman</span> </a> 
                        <a href="{{ route('pengembalian.index') }}" class="nav_link"> <i class='bx bx-bookmark nav_icon'></i> <span class="nav_name">Pengembalian</span> </a> 
                    @endcan
                </div>

                <a href="{{ route('home.view') }}" class="nav_link"> <i class='bx bx-log-out nav_icon'></i> <span class="nav_name">Logout</span> </a>
            </div> 
        </nav>
    </div>

    <div class="container mt-3">
        <div class="row">
            @can('admin')
            <h1>Selamat Datang, Admin!</h1>
            <br><br>
                <div class="col-md-3 mb-4">
                    <div class="card card-buku">
                        <div class="card-body">
                            <i class='bx bx-book-open big-icon'></i>
                            <h5 class="card-title">Data Buku</h5>
                            <p class="card-text">Informasi mengenai semua buku yang tersedia di perpustakaan.</p>
                            <a href="{{ route('buku.index') }}" class="btn btn-primary">Lihat Data Buku</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 mb-4">
                    <div class="card card-anggota">
                        <div class="card-body">
                            <i class='bx bx-user big-icon'></i>
                            <h5 class="card-title">Data Anggota</h5>
                            <p class="card-text">Informasi mengenai anggota perpustakaan.</p>
                            <a href="{{ route('dashboard.showDataPengguna') }}" class="btn btn-primary">Lihat Data Anggota</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 mb-4">
                    <div class="card card-peminjaman">
                        <div class="card-body">
                            <i class='bx bx-message-square-detail big-icon'></i>
                            <h5 class="card-title">Data Peminjaman</h5>
                            <p class="card-text">Informasi mengenai peminjaman buku.</p>
                            <a href="{{ route('peminjaman.index') }}" class="btn btn-primary">Lihat Data Peminjaman</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 mb-4">
                    <div class="card card-pengembalian">
                        <div class="card-body">
                            <i class='bx bx-bookmark big-icon'></i>
                            <h5 class="card-title">Data Pengembalian</h5>
                            <p class="card-text">Informasi mengenai pengembalian buku.</p>
                            <a href="{{ route('pengembalian.index') }}" class="btn btn-primary">Lihat Data Pengembalian</a>
                        </div>
                    </div>
                </div>
            @endcan
        </div>
        @if (!Auth::user()->is_admin)
        <div class="not-admin">
            <h5>Selamat datang di sistem informasi perpustakaan kami! Jangan biarkan diri Anda terbatas oleh keterbatasan informasi. Bersama kami, Anda dapat menemukan rekomendasi buku yang tepat berdasarkan referensi dan preferensi Anda. Mari mulai perjalanan membaca yang menginspirasi dan memperkaya pengetahuan Anda dengan setiap buku yang kami rekomendasikan. Tunggu apa lagi? Jelajahi dunia buku yang menunggu Anda, mulai sekarang.</h5>
            <div class="container mt-3">
                <div class="row">
                    <div class="col-md-3 mb-4">
                        <div class="card card-buku">
                            <div class="card-body">
                                <i class='bx bx-book-open big-icon'></i>
                                <h5 class="card-title">Rekomendasi Buku</h5>
                                <p class="card-text">Dapatkan rekomendasi buku terbaik yang sesuai dengan preferensi dan referensi Anda.</p>
                                <a href="{{ route('data.buku2') }}" class="btn btn-primary">Lihat Rekomendasi Buku</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endif
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/js/all.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function(event) {
            const showNavbar = (toggleId, navId, bodyId, headerId) => {
                const toggle = document.getElementById(toggleId),
                      nav = document.getElementById(navId),
                      bodypd = document.getElementById(bodyId),
                      headerpd = document.getElementById(headerId);

                if (toggle && nav && bodypd && headerpd) {
                    toggle.addEventListener('click', () => {
                        nav.classList.toggle('show');
                        toggle.classList.toggle('bx-x');
                        bodypd.classList.toggle('body-pd');
                        headerpd.classList.toggle('body-pd');
                    });
                }
            };

            showNavbar('header-toggle', 'nav-bar', 'body-pd', 'header');

            const linkColor = document.querySelectorAll('.nav_link');
            function colorLink() {
                if (linkColor) {
                    linkColor.forEach(l => l.classList.remove('active'));
                    this.classList.add('active');
                }
            }
            linkColor.forEach(l => l.addEventListener('click', colorLink));
        });
    </script>
</body>
</html>
