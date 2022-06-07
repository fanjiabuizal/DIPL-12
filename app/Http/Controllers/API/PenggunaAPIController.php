<?php

namespace App\Http\Controllers\API;

use App\Models\pengguna;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class PenggunaAPIController extends Controller
{
    public function register(Request $request)
    {
        //$response = array('response' => '', 'success' => false);
        $validator = Validator::make($request->all(), [
            'username' => 'required|unique:pengguna|min:5|max:255',
            'nama' => 'required|unique:pengguna|max:255',
            'telepon' => 'required|unique:pengguna|numeric',
            'password' => 'required|min:5|max:255'
        ]);
        if ($validator->fails()) {
            //$response['response'] = $validator->messages();
            return ["Hasil"=>"Gagal Registrasi"];
        } else {
            $pengguna = new pengguna();
            $pengguna->username = $request->username;
            $pengguna->nama = $request->nama;
            $pengguna->telepon = $request->telepon;
            $pengguna->password = Hash::make($request->password);
            $pengguna->save();
            return ["Hasil"=>"Telah Registrasi"];
        }
    }
}
