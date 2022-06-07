<?php

namespace App\Http\Controllers;

use App\Models\oleh;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class olehController extends Controller
{
    public function index(){
        return view('tableOleh',[
            'title'=> 'Daftar Oleh',
            'olehs' => oleh::all()
        ]);
    }
    
    public function store(Request $request){

        $request->validate([
            'nama'=>'required|unique:oleh|max:255',
            'harga'=>'required|numeric|min:5000|max:1000000',
            'gambar'=>'required|image|file|max:512',
            'deskripsi'=>'required|max:255'
        ]);

        $oleh = new oleh();
        $oleh->nama = $request->nama;
        $oleh->harga = $request->harga;
        $oleh->gambar = $request->file('gambar')->store('gambarOleh');
        $oleh->deskripsi = $request->deskripsi;
        $oleh->terjual = 0;
        $oleh->save();

        return redirect('/oleh')->with('Success', 'Data oleh-oleh berhasil ditambahkan');
    }
    
    public function edit(Request $request, $id){
        $request->validate([
            'gambar'=>'image|file|max:512',
            'harga'=>'integer|min:5000|max:1000000',
            'deskripsi'=>'max:255'
        ]);

        $oleh = oleh::find($id);
        if ($request->harga=='' ||$request->deskripsi == ''){
            return redirect('/oleh')->with('Error', 'Data '.$oleh->nama.' tidak boleh ada kolom yang kosong');
        } else {
            $oleh->deskripsi = $request->deskripsi;
            $oleh->harga = $request->harga;
            if ($request->hasFile('gambar')){
                Storage::delete($oleh->gambar);
                $oleh->gambar = $request->file('gambar')->store('gambarOleh');
            }
            $oleh->save();
            return redirect('/oleh')->with('Success', 'Data '.$oleh->nama.' berhasil diubah');
        }
    }

    public function delete($id){
        $oleh = oleh::find($id);
        Storage::delete($oleh->gambar);
        $oleh->delete();
        return redirect('/oleh')->with('Success', 'Data oleh-oleh telah berhasil dihapus');
    }
}
