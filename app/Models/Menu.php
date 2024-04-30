<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;

    public $table = 'menus';

    public $guarded = ['id'];
    public $fillable = ['nama', 'harga', 'image', 'deskripsi', 'jenis_id', 'created_at', 'updated_at'];
    
    public function jenis(){
        return $this->belongsTo(Jenis::class, 'jenis_id');
    }
}
