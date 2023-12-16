<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Absensi extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $with = ['pegawai', 'harikerja'];


    public function pegawai()
    {
        return $this->belongsTo(MasterPegawai::class, 'pegawai_id');
    }

    public function harikerja()
    {
        return $this->belongsTo(MasterHariKerja::class, 'hari_id');
    }
}
