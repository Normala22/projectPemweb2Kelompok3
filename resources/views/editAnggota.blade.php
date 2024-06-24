<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Anggota</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background-image: linear-gradient(to bottom right, #E7D4B5, #B6C7AA);
            height: 100vh;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            margin: 0;
        }
        .container {
            background-color: rgba(255, 255, 255, 0.8);
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
            width: 100%;
            max-width: 700px;
        }
        .card {
            width: 100%;
            border: none;
            transition: transform 0.2s;
            background-color: #fff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            padding: 20px;
        }
        .card:hover {
            transform: scale(1.02);
        }
        .btn-success {
            background-color: #28a745;
            border: none;
            transition: background-color 0.3s, transform 0.3s;
        }
        .btn-success:hover {
            background-color: #218838;
            transform: scale(1.05);
        }
        .form-floating label {
            transition: color 0.2s;
        }
        .form-floating input:focus + label {
            color: #F6E6CB;
        }
        .form-control:focus {
            border-color: #F6E6CB;
            box-shadow: 0 0 10px rgba(244, 212, 5, 0.5);
        }
        h2 {
            font-weight: 500;
            text-align: center;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <h2><b>Edit Data Anggota</b></h2>
    <div class="container">
        <div class="card">
            <form action="{{ route('anggota.update', $anggota->id) }}" method="POST">
                @method('PUT')
                @csrf
                <div class="mb-3">
                    <div class="form-floating">
                        <input type="text" name="name" id="namaInput" class="form-control" placeholder="Nama" value="{{ $anggota->name }}">
                        <label for="namaInput">Nama</label>
                    </div>
                </div>
                <div class="mb-3">
                    <div class="form-floating">
                        <input type="text" name="nim" id="nimInput" class="form-control" placeholder="NIM" value="{{ $anggota->nim }}">
                        <label for="nimInput">NIM</label>
                    </div>
                </div>
                <div class="mb-3">
                    <div class="form-floating">
                        <input type="email" name="email" id="emailInput" class="form-control" placeholder="Email" value="{{ $anggota->email }}">
                        <label for="emailInput">Email</label>
                    </div>
                </div>
                <div class="mb-3">
                    <div class="form-floating">
                        <select name="is_admin" id="levelInput" class="form-control">
                            <option value="1" {{ $anggota->is_admin == 1 ? 'selected' : '' }}>Admin</option>
                            <option value="0" {{ $anggota->is_admin == 0 ? 'selected' : '' }}>Mahasiswa</option>
                        </select>
                        <label for="levelInput">Level</label>
                    </div>
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-success">Simpan Perubahan</button>
                </div>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
