<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    use HasFactory;

    public $table = 'stocks';

    public $guarded = ['id'];

    public function menu(){
        return $this->belongsTo(Menu::class);
    }
}
