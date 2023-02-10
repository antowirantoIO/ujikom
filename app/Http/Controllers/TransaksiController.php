<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Paket;
use App\Models\Status;
use App\Models\TipeBayar;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransaksiController extends Controller
{
    public function create(){
        $konsumen = User::role('konsumen')->get();
        $paket = Paket::all();
        $jenis_pembayaran = TipeBayar::all();

        return view('transaksi.create', compact('konsumen', 'paket', 'jenis_pembayaran'));
    }

    public function store(Request $request){
        Transaksi::create([
            'id_konsumen' => $request->konsumen_id,
            'id_karyawan' => Auth::user()->id,
            'paket_id' => $request->paket_id,
            'tipe_bayar_id' => $request->pembayaran_id,
            'status_id' => Status::first()->id,
            'berat' => $request->paket_berat,
            'tanggal_masuk' => date('Y-m-d', strtotime($request->tgl_masuk)),
            'tanggal_keluar' => date('Y-m-d', strtotime($request->tgl_keluar)),
            'status_bayar' => $request->status_bayar,
            'diskon' => $request->diskon ?? 0,
            'total_bayar' => $request->total_bayar,
            'keterangan' => json_encode(
                [
                    'kembalian' => $request->kembalian,
                    'hutang' => $request->hutang,
                ]
            )
        ]);
    }

    
}