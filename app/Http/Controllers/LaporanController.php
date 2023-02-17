<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class LaporanController extends Controller
{
    public function lap_transaksi(){
        return view('laporan.transaksi');
    }

    public function lap_transaksi_ajax(Request $request){
        $tanggal_awal = $request->tanggal_awal;
        $tanggal_akhir = $request->tanggal_akhir;

        $transaksi = Transaksi::whereBetween('tanggal_masuk', [$tanggal_awal, $tanggal_akhir])->get();
        
        $data = [];
        foreach($transaksi as $index => $item) {
            $list = [];
            $list[] = $index + 1;
            $list[] = $item->konsumen->name;
            $list[] = $item->paket->nama;
            $list[] = $item->tipe_bayar->nama;
            $list[] = $item->status_bayar == 1 ? 'Lunas' : 'Belum Lunas';
            $list[] = $item->berat;
            $list[] = $item->tanggal_masuk;
            $list[] = $item->total_bayar;
            $list[] = '<a class="text-danger" href="/transaksi/' . $item->id . '/destroy" target="_blank">Delete</a>';
            $data[] = $list;
        }

        return response()->json([
            "data" => $data,
        ], 200);

        // return response()->json([
        //     "status" => 'success',
        //     "data" => $transaksi,
        // ], 200);
    }
}
