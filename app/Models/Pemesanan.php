<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pemesanan extends Model
{
    use HasFactory;

    public $table = 'pemesanans';

    public $guarded = ['id'];

    public function meja(){
        return  $this->belongsTo(Meja::class);
    }
}
