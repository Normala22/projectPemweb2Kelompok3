<?php
namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class AnggotaController extends Controller
{
    public function index()
    {
        // Mengambil semua data anggota dari model User
        $users = User::all();
        
        // Mengirim data anggota ke view anggota.blade.php
        return view('anggota', compact('users'));
    }

    public function destroy($id)
    {
        $anggota = User::findOrFail($id);
        
        // Hapus anggota dari basis data
        $anggota->delete();

        // Redirect ke halaman data anggota dengan pesan sukses
        return redirect()->route('dashboard.showDataPengguna')->with('success', 'Data anggota berhasil dihapus');
    }

    public function showDataPengguna()
    {
        // Mengambil semua data pengguna
        $users = User::all();
        
        // Mengirim data pengguna ke view data-pengguna.blade.php
        return view('data-pengguna', compact('users'));
    }
}
