<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jenis extends Model
{
    use HasFactory;

    public $table = 'jenis';

    public $guarded = ['id'];

    public function kategory(){
        return $this->belongsTo(Category::class, 'kategory_id');
    }

    public function menu(){
        return $this->hasMany(Menu::class);
    }
}
