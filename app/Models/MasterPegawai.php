<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MasterPegawai extends Model
{
    protected $guarded = ['id'];
    protected $with = ['mastergaji'];

    public function mastergaji()
    {
        return $this->belongsTo(MasterGaji::class, 'gaji_id');
    }

    public function absensi()
    {
        return $this->hasMany(Absensi::class);
    }
}
