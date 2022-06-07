<?php

namespace App\Http\Controllers\transaksi;

use Carbon\Carbon;
use App\Models\oleh;
use App\Models\transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\pesanan;

class belumBayarController extends Controller
{
    public function index(){
        return view('transaksi.table-belumDiBayar',[
            'title' =>'Transaksi - Belum Bayar',
            'transaksis' => transaksi::where('status','belum dibayar')->get()
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

    public function confirm($id){
        $pesanans = DB::table('pesanan')
            ->where('id_transaksi','=',$id)
            ->get();
        //menambahkan pesanan oleh oleh yang telah terjual
        foreach($pesanans as $pesanan ){
            $oleh = oleh::find($pesanan->id_oleh);
            $oleh->terjual += $pesanan->jumlah_item;
            $oleh->save();
        }
        $transaksi = transaksi::find($id);
        $transaksi->status = 'belum diambil';
        $dt = Carbon::now();
        $transaksi->tanggal_dibayar = $dt->toDateString();
        $transaksi->save();

        return redirect('transaksi/belum_ambil')->with('Success', 'Data transaksi berhasil dikonfirmasi');
    }

    public function batal($id){
        $transaksi = transaksi::find($id);
        $transaksi->status = 'batal';
        $transaksi->save();
        return redirect('transaksi/belum_ambil')->with('Success', 'Data transaksi berhasil dibatalkan');
    }
}
