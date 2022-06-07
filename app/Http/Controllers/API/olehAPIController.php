<?php

namespace App\Http\Controllers\API;

use App\Models\oleh;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class olehAPIController extends Controller
{
    public function get($id=null){
        return $id ? oleh::find($id) : oleh::all();
    }
}
