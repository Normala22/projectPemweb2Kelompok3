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

        // Search functionality
        if ($request->has('search')) {
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
        }

        $buku = $query->get();

        // Mengirim data buku ke view data-buku2
        return view('data-buku2', compact('buku'));
    }

    public function showDataPengguna()
    {
        // Logic to retrieve and display data about users
        // For example:
        $users = DB::table('users')->get();

        return view('anggota', compact('users'));
    }
}
