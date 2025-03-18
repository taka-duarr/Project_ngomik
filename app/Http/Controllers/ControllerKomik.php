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
            'nama_komik' => 'required|string|max:255',
            'genre' => 'required|string|max:255',
            'status' => 'required|boolean',
            'gambar_komik' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'sinopsis' => 'required|string',
        ]);

        // Upload gambar
        if ($request->hasFile('gambar_komik')) {
            $gambarPath = $request->file('gambar_komik')->store('img_komik', 'public');
        } else {
            $gambarPath = null;
        }

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
        $request->validate([
            'nama_komik' => 'required|string|max:255',
            'genre' => 'required|string|max:255',
            'sinopsis' => 'required|string',
            'status' => 'required|boolean',
            'gambar_komik' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $komik = Komik::findOrFail($id);
        $komik->nama_komik = $request->nama_komik;
        $komik->genre = $request->genre;
        $komik->sinopsis = $request->sinopsis;
        $komik->status = $request->status;

        if ($request->hasFile('gambar_komik')) {
            // Hapus gambar lama jika ada
            if ($komik->gambar_komik) {
                Storage::delete('public/img_komik/' . $komik->gambar_komik);
            }

            $file = $request->file('gambar_komik');
            $namaFile = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('public/img_komik', $namaFile);
            $komik->gambar_komik = $namaFile;
        }

        $komik->save();

        return redirect()->route('ViewAdmin.komiklist')->with('success', 'Komik berhasil diperbarui');
    }

    public function destroy($id)
{
    $komik = Komik::findOrFail($id);

    // Hapus gambar dari storage jika ada
    if ($komik->gambar_komik) {
        Storage::delete('public/img_komik/' . $komik->gambar_komik);
    }

    $komik->delete();

    return redirect()->route('ViewAdmin.komiklist')->with('success', 'Komik berhasil dihapus');
}

}
