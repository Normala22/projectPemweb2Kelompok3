<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Buku;
use Illuminate\Support\Facades\DB;

class BukuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['buku'] = DB::table('buku')->get();
        return view('buku', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tambah_buku');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'kodeInput' => 'required',
            'judulInput' => 'required',
            'pengarangInput' => 'required',
            'genreInput' => 'required',
            'jenisInput' => 'required',
            'deskripsiInput' => 'nullable|string',
            'gambarInput' => 'image|file|max:2048',
        ]);

        $gambarPath = null;
        if ($request->hasFile('gambarInput')) {
            $gambarPath = $request->file('gambarInput')->store('buku-images', 'public');
        }

        $query = DB::table('buku')->insert([
            'kode_buku' => $validatedData['kodeInput'],
            'judul' => $validatedData['judulInput'],
            'pengarang' => $validatedData['pengarangInput'],
            'genre' => $validatedData['genreInput'],
            'jenis_buku' => $validatedData['jenisInput'],
            'deskripsi' => $validatedData['deskripsiInput'],
            'gambar' => $gambarPath,
        ]);

        if ($query) {
            return redirect()->route('buku.index')->with('success', 'Data berhasil ditambahkan');
        } else {
            return redirect()->route('buku.index')->with('failed', 'Data gagal ditambahkan');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['buku'] = DB::table('buku')->where('id', $id)->first();
        return view('editbuku', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'kodeInput' => 'required',
            'judulInput' => 'required',
            'pengarangInput' => 'required',
            'genreInput' => 'required',
            'jenisInput' => 'required',
            'deskripsiInput' => 'nullable|string',
            'gambarInput' => 'image|file|max:2048',
        ]);

        $currentImage = DB::table('buku')->where('id', $id)->value('gambar');

        if ($request->hasFile('gambarInput')) {
            if ($currentImage) {
                Storage::disk('public')->delete($currentImage);
            }
            $gambarPath = $request->file('gambarInput')->store('buku-images', 'public');
        } else {
            $gambarPath = $currentImage;
        }

        $query = DB::table('buku')->where('id', $id)->update([
            'kode_buku' => $validatedData['kodeInput'],
            'judul' => $validatedData['judulInput'],
            'pengarang' => $validatedData['pengarangInput'],
            'genre' => $validatedData['genreInput'],
            'jenis_buku' => $validatedData['jenisInput'],
            'deskripsi' => $validatedData['deskripsiInput'],
            'gambar' => $gambarPath,
        ]);

        if ($query) {
            return redirect()->route('buku.index')->with('success', 'Data berhasil diperbarui');
        } else {
            return redirect()->route('buku.index')->with('failed', 'Data gagal diperbarui');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $currentImage = DB::table('buku')->where('id', $id)->value('gambar');
        if ($currentImage) {
            Storage::disk('public')->delete($currentImage);
        }

        $query = DB::table('buku')->where('id', $id)->delete();

        if ($query) {
            return redirect()->route('buku.index')->with('success', 'Data berhasil dihapus');
        } else {
            return redirect()->route('buku.index')->with('failed', 'Data gagal dihapus');
        }
    }

    public function borrowBook($id)
    {
        // Logika peminjaman buku, misalnya:
        $buku = Buku::find($id);

        if ($buku) {
            // Lakukan logika peminjaman buku, misalnya mengubah status peminjaman
            // $buku->status = 'dipinjam';
            // $buku->save();

            return response()->json(['success' => true]);
        } else {
            return response()->json(['success' => false], 404);
        }
    }
}
