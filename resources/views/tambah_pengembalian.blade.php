<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data Pengembalian</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    
<div class="container mt-5">
    <h2 class="text-center mb-4">Tambah Data Pengembalian</h2>
    <div class="card p-4 shadow-sm">
        <form action="{{ route('pengembalian.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="kodeBukuInput" class="form-label">Kode Buku :</label>
                <input type="text" name="kode_buku" id="kodeBukuInput" class="form-control">
            </div>
            <div class="mb-3">
                <label for="judulInput" class="form-label">Judul :</label>
                <input type="text" id="judulInput" name="judul" class="form-control">
            </div>
            <div class="mb-3">
                <label for="namaPeminjamInput" class="form-label">Nama Peminjam :</label>
                <input type="text" id="namaPeminjamInput" name="nama_peminjam" class="form-control">
            </div>
            <div class="mb-3">
                <label for="tanggalPeminjamanInput" class="form-label">Tanggal Peminjaman :</label>
                <input type="date" id="tanggalPeminjamanInput" name="tanggal_peminjaman" class="form-control">
            </div>
            <div class="mb-3">
                <label for="tanggalPengembalianInput" class="form-label">Tanggal Pengembalian :</label>
                <input type="date" id="tanggalPengembalianInput" name="tanggal_pengembalian" class="form-control">
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-success">Tambah</button>
            </div>
        </form>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>