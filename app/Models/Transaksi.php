<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;

    protected $table = 'transaksi';
    protected $guarded = ['id'];

    public function konsumen(){
        return $this->belongsTo(User::class, 'id_konsumen');
    }

    public function karyawan(){
        return $this->belongsTo(User::class, 'id_karyawan');
    }

    public function paket(){
        return $this->belongsTo(Paket::class);
    }

    public function tipe_bayar(){
        return $this->belongsTo(TipeBayar::class);
    }

    public function status(){
        return $this->belongsTo(Status::class);
    }
}
