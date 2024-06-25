<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Buku</title>
    <link rel="stylesheet" href="sidebar.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        body {
            background: linear-gradient(to right, #ffecd2, #fcb69f);
        }
        .container {
            padding-top: 80px;
        }
        .input-group {
            padding
            max-width: 600px; 
            margin: 0 auto; 
        }

        .input-group .form-control {
            border-top-left-radius: 25px;
            border-bottom-left-radius: 25px;
            border-color: #d2b48c; 
            box-shadow: none; 
        }

        .input-group .btn-primary {
            background-color: #d2b48c; 
            border-top-right-radius: 25px;
            border-bottom-right-radius: 25px;
            border-color: #d2b48c; 
            color: white; 
        }

        .input-group .btn-primary:hover {
            background-color: #c4a484; 
            border-color: #c4a484;
        }

        .input-group .btn-primary:focus,
        .input-group .form-control:focus {
            box-shadow: none; 
            border-color: #c4a484; 
        }

        .card {
            border: none; 
            border-radius: 15px; 
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); 
            transition: transform 0.2s, box-shadow 0.2s; 
        }

        .card:hover {
            transform: translateY(-10px); 
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2); 
        }

        .card-img-top {
            border-top-left-radius: 15px; 
            border-top-right-radius: 15px; 
        }

        .card-title {
            font-weight: bold; 
            color: #333; 
        }

        .card-text {
            color: #666; 
            font-size: 0.9rem; 
        }

        .card-description {
            color: #888; 
            font-size: 0.85rem; 
        }
    </style>
</head>
<body id="body-pd">
    <header class="header d-flex align-items-center" id="header">
        <div class="header_toggle">
            <i class='bx bx-menu' id="header-toggle"></i>
        </div>
        <div class="header_title">Data Buku</div>
    </header>
    <div class="l-navbar" id="nav-bar">
        <nav class="nav">
            <div> 
                <a href="#" class="nav_logo">
                    <i class='bx bx-layer nav_logo-icon'></i>
                    <span class="nav_logo-name">Perpustakaan</span>
                </a>
                <div class="nav_list">
                    <a href="{{ route('dashboard.index') }}" class="nav_link"><i class='bx bx-home nav_icon'></i> <span class="nav_name">Dashboard</span> </a>
                    <a href="{{ route('data.buku2') }}" class="nav_link active"><i class='bx bx-grid-alt nav_icon'></i> <span class="nav_name">Data Buku</span> </a> 
                </div>
                <a href="{{ route('home.index') }}" class="nav_link"> <i class='bx bx-log-out nav_icon'></i> <span class="nav_name">Logout</span> </a>
            </div> 
        </nav>
    </div>
    <main>
        <div class="container mt-5">
            <!-- Search Form -->
            <form action="{{ route('data.buku2') }}" method="GET" class="mb-4">
                <div class="input-group">
                    <input type="text" name="search" class="form-control" placeholder="Cari buku berdasarkan judul, pengarang, genre, atau jenis buku..." value="{{ request('search') }}">
                    <button class="btn btn-primary" type="submit">Search</button>
                </div>
            </form>

            <div class="row row-cols-1 row-cols-md-5 g-4">
                @foreach ($buku as $item)
                    <div class="col">
                        <div class="card h-100">
                            @if ($item->gambar)
                                <img src="{{ asset('storage/' . $item->gambar) }}" class="card-img-top" alt="{{ $item->judul }}">
                            @else
                                <img src="{{ asset('storage/default-image.jpg') }}" class="card-img-top" alt="Default Image">
                            @endif
                            <div class="card-body">
                                <h5 class="card-title">{{ $item->judul }}</h5>
                                <p class="card-text">{{ $item->pengarang }}</p>
                                <p class="card-description">{{ $item->deskripsi }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </main>

    <!-- JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="script.js"></script>
    <script>
        // Initialize AOS
        AOS.init();
    </script>

</body>
</html>
