<?php

namespace Database\Seeders;

use App\Models\oleh;
use App\Models\pesanan;
use App\Models\transaksi;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PesananSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // pesanan id_transaksi 1
        $pesanan= new pesanan();
        $pesanan->jumlah_item = 3;
        $pesanan->id_oleh = 1;
        $pesanan->id_transaksi = 1;
        $pesanan->save();

        $pesanan= new pesanan();
        $pesanan->jumlah_item = 5;
        $pesanan->id_oleh = 2;
        $pesanan->id_transaksi = 1;
        $pesanan->save();

        $pesanan= new pesanan();
        $pesanan->jumlah_item = 3;
        $pesanan->id_oleh = 3;
        $pesanan->id_transaksi = 1;
        $pesanan->save();

        //pesanan id_transaksi 2
        $pesanan= new pesanan();
        $pesanan->jumlah_item = 5;
        $pesanan->id_oleh = 2;
        $pesanan->id_transaksi = 2;
        $pesanan->save();

        $pesanan= new pesanan();
        $pesanan->jumlah_item = 3;
        $pesanan->id_oleh = 1;
        $pesanan->id_transaksi = 2;
        $pesanan->save();

        $pesanan= new pesanan();
        $pesanan->jumlah_item = 3;
        $pesanan->id_oleh = 3;
        $pesanan->id_transaksi = 2;
        $pesanan->save();

        //pesanan id_transaksi 3
        $pesanan= new pesanan();
        $pesanan->jumlah_item = 7;
        $pesanan->id_oleh = 2;
        $pesanan->id_transaksi = 3;
        $pesanan->save();
        
        //pesanan id_transaksi 4
        $pesanan= new pesanan();
        $pesanan->jumlah_item = 10;
        $pesanan->id_oleh = 1;
        $pesanan->id_transaksi = 4;
        $pesanan->save();

        //pesanan id_transaksi 5
        $pesanan= new pesanan();
        $pesanan->jumlah_item = 8;
        $pesanan->id_oleh = 3;
        $pesanan->id_transaksi = 5;
        $pesanan->save();

        //update total harga transaksi
        $transaksis= transaksi::all();
        foreach($transaksis as $transaksi){
            $transaksi->total_harga= DB::table('transaksi')
            ->join('pesanan', 'transaksi.id', '=', 'pesanan.id_transaksi')
            ->join('oleh', 'pesanan.id_oleh','=','oleh.id')
            ->where('transaksi.id','=',$transaksi->id)
            ->sum(DB::raw('pesanan.jumlah_item*oleh.harga'));
            $transaksi->save();
        }

        //tambah jumlah hasil penjualan oleh
        $transaksis = DB::table('transaksi')
            ->where('status','=','belum diambil')
            ->orWhere('status','=','sudah diambil')
            ->get();
        foreach ($transaksis as $transaksi){
            $pesanans = DB::table('pesanan')
                ->where('id_transaksi','=',$transaksi->id)
                ->get();
            foreach($pesanans as $pesanan){
                $oleh = oleh::find($pesanan->id_oleh);
                $oleh->terjual += $pesanan->jumlah_item;
                $oleh->save();
            }
        }
    }
}
