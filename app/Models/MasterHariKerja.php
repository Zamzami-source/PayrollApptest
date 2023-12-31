<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MasterHariKerja extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function absensi()
    {
        return $this->hasMany(Absensi::class);
    }
}
