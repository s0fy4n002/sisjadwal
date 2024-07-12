<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $table = 'kelas';
    
    public function level()
    {
        return $this->belongsTo(Level::class, 'tingkatan_id','id');
    }
}
