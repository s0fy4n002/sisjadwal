<?php

namespace App\Http\Controllers;

use App\Http\Requests\GuruRequest;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class GuruController extends Controller
{
    public function index(){
        $gurus = User::all();
        $title = "Halaman Guru";
        return view('guru.index', compact('gurus','title'));
    }

    public function create()
    {
        return view('guru.create');
    }

    public function store(GuruRequest $request)
    {
        $hashedPassword = Hash::make("123");
       
        $guru = new User();
        $guru->id = $request->id;
        $guru->name = $request->name;
        $guru->username = $request->name;
        $guru->jenis_kelamin = $request->jenis_kelamin;
        $guru->password = $hashedPassword;
        $guru->role_id = 2;
        // dd($guru);
        try {
            $guru->save();  
            return redirect()->route('guru.index')
            ->with('success', 'Berhasil Menambahkan Guru Baru');
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }

    public function show(User $guru)
    {
        return view('guru.show', compact('guru'));
    }

    public function edit(User $guru)
    {
        return view('guru.edit', compact('guru'));
    }

    public function update(Request $request, User $guru)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'jenis_kelamin' => 'required|string|in:1,2',
        ]);
        $guru->username = $request->name;
        $guru->update($request->all());
        return redirect()->route('guru.index')
                         ->with('success', 'Guru berhasil diperbarui.');
    }

    public function destroy(User $guru)
    {
        $guru->delete();
        return redirect()->route('guru.index')
                         ->with('success', 'Guru berhasil dihapus.');
    }
}
