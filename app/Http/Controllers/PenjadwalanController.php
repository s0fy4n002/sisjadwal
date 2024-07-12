<?php

namespace App\Http\Controllers;

use App\Http\Requests\PenjadwalanRequest;
use App\Models\Guru;
use App\Models\Hari;
use App\Models\Jamslot;
use App\Models\Kelas;
use App\Models\Level;
use App\Models\Pelajaran;
use App\Models\Penjadwalan;
use App\Models\User;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PenjadwalanController extends Controller
{
    public function index(Request $request){
        $penjadwalans = Penjadwalan::all();
        
        $key_search="";
        if($request->key_search){
            $key_search = $request->key_search;
            $penjadwalans = Penjadwalan::join('users', 'penjadwalan.guru_id', '=', 'users.id')
            ->join('kelas', 'penjadwalan.kelas_id', '=', 'kelas.id')
            ->join('pelajaran', 'penjadwalan.pelajaran_id', '=', 'pelajaran.id_pelajaran')
            ->join('jam_slot', 'penjadwalan.jam_slot_id', '=', 'jam_slot.id')
            ->join('hari', 'jam_slot.hari_id', '=', 'hari.id')
            ->join('tingkatan', 'kelas.tingkatan_id', '=', 'tingkatan.id')
            ->where('users.name', 'like', "%$key_search%")
            ->orWhere('kelas.name', 'like', "%$key_search%")
            ->orWhere('tingkatan.name', 'like', "%$key_search%")
            ->orWhere('pelajaran.name', 'like', "%$key_search%")
            ->orWhere('hari.name', 'like', "%$key_search%")
            ->select('penjadwalan.*') // Memilih kolom dari tabel penjadwalan
            ->get();
        }
      
       
        $title = "Halaman Penjadwalan";
        return view('penjadwalan.index', compact('penjadwalans','title','key_search'));
    }

    public function create()
    {
        $pelajarans = Pelajaran::all();
        $kelass = Kelas::all();
        $tingkatans = Level::all();
        $jam_slots = Jamslot::all();
        $haris = Hari::all();
        $gurus = User::where('role_id', 2)->get();
        return view('penjadwalan.create', compact('pelajarans','tingkatans','kelass','gurus','jam_slots','haris'));
    }

    public function store(PenjadwalanRequest $request)
    {       

        $exist = Penjadwalan::where(['jam_slot_id' => $request->jam_slot_id, 'kelas_id'=> $request->kelas_id])->first();
        if($exist){
            return redirect()->back()->with('error', 'Data Sudah Ada')->withInput();
        }
        $penjadwalan = new Penjadwalan();
        $penjadwalan->guru_id       = $request->guru_id;
        $penjadwalan->kelas_id      = $request->kelas_id;
        $penjadwalan->pelajaran_id      = $request->pelajaran_id;
        $penjadwalan->jam_slot_id          = $request->jam_slot_id;

        try {
            $penjadwalan->save();  
            return redirect()->route('penjadwalan.index')
            ->with('success', 'Berhasil Menambahkan Penjadwalan Baru');
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }

    public function show(Penjadwalan $penjadwalan)
    {
        return view('pelajaran.show', compact('penjadwalan'));
    }

    public function edit(Penjadwalan $penjadwalan)
    {
        return view('pelajaran.edit', compact('penjadwalan'));
    }

    public function update(Request $request, Penjadwalan $penjadwalan)
    {
        $request->validate([
            'id_pelajaran' => 'required',
            'name' => 'required|string|max:255',
            'tahun_ajaran' => 'required',
        ]);
        
        $penjadwalan->id_penjadwalan = $request->id_penjadwalan;
        $penjadwalan->name = $request->name;
        $penjadwalan->tahun_ajaran = $request->tahun_ajaran;
        $penjadwalan->save();

        return redirect()->route('penjadwalan.index')
                         ->with('success', 'Penjadwalan berhasil diperbarui.');
    }

    public function destroy(Penjadwalan $penjadwalan)
    {
        $penjadwalan->delete();
        return redirect()->route('penjadwalan.index')
                         ->with('success', 'Penjadwalan berhasil dihapus.');
    }
}
