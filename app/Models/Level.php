<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Level extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $table = "tingkatan";

    public function kelas()
    {
        return $this->hasMany(Kelas::class, 'tingkatan_id','id');
    }
}
