<?php

namespace App\Http\Controllers;

use App\Models\Chapter;
use App\Models\Komik;
use Illuminate\Http\Request;

class ControllerChapter extends Controller
{
    public function index($id_komik)
    {
        $komik = Komik::findOrFail($id_komik);
        $chapters = Chapter::where('id_komik', $id_komik)->get();

        return view('admin.chapter.index', compact('komik', 'chapters'));
    }

    public function create($id_komik)
    {
        $komik = Komik::findOrFail($id_komik);
        return view('admin.chapter.create', compact('komik'));
    }

    public function store(Request $request, $id_komik)
    {
        $request->validate([
            'nama_chapter' => 'required|string|max:255',
        ]);

        Chapter::create([
            'nama_chapter' => $request->nama_chapter,
            'id_komik' => $id_komik,
        ]);

        return redirect()->route('chapters.index', $id_komik)->with('success', 'Chapter berhasil ditambahkan!');
    }

    public function destroy($id)
    {
        $chapter = Chapter::findOrFail($id);
        $id_komik = $chapter->id_komik;
        $chapter->delete();

        return redirect()->route('chapters.index', $id_komik)->with('success', 'Chapter berhasil dihapus!');
    }
}
