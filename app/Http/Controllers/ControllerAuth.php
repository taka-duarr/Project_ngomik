<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Users;
use Illuminate\Support\Facades\Hash;

class ControllerAuth extends Controller
{
    // Menampilkan form register
    public function showRegisterForm()
    {
        return view('register');
    }

    // Proses register
    public function register(Request $request)
    {
        $request->validate([
            'nama_user' => 'required|string|unique:tb_user,nama_user',
            'password' => 'required|string|min:6|confirmed',
        ]);

        Users::create([
            'nama_user' => $request->nama_user,
            'password' => Hash::make($request->password), // 🔥 Hash password dengan Bcrypt
            'role' => 'user', // Default role sebagai "user"
            'status' => 0, // Default status aktif
        ]);

        return redirect()->route('login')->with('success', 'Registrasi berhasil! Silakan login.');
    }

    // Menampilkan form login
    public function showLoginForm()
    {
        return view('login');
    }

    // Proses login menggunakan Bcrypt
    public function login(Request $request)
    {
        $request->validate([
            'nama_user' => 'required',
            'password' => 'required',
        ]);

        // Ambil user berdasarkan nama_user
        $user = Users::where('nama_user', $request->nama_user)->first();

        // 🔥 Cek password dengan Hash::check()
        if ($user && Hash::check($request->password, $user->password)) {
            Auth::login($user);

            if($user->role == 'Admin') {
                return redirect()->route('ViewAdmin.userlist')->with('success', 'Login berhasil!');
            }else {
                return redirect()->route('ViewUser.index')->with('success', 'Login berhasil!');
            }
        }

        return back()->withErrors(['nama_user' => 'Nama pengguna atau password salah!'])->onlyInput('nama_user');
    }

    // Logout
    public function logout()
    {
        Auth::logout();
        return redirect()->route('login')->with('success', 'Logout berhasil!');
    }
}
