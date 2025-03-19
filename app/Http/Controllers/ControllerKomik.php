<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Komik;
use Illuminate\Support\Facades\Storage;

class ControllerKomik extends Controller
{
    public function index()
    {
        $komiks = Komik::all();
        return view('ViewUser.index', compact('komiks'));
    }

    public function indexAdmin()
    {
        $komiks = Komik::all();
        return view('ViewAdmin.komiklist', compact('komiks'));
    }

    public function create()
    {
        return view('ViewAdmin.komikinput');
    }

    public function store(Request $request)
{
    $request->validate([
        'nama_komik' => 'required|string',
        'genre' => 'required|string',
        'status' => 'required|boolean',
        'gambar_komik' => 'required|image',
        'sinopsis' => 'required|string',
    ]);

    // Upload gambar
    // if ($request->hasFile('gambar_komik')) {
    //     $file = $request->file('gambar_komik');
        
    // } else {
    //     $filename = null;
    // }

    $gambarPath = $request->file('gambar_komik')->store('img_komik', 'public');
    // Simpan data ke database
    Komik::create([
        'nama_komik' => $request->nama_komik,
        'genre' => $request->genre,
        'status' => $request->status,
        'gambar_komik' => $gambarPath,
        'sinopsis' => $request->sinopsis,
    ]);

    return redirect()->route('ViewAdmin.komiklist')->with('success', 'Komik berhasil ditambahkan!');
}



    public function edit($id)
    {
        $komik = Komik::findOrFail($id);
        return view('ViewAdmin.komikupdate', compact('komik'));
    }

    public function update(Request $request, $id)
{
    // Validasi input
    $request->validate([
        'nama_komik' => 'required|string',
        'genre' => 'required|string',
        'status' => 'required|boolean',
        'gambar_komik' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        'sinopsis' => 'required|string',
    ]);

    // Ambil data komik berdasarkan ID
    $komik = Komik::findOrFail($id);

    // Cek apakah pengguna mengunggah gambar baru
    if ($request->hasFile('gambar_komik')) {
        // Hapus gambar lama jika ada
        if ($komik->gambar_komik && Storage::disk('public')->exists($komik->gambar_komik)) {
            Storage::disk('public')->delete($komik->gambar_komik);
        }

        // Simpan gambar baru
        $gambarPath = $request->file('gambar_komik')->store('img_komik', 'public');
    } else {
        // Gunakan gambar lama jika tidak ada perubahan
        $gambarPath = $komik->gambar_komik;
    }

    // Update data di database
    $komik->update([
        'nama_komik' => $request->nama_komik,
        'genre' => $request->genre,
        'status' => $request->status,
        'gambar_komik' => $gambarPath, // Simpan path baru atau lama
        'sinopsis' => $request->sinopsis,
    ]);

    return redirect()->route('ViewAdmin.komiklist')->with('success', 'Komik berhasil diperbarui!');
}

public function destroy($id)
{
    $komik = Komik::findOrFail($id);

    // Hapus gambar dari storage jika ada
    if ($komik->gambar_komik && Storage::disk('public')->exists($komik->gambar_komik)) {
        Storage::disk('public')->delete($komik->gambar_komik);
    }

    // Hapus data dari database
    $komik->delete();

    return redirect()->route('ViewAdmin.komiklist')->with('success', 'Komik berhasil dihapus');
}

}
