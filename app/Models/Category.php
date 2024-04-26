<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    use HasFactory;

    public $table = 'categories';

    public $guarded = ['id'];

    public $fillable = ['nama'];

    public function jenis(){
        return $this->hasMany(Jenis::class);
    }
}
