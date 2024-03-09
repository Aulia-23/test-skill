<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function register()
    {
        return view('auth/register');
    }

    public function registerSave(Request $request)
    {
        Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|confirmed'
        ])->validate();

        User::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => Hash::make($validatedData['password']),
            'role' => ['Admin', 'Sales']
        ]);

        return redirect()->route('login');
    }

    public function login()
    {
        return view('auth/login');
    }

    public function loginAction(Request $request)
    {
        // Validasi input dari form login
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        // Coba untuk mengautentikasi pengguna
        if (!Auth::attempt($request->only('email', 'password'), $request->filled('remember'))) {
            // Autentikasi gagal
            // Lakukan sesuatu di sini jika autentikasi gagal, misalnya kirimkan pesan kesalahan
            throw ValidationException::withMessages([
                'email' => trans('auth.failed'),
            ]);
        }

        // Regenerate session untuk mencegah serangan session fixation
        $request->session()->regenerate();

        // Redirect pengguna ke halaman dashboard setelah berhasil login
        return redirect()->route('dashboard');
    }



    public function logout(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        return redirect('/');
    }

    public function profile()
    {
        return view('profile');
    }
}
