<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function loginindex()
    {
        return view('login');
    }

    public function ProsesLogin(Request $request)
    {
        $nama = $request->input('nama');
        $password = $request->input('password');

        if (Auth::guard('web')->attempt(['nama' => $nama, 'password' => $password])) {
            return response()->json([
                'success' => true,
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Login Gagal!',
            ], 401);
        }
    }

    public function logout(Request $request)
    {
        Auth::logout(); // Melakukan logout
        $request->session()->invalidate(); // Melakukan invalidasi sesi
        $request->session()->regenerateToken(); // Menghasilkan token sesi baru
        return redirect('/login'); // Redirect ke halaman login
    }
}
