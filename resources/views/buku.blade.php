<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Buku</title>
    <link rel="stylesheet" href="sidebar.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-pzjw8f+ua7Kw1TIq9CxgohG1W3rPBbC2b3iG3KjFlmviG/3f9pG5R5G/e9pKz9zF" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
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
            background-image: url('latar1.jpeg'); /* Update the path to your image */
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

        .pagination .page-item .page-link {
            font-size: 14px; /* Ubah ukuran font sesuai kebutuhan */
            padding: 0.25rem 0.5rem; /* Sesuaikan padding */
            margin-bottom: 10px;
        }

        .pagination .page-item .page-link svg {
            width: 1em; /* Sesuaikan lebar ikon */
            height: 1em; /* Sesuaikan tinggi ikon */
        }
    </style>
</head>
<body id="body-pd">
    <header class="header" id="header">
        <div class="header_toggle"> <i class='bx bx-menu' id="header-toggle"></i> </div>
        <div class="header_title">Data Buku</div>
    </header>
    <div class="l-navbar" id="nav-bar">
        <nav class="nav">
            <div> 
                <a href="#" class="nav_logo"> <i class='bx bx-layer nav_logo-icon'></i> <span class="nav_logo-name">Perpustakaan</span> </a>
                <div class="nav_list"> 
                    <a href="{{ route('dashboard.index') }}" class="nav_link"><i class='bx bx-home nav_icon'></i> <span class="nav_name">Dashboard</span> </a>
                    <a href="{{ route('buku.index') }}" class="nav_link active"><i class='bx bx-grid-alt nav_icon'></i> <span class="nav_name">Data Buku</span> </a> 
                    @can('admin')
                        <a href="{{ route('dashboard.showDataPengguna') }}" class="nav_link"><i class='bx bx-user nav_icon'></i> <span class="nav_name">Data Anggota</span> </a> 
                        <a href="{{ route('peminjaman.index') }}" class="nav_link"> <i class='bx bx-message-square-detail nav_icon'></i> <span class="nav_name">Peminjaman</span> </a> 
                        <a href="{{ route('pengembalian.index') }}" class="nav_link"> <i class='bx bx-bookmark nav_icon'></i> <span class="nav_name">Pengembalian</span> </a> 
                    @endcan
                </div>
                <a href="{{ route('home.logout') }}" class="nav_link"> <i class='bx bx-log-out nav_icon'></i> <span class="nav_name">Logout</span> </a>
            </div> 
        </nav>
    </div>
    <br><br><br>
    <div class="container mt-5">
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="d-flex justify-content-between align-items-center mb-4">
            <a href="{{ route('buku.create') }}" class="btn btn-success">
                <i class="fas fa-plus"></i> Tambah data
            </a>
    
            <!-- Form pencarian -->
            <form action="{{ route('buku.index') }}" method="GET" class="topnav d-flex">
                <div class="search-container flex-grow-1 me-2">
                    <input type="text" name="search" class="form-control" placeholder="Cari...">
                </div>
                <button type="submit" class="btn btn-primary btn-sm">
                    <i class="fas fa-search"></i> Cari
                </button>
            </form>
        </div>        

        <table class="table table-bordered text-center">
            <thead class="table-dark">
                <tr>
                    <th>NO</th>
                    <th>Gambar</th>
                    <th>Kode Buku</th>
                    <th>Judul Buku</th>
                    <th>Pengarang</th>
                    <th>Genre</th>
                    <th>Jenis Buku</th>
                    <th>Deskripsi Buku</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $no = ($buku->currentPage() - 1) * $buku->perPage() + 1;
                @endphp
                @foreach ($buku as $item)
                    <tr class="{{ $loop->odd ? 'table-light' : 'table-secondary' }}">
                        <td>{{ $no }}</td>
                        <td>
                            @if($item->gambar)
                                <img src="{{ asset('storage/' . $item->gambar) }}" alt="Gambar Buku" class="img-thumbnail" width="100">
                            @else
                                Tidak ada gambar
                            @endif
                        </td>
                        <td>{{ $item->kode_buku }}</td>
                        <td>{{ $item->judul }}</td>
                        <td>{{ $item->pengarang }}</td>
                        <td>{{ $item->genre }}</td>
                        <td>{{ $item->jenis_buku }}</td>
                        <td>{{ $item->deskripsi }}</td>
                        <td>
                            <a href="{{ route('buku.edit', $item->id) }}" class="btn btn-warning text-light">
                                <i class="fas fa-edit"></i> Edit
                            </a>
                            <form action="{{ route('buku.destroy', $item->id) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger">
                                    <i class="fas fa-trash-alt"></i> Hapus
                                </button>
                            </form>
                        </td>
                    </tr>
                    @php
                        $no++;
                    @endphp
                @endforeach
            </tbody>
        </table>

        <!-- Custom Pagination Links -->
        <div class="d-flex justify-content-between">
            @if ($buku->onFirstPage())
                <span class="btn btn-secondary disabled">&lsaquo; Previous</span>
            @else
                <a class="btn btn-primary" href="{{ $buku->previousPageUrl() }}" rel="prev">&lsaquo; Previous</a>
            @endif

            @if ($buku->hasMorePages())
                <a class="btn btn-primary" href="{{ $buku->nextPageUrl() }}" rel="next">Next &rsaquo;</a>
            @else
                <span class="btn btn-secondary disabled">Next &rsaquo;</span>
            @endif
        </div>
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
