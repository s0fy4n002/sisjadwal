<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pelajaran extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $table = "pelajaran";
    protected $primaryKey = 'id_pelajaran';
    public $incrementing = false;
    protected $keyType = 'string';
}
