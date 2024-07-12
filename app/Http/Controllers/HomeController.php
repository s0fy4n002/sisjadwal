<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
    public function index(){
        return view('home');
    }
    public function login(){
        return view('login');
    }

    public function login_process(LoginRequest $request)
    {

        if (Auth::attempt(['username' => $request->username, 'password' => $request->password])) {
            $request->session()->regenerate();
            if(Auth::user()->role === "admin"){
                return redirect()->route('home');
            }else{
                return redirect()->intended('/');
            }
        }
        return redirect()->back()->withInput()->withErrors([
            'password' => 'Username atau password salah',
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        // $request->session()->regenerateToken();
        return redirect('/login');
    }

    public function change_password(){
        return view('change_password');
    }
    public function proses_change_password(Request $request){
        $request->validate([
            'old_password' => 'required|string|max:255',
            'new_password' => 'required|string|max:255',
        ]);
        $user = Auth::user();
        // Cek apakah password lama cocok
        if (!Hash::check($request->old_password, $user->password)) {
            return back()->withErrors([
                'old_password' => 'Password saat ini tidak cocok.',
            ]);
        }

        // Update password
        $user->password = Hash::make($request->new_password);
        $user->save();
        // dd("Berhasil ganti password");

        return redirect()->back()->with('success','berhasil ganti password');
    }
}
