<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hari extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $table = 'hari';
    
    public function jam_slot()
    {
        return $this->hasMany(Jamslot::class, 'hari_id','id');
    }
}
