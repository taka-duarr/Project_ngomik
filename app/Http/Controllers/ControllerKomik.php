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

    public function create()
    {
        return view('komik.create');
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
        $path = $request->file('gambar_komik')->store('komik', 'public');

        Komik::create([
            'nama_komik' => $request->nama_komik,
            'genre' => $request->genre,
            'status' => $request->status,
            'gambar_komik' => $path,
            'sinopsis' => $request->sinopsis,
        ]);

        return redirect()->route('ViewUser.index')->with('success', 'Komik berhasil ditambahkan!');
    }

    public function show($id)
    {
        $komik = Komik::findOrFail($id);
        return view('komik.show', compact('komik'));
    }

    public function edit($id)
    {
        $komik = Komik::findOrFail($id);
        return view('komik.edit', compact('komik'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_komik' => 'required|string|max:255',
            'genre' => 'required|string|max:255',
            'status' => 'required|boolean',
            'gambar_komik' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'sinopsis' => 'required|string',
        ]);

        $komik = Komik::findOrFail($id);

        if ($request->hasFile('gambar_komik')) {
            // Hapus gambar lama
            Storage::disk('public')->delete($komik->gambar_komik);
            // Simpan gambar baru
            $path = $request->file('gambar_komik')->store('komik', 'public');
        } else {
            $path = $komik->gambar_komik;
        }

        $komik->update([
            'nama_komik' => $request->nama_komik,
            'genre' => $request->genre,
            'status' => $request->status,
            'gambar_komik' => $path,
            'sinopsis' => $request->sinopsis,
        ]);

        return redirect()->route('ViewUser.index')->with('success', 'Komik berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $komik = Komik::findOrFail($id);
        Storage::disk('public')->delete($komik->gambar_komik);
        $komik->delete();

        return redirect()->route('ViewUser.index')->with('success', 'Komik berhasil dihapus!');
    }
}
