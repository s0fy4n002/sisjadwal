<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penjadwalan extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $table = "penjadwalan";

    public function pelajaran()
    {
        return $this->belongsTo(Pelajaran::class, 'pelajaran_id','id_pelajaran');
    }
    public function jam_slot()
    {
        return $this->belongsTo(Jamslot::class, 'jam_slot_id','id');
    }
    public function guru()
    {
        return $this->belongsTo(User::class, 'guru_id','id');
    }
    public function tingkatan()
    {
        return $this->belongsTo(Level::class, 'tingkatan_id','id');
    }
    public function kelas()
    {
        return $this->belongsTo(Kelas::class, 'kelas_id','id');
    }
}
