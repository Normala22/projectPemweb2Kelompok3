<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Pengembalian</title>
    <link rel="stylesheet" href="sidebar.css">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- Boxicons CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <!-- Font Awesome CSS -->
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
            background-image: url('book3.jpg'); /* Update the path to your image */
            background-size: cover;
            background-repeat: no-repeat;
            filter: blur(1.5px);
            z-index: -1;
        }

        .content {
            position: relative;
            z-index: 1;
            background-color: rgba(255, 255, 255, 0.8); /* Optional: to improve readability */
            padding: 20px;
            border-radius: 10px;
        }

        .header_title {
            color: #F7DCB9;
        }

        .topnav {
            float: right;
            margin-top: 8px; /* Margin atas untuk menyesuaikan dengan elemen sekitar */
        }

        .topnav .search-container {
            display: inline-block; /* Mengatur elemen agar tetap sejajar */
        }

        .topnav input[type=text] {
            padding: 8px; /* Sedikit diperbesar padding untuk meningkatkan kenyamanan */
            font-size: 16px; /* Sedikit dikurangi ukuran font untuk penampilan yang lebih ringkas */
            border: 1px solid #ccc; /* Menambahkan border agar input terlihat jelas */
            border-radius: 4px; /* Melengkungkan sudut input */
        }

        .topnav .search-container button {
            padding: 8px 12px; /* Padding tombol disesuaikan agar lebih seimbang */
            background-color: #007bff; /* Warna latar belakang tombol */
            color: white; /* Warna teks di tombol */
            border: none;
            border-radius: 4px; /* Melengkungkan sudut tombol */
            cursor: pointer;
        }

        .topnav .search-container button:hover {
            background-color: #0056b3; /* Warna latar belakang tombol saat dihover */
        }
    </style>
</head>
<body id="body-pd">
    <header class="header" id="header">
        <div class="header_toggle">
            <i class='bx bx-menu' id="header-toggle"></i>
        </div>
        <div class="header_title">Data Pengembalian Buku</div>
    </header>
    <div class="l-navbar" id="nav-bar">
        <nav class="nav">
            <div> 
                <a href="#" class="nav_logo"> <i class='bx bx-layer nav_logo-icon'></i> <span class="nav_logo-name">Perpustakaan</span> </a>
                <div class="nav_list"> 
                    <a href="{{ route('dashboard.index') }}" class="nav_link"><i class='bx bx-home nav_icon'></i> <span class="nav_name">Dashboard</span> </a>
                    <a href="{{ route('buku.index') }}" class="nav_link"><i class='bx bx-grid-alt nav_icon'></i> <span class="nav_name">Data Buku</span> </a> 
                    <a href="{{ route('dashboard.showDataPengguna') }}" class="nav_link"><i class='bx bx-user nav_icon'></i> <span class="nav_name">Data Anggota</span> </a> 
                    <a href="{{ route('peminjaman.index') }}" class="nav_link"> <i class='bx bx-message-square-detail nav_icon'></i> <span class="nav_name">Peminjaman</span> </a> 
                    <a href="{{ route('pengembalian.index') }}" class="nav_link active"> <i class='bx bx-bookmark nav_icon'></i> <span class="nav_name">Pengembalian</span> </a> 
                </div>
                <a href="{{ route('home.logout') }}" class="nav_link"> <i class='bx bx-log-out nav_icon'></i> <span class="nav_name">Logout</span> </a>
            </div> 
        </nav>
    </div>
    <br><br>
    <div class="container mt-5">
        <!-- Alert messages -->
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <!-- Form pencarian -->
        <form action="{{ route('pengembalian.index') }}" method="GET" class="topnav d-flex">
            <div class="search-container flex-grow-1 me-2">
                <input type="text" name="search" class="form-control" placeholder="Cari...">
            </div>
            <button type="submit" class="btn btn-primary btn-sm">
                <i class="fas fa-search"></i> Cari
            </button>
        </form>
        <br><br><br>
        <table class="table table-bordered text-center">
            <thead class="table-dark">
                <tr>
                    <th>NO</th>
                    <th>Kode Buku</th>
                    <th>Judul</th>
                    <th>Nama Peminjam</th>
                    <th>Tanggal Peminjaman</th>
                    <th>Tanggal Pengembalian</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $no = 1;
                @endphp
                @foreach ($pengembalian as $item)
                    <tr class="{{ $loop->odd ? 'table-light' : 'table-secondary' }}">
                        <td>{{ $no }}</td>
                        <td>{{ $item->kode_buku }}</td>
                        <td>{{ $item->judul }}</td>
                        <td>{{ $item->nama_peminjam }}</td>
                        <td>{{ $item->tanggal_peminjaman }}</td>
                        <td>{{ $item->tanggal_pengembalian }}</td>
                        <td>{{ $item->status }}</td>
                    </tr>
                    @php
                        $no++;
                    @endphp
                @endforeach
            </tbody>
        </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/js/all.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbVfXPpu1y0vL59+jn4Lr6oc5gK3tx7q0n3zP4yyxloY12Aw+g8/sfKw/e7P5K9" crossorigin="anonymous"></script>
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