<?php

namespace App\Http\Controllers;

use App\Http\Requests\KelasRequest;
use App\Http\Requests\PelajaranRequest;
use App\Models\Pelajaran;
use Exception;
use Illuminate\Http\Request;

class PelajaranController extends Controller
{
    public function index(){
        $pelajarans = Pelajaran::all();
        // dd($pelajarans);
        $title = "Halaman Pelajaran";
        return view('pelajaran.index', compact('pelajarans','title'));
    }

    public function create()
    {
        $lastPelajaran = Pelajaran::orderBy('id_pelajaran', 'desc')->first();

        // Tentukan ID pelajaran baru
        if ($lastPelajaran) {
            // Jika ada pelajaran, increment ID terakhir
            $lastId = intval(substr($lastPelajaran->id_pelajaran, 3));
            $newId = 'PEL' . str_pad($lastId + 1, 2, '0', STR_PAD_LEFT);
        } else {
            // Jika tidak ada pelajaran, buat ID pertama
            $newId = 'PEL01';
        }
        return view('pelajaran.create', compact('newId'));
    }

    public function store(PelajaranRequest $request)
    {       
        $pelajaran = new Pelajaran();
        $pelajaran->id_pelajaran = $request->id_pelajaran;
        $pelajaran->name = $request->name;
        $pelajaran->tahun_ajaran = $request->tahun_ajaran;
        try {
            $pelajaran->save();  
            return redirect()->route('pelajaran.index')
            ->with('success', 'Berhasil Menambahkan Pelajaran Baru');
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }

    public function show(Pelajaran $pelajaran)
    {
        return view('pelajaran.show', compact('pelajaran'));
    }

    public function edit($id)
    {
        
        $pelajaran = Pelajaran::where('id_pelajaran', $id)->first();
        return view('pelajaran.edit', compact('pelajaran'));
    }

    public function update(Request $request, Pelajaran $pelajaran)
    {
        $request->validate([
            'id_pelajaran' => 'required',
            'name' => 'required|string|max:255',
            'tahun_ajaran' => 'required',
        ]);
        
        $pelajaran->id_pelajaran = $request->id_pelajaran;
        $pelajaran->name = $request->name;
        $pelajaran->tahun_ajaran = $request->tahun_ajaran;
        $pelajaran->save();

        return redirect()->route('pelajaran.index')
                         ->with('success', 'Pelajaran berhasil diperbarui.');
    }

    public function destroy(Pelajaran $pelajaran)
    {
        $pelajaran->delete();
        return redirect()->route('pelajaran.index')
                         ->with('success', 'pelajaran berhasil dihapus.');
    }
}
