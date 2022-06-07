<?php

namespace Database\Seeders;

use App\Models\oleh;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class OlehSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $oleh = new oleh();
        $oleh->nama = 'Bakpia';
        $oleh->gambar = 'gambarOleh/hz3HEw6GbQxA0iv4I2tjJjQ5Vd84BuzCL8u63XBV.png';
        $oleh->deskripsi = 'Bakpia adalah makanan yang terbuat dari campuran kacang hijau dengan gula yang dibungkus dengan tepung lalu dipanggang.';
        $oleh->harga = 35000;
        $oleh->terjual = 0;
        $oleh->save();

        $oleh = new oleh();
        $oleh->nama = 'Pie Susu';
        $oleh->gambar = 'gambarOleh/qoJSuOVjWxeA5P5rXmPIqQ0ktu6jayLBk85lOlOi.png';
        $oleh->deskripsi = 'Pie susu adalah sebuah pastri hidangan penutup tradisional Indonesia yang terbuat dari kue pastri yang diisi dengan kustar telur serta susu kental manis. Pastri tersebut sangat datar dengan isian hanya terdiri dari satu lapisan kustar yang sangat tipis.';
        $oleh->harga = 15000;
        $oleh->terjual = 0;
        $oleh->save();

        $oleh = new oleh();
        $oleh->nama = 'Dodol Garut';
        $oleh->gambar = 'gambarOleh/tw2Qix9qniFOMDe7O4V43NPN38j6XLwqr7ML7h2u.png';
        $oleh->deskripsi = 'Dodol Garut merupakan makanan tradisional berbahan dasar tepung beras ketan atau buah-buahan, gula, dan santan kelapa sebagai bahan baku utamanya yang dimasak hingga kental-lengket.';
        $oleh->harga = 5000;
        $oleh->terjual = 0;
        $oleh->save();
    }
}
