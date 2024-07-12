<?php

namespace App\Http\Controllers;

use App\Http\Requests\LevelRequest;
use App\Models\Level;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class LevelController extends Controller
{
    public function index(){
        $levels = Level::all();
        $title = "Halaman Level";
        return view('level.index', compact('levels','title'));
    }

    public function create()
    {
        return view('level.create');
    }

    public function store(LevelRequest $request)
    {
       
        $level = new Level();
        $level->id = $request->id;
        $level->name = $request->name;
        // dd($level);
        try {
            $level->save();  
            return redirect()->route('level.index')
            ->with('success', 'Berhasil Menambahkan Level Baru');
        } catch (Exception $e) {
            dd($e->getMessage());
            return view('level.create')->with('error', $e->getMessage());
        }
    }

    public function show(Level $level)
    {
        return view('level.show', compact('level'));
    }

    public function edit(Level $level)
    {
        return view('level.edit', compact('level'));
    }

    public function update(Request $request, Level $level)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $level->update($request->all());
        return redirect()->route('level.index')
                         ->with('success', 'Level berhasil diperbarui.');
    }

    public function destroy(Level $level)
    {
        $level->delete();
        return redirect()->route('level.index')
                         ->with('success', 'Level berhasil dihapus.');
    }
}
