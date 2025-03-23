<?php

namespace App\Http\Controllers;

use App\Models\Chapter;
use App\Models\Komik;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ControllerChapter extends Controller
{
    public function index($id_komik)
    {
        $komik = Komik::findOrFail($id_komik);
        $chapters = Chapter::where('id_komik', $id_komik)->get();

        return view('ViewAdmin.chapterlist', compact('komik', 'chapters'));
    }

    public function create($id_komik)
    {
        $komik = Komik::findOrFail($id_komik);
        return view('ViewAdmin.chapterinput', compact('komik'));
    }

    public function store(Request $request, $id_komik)
{
    // dd($request->all(), $request->file('file_chapter'));

    $request->validate([
        'nama_chapter' => 'required|string|max:255',
        'file_chapter' => 'required|file|mimes:pdf,jpg,png|max:2048',
    ]);

    // Simpan file ke storage (folder file_chapter di public disk)
    $filePath = $request->file('file_chapter')->store('file_chapter', 'public');

    // Simpan data ke database
    Chapter::create([
        'nama_chapter' => $request->nama_chapter,
        'id_komik' => $id_komik,
        'file_chapter' => $filePath, // Simpan path file
    ]);

    return redirect()->route('ViewAdmin.chapterlist', $id_komik)->with('success', 'Chapter berhasil ditambahkan!');
}

public function edit($id)
{
    $chapter = Chapter::findOrFail($id);
    return view('ViewAdmin.chapterupdate', compact('chapter'));
}

public function update(Request $request, $id)
{
    $request->validate([
        'nama_chapter' => 'required|string|max:255',
        'file_chapter' => 'nullable|file|mimes:pdf,jpg,png',
    ]);

    $chapter = Chapter::findOrFail($id);

    if ($request->hasFile('file_chapter')) {
        if($chapter->file_chapter && Storage::disk('public')->exists($chapter->file_chapter)){
            Storage::disk('public')->delete($chapter->file_chapter);
        }
        $filePath = $request->file('file_chapter')->store('file_chapter', 'public');
} else {
    $filePath = $chapter->file_chapter;
}

    $chapter->update([
        'nama_chapter' => $request->nama_chapter,
        'file_chapter' => $filePath,
    ]);

    return redirect()->route('ViewAdmin.chapterlist', $chapter->id_komik)->with('success', 'Chapter berhasil diperbarui!');



}

    public function destroy($id)
    {
        $chapter = Chapter::findOrFail($id);
        $id_komik = $chapter->id_komik;
    
        if (!empty($chapter->file_chapter) && Storage::disk('public')->exists($chapter->file_chapter)) {
            // Hapus file dari storage
            Storage::disk('public')->delete($chapter->file_chapter);
        }
    
        // Hapus data dari database
        $chapter->delete();
    
        return redirect()->route('ViewAdmin.chapterlist', $id_komik)->with('success', 'Chapter berhasil dihapus!');
    }
}
