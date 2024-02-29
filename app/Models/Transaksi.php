<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Transaksi extends Model
{
    use HasFactory;

    protected $table = 'transaksis';
    protected $guarded = ['created_at', 'updated_at'];

    public function detailTransaksi()
    {
        return $this->HasMany(DetailTransaksi::class);
    }
}
