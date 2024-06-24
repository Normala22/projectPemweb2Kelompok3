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
            font-family: 'Arial', sans-serif;
            background-color: #f9f9f9;
            color: #333;
        }
        main {
            background-color: #f3ebe0;
            padding: 40px 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
            margin-top: 60px; /* Add this line */
        }
        .container {
            padding: 20px;
        }
        .card {
            border: 1px solid #ccc;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        .card:hover {
            transform: translateY(-10px);
            box-shadow: 0 8px 16px rgba(0,0,0,0.2);
        }
        .card-img-top {
            border-top-left-radius: 10px;
            border-top-right-radius: 10px;
            max-height: 300px;
            object-fit: cover;
        }
        .card-body {
            padding: 1.25rem;
        }
        .card-title {
            font-size: 1.25rem;
            margin-bottom: 0.75rem;
        }
        .card-text {
            font-size: 1rem;
            color: #555;
        }
        .btn-primary {
            background-color: #d2a679; /* Light brown color */
            border-color: #b3834f;   /* Slightly darker brown for border */
            color: white;
            transition: background-color 0.3s ease, border-color 0.3s ease, transform 0.3s ease;
            text-transform: uppercase;
            font-weight: bold;
            padding: 0.75rem 1.5rem;
            border-radius: 20px;
        }
        .btn-primary:hover {
            background-color: #b3834f; /* Darker brown */
            border-color: #8c5c2f; /* Even darker brown for border */
            transform: translateY(-2px);
        }
        
        .input-group {
            margin-bottom: 20px;
        }
        .header_title {
            font-size: 1.5rem;
            font-weight: bold;
            color: #6b4e16; /* Dark brown color for the header title */
        }
        .nav_logo-name, .nav_name {
            color: #6b4e16; /* Dark brown color for sidebar links */
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
                    <a href="{{ route('data.buku2') }}" class="nav_link"><i class='bx bx-grid-alt nav_icon'></i> <span class="nav_name">Data Buku</span> </a> 
                </div>
                <a href="{{ route('home.logout') }}" class="nav_link"> <i class='bx bx-log-out nav_icon'></i> <span class="nav_name">Logout</span> </a>
            </div> 
        </nav>
    </div>
    <br><br><br>
    <main>
        <div class="container mt-5">
            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

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
