<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Absensi extends Model
{
    use HasFactory;

    public $table = 'absensis';

    public $guarded = ['id'];

    public function karyawan(){
        return $this->belongsTo(Karyawan::class, 'karyawan_id');
    }
}
