<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        // Mengambil data buku dari database
        $buku = DB::table('buku')->get(); 

        // Mengirim data buku ke view dashboard
        return view('dashboard', compact('buku'));
    }

    public function dataBuku()
    {
        // Mengambil data buku dari database
        $buku = DB::table('buku')->get();
        
        // Mengirim data buku ke view data-buku
        return view('data-buku', compact('buku'));
    }

    public function dataBuku2(Request $request)
    {
        $query = DB::table('buku');

        if ($request->has('search') && !empty($request->input('search'))) {
            $search = $request->input('search');
            // Memisahkan pencarian berdasarkan spasi
            $keywords = explode(' ', $search);

            foreach ($keywords as $keyword) {
                $query->where(function ($query) use ($keyword) {
                    $query->where('judul', 'LIKE', "%{$keyword}%")
                        ->orWhere('pengarang', 'LIKE', "%{$keyword}%")
                        ->orWhere('genre', 'LIKE', "%{$keyword}%")
                        ->orWhere('jenis_buku', 'LIKE', "%{$keyword}%");
                });
            }

            // Menyimpan data pencarian terakhir
            session(['last_search' => $search]);
        } else {
            // Mendapatkan data pencarian terakhir
            $search = session('last_search', null);
        }

        $buku = $query->get();

        // Kode untuk menampilkan berdasarkan data pencarian terakhir
        $recommendedQuery = DB::table('buku');
        if ($search) {
            $keywords = explode(' ', $search);
            foreach ($keywords as $keyword) {
                $recommendedQuery->where(function ($query) use ($keyword) {
                    $query->where('judul', 'LIKE', "%{$keyword}%")
                        ->orWhere('pengarang', 'LIKE', "%{$keyword}%")
                        ->orWhere('genre', 'LIKE', "%{$keyword}%")
                        ->orWhere('jenis_buku', 'LIKE', "%{$keyword}%");
                });
            }
        }
        $recommendedBooks = $recommendedQuery->get();

        // Mengirim data buku dan rekomendasi ke view data-buku2
        return view('data-buku2', compact('buku', 'recommendedBooks'));
    }

    public function showDataPengguna()
    {
        $users = DB::table('users')->get();

        return view('anggota', compact('users'));
    }
}
