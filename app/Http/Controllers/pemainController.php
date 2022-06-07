<?php

namespace App\Http\Controllers;

use App\Models\pemain;
use Illuminate\Http\Request;

class pemainController extends Controller
{
    public function index(){
        $data_pemain=pemain::all();
        return view('tablePemain',compact('data_pemain'));
    }
}
