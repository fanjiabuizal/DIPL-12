<?php

namespace App\Http\Controllers\transaksi;

use App\Models\transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class belumAmbilController extends Controller
{
    public function index(){
        return view('transaksi.table-belumDiambil',[
            'title' =>'Transaksi - Belum Ambil',
            'transaksis' => transaksi::where('status','belum diambil')->get()
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
        $transaksi = transaksi::find($id);
        $transaksi->status = 'sudah diambil';
        $transaksi->save();
        return redirect('transaksi/belum_ambil')->with('Success', 'Data transaksi berhasil dikonfirmasi');
    }
}
