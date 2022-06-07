<?php

namespace App\Http\Controllers\transaksi;

use App\Models\pesanan;
use App\Models\transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class batalController extends Controller
{
    public function index(){
        // foreach ($transaksis as $transaksi){
        //     $pesanans = pesanan::where('id_transaksi',$transaksi->id)->get();
        // }
        return view('transaksi.table-batal',[
            'title' =>'Transaksi - Batal',
            'transaksis' => transaksi::where('status','batal')->get()
        ]);
    }

    public function view($id){
        $pesanans=DB::table('pesanan')
            ->join('oleh', 'pesanan.id_oleh','=','oleh.id')
            ->where('id_transaksi','=',$id)
            ->get();
        //$pesanans = pesanan::where('id_transaksi',$id)->get();
        return view('tablePemesanan',[
            'title' => 'Pesanan',
            'transaksi'=>transaksi::find($id),
            'pesanans' => $pesanans,
            'countPesanans' => $pesanans->count()
        ]);
    }
}
