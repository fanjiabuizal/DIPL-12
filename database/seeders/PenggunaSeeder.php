<?php

namespace Database\Seeders;

use App\Models\pengguna;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PenggunaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $pengguna = new pengguna();
        $pengguna->username = 'macwill';
        $pengguna->nama = 'Cormac William';
        $pengguna->telepon = '081288818282';
        $pengguna->password = Hash::make('macwi');
        $pengguna->save();

        $pengguna = new pengguna();
        $pengguna->username = 'cliffhanger1988';
        $pengguna->nama = 'Cliff Hanger';
        $pengguna->telepon = '081288818283';
        $pengguna->password = Hash::make('clifs');
        $pengguna->save();

        $pengguna = new pengguna();
        $pengguna->username = 'babaksabri';
        $pengguna->nama = 'Babak Sabri';
        $pengguna->telepon = '081288818284';
        $pengguna->password = Hash::make('babaksa');
        $pengguna->save();
        
        $pengguna = new pengguna();
        $pengguna->username = 'josbarr';
        $pengguna->nama = 'Joseff Barry';
        $pengguna->telepon = '081288818285';
        $pengguna->password = Hash::make('ffbarr');
        $pengguna->save();

        $pengguna = new pengguna();
        $pengguna->username = 'hencle';
        $pengguna->nama = 'Kohen Clements';
        $pengguna->telepon = '081288818286';
        $pengguna->password = Hash::make('clement');
        $pengguna->save();

        $pengguna = new pengguna();
        $pengguna->username = 'diabbs';
        $pengguna->nama = 'Sadia Gibbs';
        $pengguna->telepon = '081288818287';
        $pengguna->password = Hash::make('sadbbs');
        $pengguna->save();
    }
}
