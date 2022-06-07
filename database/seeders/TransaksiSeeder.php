<?php

namespace Database\Seeders;

use App\Models\transaksi;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TransaksiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // transaksi
        $transaksi = new transaksi();
        $transaksi->username_pengguna = 'babaksabri';
        $transaksi->tanggal_dipesan = '2022-04-15';
        $transaksi->status='batal';
        $transaksi->save();

        $transaksi = new transaksi();
        $transaksi->username_pengguna = 'macwill';
        $transaksi->tanggal_dipesan = '2022-04-16';
        $transaksi->status='belum dibayar';
        $transaksi->save();

        $transaksi = new transaksi();
        $transaksi->username_pengguna = 'diabbs';
        $transaksi->tanggal_dipesan = '2022-04-23';
        $transaksi->tanggal_dibayar = '2022-04-23';
        $transaksi->status='belum diambil';
        $transaksi->save();

        $transaksi = new transaksi();
        $transaksi->username_pengguna = 'hencle';
        $transaksi->tanggal_dipesan = '2022-05-10';
        $transaksi->tanggal_dibayar = '2022-05-10';
        $transaksi->status='sudah diambil';
        $transaksi->save();

        $transaksi = new transaksi();
        $transaksi->username_pengguna = 'josbarr';
        $transaksi->tanggal_dipesan = '2022-05-17';
        $transaksi->status='belum dibayar';
        $transaksi->save();
    }
}
