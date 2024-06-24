<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;


class PengembalianController extends Controller
{
    public function index(Request $request)
{
    $search = $request->input('search');

    // Query data peminjaman dengan filter pencarian jika ada
    $query = DB::table('pengembalian');

    if (!empty($search)) {
        $query->where('kode_buku', 'like', '%' . $search . '%')
              ->orWhere('judul', 'like', '%' . $search . '%')
              ->orWhere('nama_peminjam', 'like', '%' . $search . '%');
    }

    $data['pengembalian'] = $query->get();

    return view('pengembalian', $data);
}
}
