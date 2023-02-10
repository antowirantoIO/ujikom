<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipeBayar extends Model
{
    use HasFactory;

    protected $table = 'tipe_bayar';

    public function transaksi(){
        return $this->hasMany(Transaksi::class);
    }
}
