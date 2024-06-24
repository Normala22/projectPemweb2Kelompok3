<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Landing page</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">
    <link rel="stylesheet" href="landpage.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <style>
        .container {
            padding: 20px;
        }
        .card {
            border: none;
            border-radius: 15px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            overflow: hidden;
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
        }

        .card-img-top {
            border-top-left-radius: 15px;
            border-top-right-radius: 15px;
            object-fit: cover;
            height: 300px;
            width: 100%;
        }

        .card-body {
            padding: 1.25rem;
        }

        .card-title {
            font-size: 1.25rem;
            margin-bottom: 0.5rem;
            font-weight: bold;
        }

        .card-text {
            font-size: 1rem;
            color: #555;
        }
        
        .btn-primary {
            background-color: var(--blue);
            border-color: var(--blue);
            color: white;
            transition: background-color 0.3s ease, border-color 0.3s ease, transform 0.3s ease;
            text-transform: uppercase;
            font-weight: bold;
            padding: 0.75rem 1.5rem;
            border-radius: 20px;
        }
        .btn-primary:hover {
            background-color: #1a4670; 
            border-color: #1a4670; 
            transform: translateY(-2px);
        }

        /* Centering the title */
        h2.text-center {
            text-align: center;
            margin-top: 3rem; /* Example margin top */
        }

        /* Custom CSS for 5 columns on medium and larger screens */
        @media (min-width: 768px) {
            .row-cols-1 {
                column-count: 5;
                column-gap: 2rem;
            }

            .row-cols-1 > * {
                break-inside: avoid;
                padding: 0 0 2rem 0;
                width: calc(100% - 2rem);
            }
        }
    </style>
</head>
<body>
    <!-- Navigation Bar -->
    <nav class="app__navbar">
        <div class="app__navbar_Logo">
            <img src="logo.png" alt="Logo Popular">
        </div>
        <div class="app__navbar_link">
            <ul>
                <li><a href="{{ route('home.index') }}">Home</a></li>
                <li><a href="{{ route('about.index') }}">About</a></li>
                <li><a href="{{ route('data.buku') }}">Data Buku</a></li>
            </ul>
        </div>
        <div class="app__navbar_button">
            <a href="{{ route('login') }}" class="button__1">LOGIN</a>
        </div>
        <div class="app__navbar_smallscreen">
            <span class="material-symbols-outlined overlay_open">menu</span>
            <div class="app__navbar_smallscreen_overlay slide-bottom">
                <span class="material-symbols-outlined overlay_close">close</span>
                <ul class="app__navbar_smallscreen_links">
                    <li><a href="#">Home</a></li>
                    <li><a href="#about">About</a></li>
                    <li><a href="#content">Content</a></li>
                </ul>
                <div class="app__navbar_smallscreen_button">
                    <button class="button__1">LOGIN</button>
                </div>
            </div>
        </div>
    </nav>

    <!-- Data Buku -->
    <main>
        <h2 class="text-center mt-5">DATA BUKU</h2>
        <div class="container mt-5">
            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <div class="row row-cols-1 row-cols-md-5 g-4">
                @foreach ($buku->take(20) as $item)
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
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Tombol "Tampilkan Buku Lainnya" -->
            <div class="text-center mt-4">
                <a href="{{ route('login') }}" class="btn btn-primary">
                    <i class="fas fa-book-open"></i> Tampilkan Buku Lainnya
                </a>
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
