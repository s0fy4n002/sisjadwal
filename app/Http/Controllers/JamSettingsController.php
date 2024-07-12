<?php

namespace App\Http\Controllers;

use App\Http\Requests\KelasRequest;
use App\Models\Hari;
use App\Models\Jamslot;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class JamSettingsController extends Controller
{
    public function index(Request $request){
        $key_hari = "";
        
        if($request->key_hari){
            $key_hari = $request->key_hari;
        }

        $jam_slots = Jamslot::orderBy("jam_ke", "asc")->orderBy("hari_id", "asc")->get();
        if($key_hari){
            $jam_slots = Jamslot::where(["hari_id" => $key_hari])->orderBy("jam_ke", "asc")->get();
        }
        $days = Hari::all();
        $title = "Halaman Pengaturan Jam";
        return view('jam_slot.index', compact('jam_slots','title','days','key_hari'));
    }

    public function create()
    {
        $days = Hari::all();
        $jams_ke = Jamslot::all('jam_ke')->pluck('jam_ke')->toArray(); 
        $jam = [1,2,3,4,5,6,7,8,9,10,11,12,13,14,15];
        $jam_belum_dipakai = array_diff($jam, $jams_ke);
       
        return view('jam_slot.create', compact('days','jam_belum_dipakai'));
    }

    public function store(Request $request)
    {       
        $validated = $request->validate([
            'hari_id' => 'required',
            'jam_ke' => 'required',
            'jam_mulai' => 'required',
            'jam_selesai' => 'required',
        ]);
      
        $jam_ke = $validated['jam_ke'];
        $hari_id = $validated['hari_id'];
        $available = Jamslot::with(["hari"])->where( ['hari_id' => $hari_id, 'jam_ke' => $jam_ke ])->first();
        if($available){
            return redirect()->back()->with('error', "Jam ke {$jam_ke} sudah ada untuk haru {$available->hari->name}")->withInput();

        }
        $jam_slot = new Jamslot($validated);
     
        $jam_slot->save();
        return redirect()->route('jam-slot.index')->with('success', 'Berhasil Menambahkan Jam Baru')->withInput();
    }

    public function show(Jamslot $jam_slot)
    {
        return view('jam_slot.show', compact('jam_slot'));
    }

    public function edit(Jamslot $jam_slot)
    {
        $days = Hari::all();
        $jams_ke = Jamslot::all('jam_ke')->pluck('jam_ke')->toArray(); 
        $jam_belum_dipakai = [1,2,3,4,5,6,7,8,9,10,11,12,13,14,15];
        

        return view('jam_slot.edit', compact('jam_slot','jam_belum_dipakai','days'));
    }

    public function update(Request $request, Jamslot $jam_slot)
    {
       
        $validated = $request->validate([
            'hari_id' => 'required',
            'jam_ke' => 'required',
            'jam_mulai' => 'required',
            'jam_selesai' => 'required',
        ]);
        $hari_id = $validated['hari_id'];
        $jam_ke = $validated['jam_ke'];
        $id = $jam_slot->id;

        $available = Jamslot::where('hari_id', $hari_id)
                ->where('jam_ke', $jam_ke)
                ->where('id', '!=', $jam_slot->id)
                ->first();

        if($available){
            return redirect()->back()->with('error', "Jam ke {$jam_ke} sudah ada untuk haru {$available->hari->name}")->withInput();

        }

        if(!$jam_slot->update($validated)){
            return redirect()->back()->with('error', 'jam_slot gagal diperbarui.')->withInput();
        }
        
        return redirect()->route('jam-slot.index')->with('success', 'jam berhasil diperbarui.');
    }

    public function destroy(Jamslot $jam_slot)
    {
        $jam_slot->delete();
        return redirect()->route('jam-slot.index')
                         ->with('success', 'jam berhasil dihapus.');
    }
}
