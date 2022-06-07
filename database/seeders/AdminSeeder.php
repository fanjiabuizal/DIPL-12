<?php

namespace Database\Seeders;

use App\Models\admin;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // admin
        $admin = new admin();
        $admin->email = 'kevin@mail.com';
        $admin->username = 'kevin';
        $admin->password = Hash::make('12345');
        $admin->save();

        $admin = new admin();
        $admin->email = 'kris@mail.com';
        $admin->username = 'kris';
        $admin->password = Hash::make('67891');
        $admin->save();

        $admin = new admin();
        $admin->email = 'imam@mail.com';
        $admin->username = 'imam';
        $admin->password = Hash::make('45678');
        $admin->save();
    }
}
