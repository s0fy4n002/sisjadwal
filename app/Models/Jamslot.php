<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jamslot extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $table = 'jam_slot';
    
    public function hari()
    {
        return $this->belongsTo(Hari::class, 'hari_id','id');
    }
    public function penjadwalan()
    {
        return $this->hasMany(Penjadwalan::class, 'jam_slot_id','id');
    }
}
