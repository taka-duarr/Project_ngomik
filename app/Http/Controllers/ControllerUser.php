<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Users;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;

class ControllerUser extends Controller
{
    public function index()
    {
        $users = Users::all();
        return view('ViewAdmin.userlist', compact('users'));
    }

    public function create()
    {
        return view('ViewAdmin.userinput'); // Langsung menuju view tanpa mengirim data
    }
    // Menyimpan data user baru
    public function store(Request $request)
    {
        $request->validate([
            'nama_user' => 'required|string|max:255',
            'role' => 'required|string|max:50',
            'password' => 'required|string',
            'status' => 'required|boolean',
        ]);

        Users::create([
            'nama_user' => $request->nama_user,
            'role' => $request->role,
            // 'password' => $request->password, // Jangan di-encrypt
            'password' => Hash::make($request->password), // 🔥 Enkripsi password
            'status' => $request->status, // 1 untuk Premium, 0 untuk Free
        ]);

        return redirect()->route('ViewAdmin.userlist')->with('success', 'User berhasil ditambahkan');
    }

    public function edit($id)
    {
        $user = Users::findOrFail($id);
        $roles = ['admin', 'user'];
        return view('ViewAdmin.userupdate', compact('user','roles'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_user' => 'required|string|max:255',
            'role' => 'required|string|max:50',
            'password' => 'nullable|string',
            'status' => 'required|boolean',
        ]);

        $user = Users::findOrFail($id);
        $user->nama_user = $request->nama_user;
        $user->role = $request->role;
        $user->status = $request->status;

        // Hanya update password jika diisi
        if ($request->filled('password')) {
            $user->password = bcrypt($request->password); //pass enkripsi
            // $user->password = $request->password;

        }

        $user->save();

        return redirect()->route('ViewAdmin.userlist')->with('success', 'User berhasil diperbarui');
    }

    public function destroy($id)
    {
        $user = Users::findOrFail($id);
        $user->delete();

        return redirect()->route('ViewAdmin.userlist')->with('success', 'User berhasil dihapus');
    }
    

}