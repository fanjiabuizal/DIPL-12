<?php

namespace Database\Seeders;

use App\Models\oleh;
use App\Models\admin;
use App\Models\pesanan;
use App\Models\pengguna;
use App\Models\transaksi;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        $this->call([
            AdminSeeder::class,
            PenggunaSeeder::class,
            OlehSeeder::class,
            TransaksiSeeder::class,
            PesananSeeder::class
        ]);
    }
}
