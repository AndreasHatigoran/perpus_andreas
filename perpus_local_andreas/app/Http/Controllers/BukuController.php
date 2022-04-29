<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BukuController extends Controller
{
    public function index(){

        $buku = DB::table('buku')->orderByDesc('created_at')->get();
        $data = [
            'buku' => $buku,
        ];
        return view('buku', $data);
    }

    public function postAdd(Request $request){

        $this->validate($request, [
            'nama' => ['required', 'string'],
            'penulis' => ['required', 'string'],
        ]);

        DB::table('buku')->insert([
            'nama' => $request->nama,
            'penulis' => $request->penulis,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return back();
    }


    public function getEdit($buku_id){

        $buku = DB::table('buku')->where('id', $buku_id)->first();
        if(!$buku){
            return redirect()->route('buku');
        }

        $data = [
            'buku' => $buku,
        ];
        return view('buku.edit', $data);
    }


    public function postEdit(Request $request){

        $this->validate($request, [
            'buku_id' => ['required', 'exists:buku,id'],
            'nama' => ['required', 'string'],
            'penulis' => ['required', 'string'],
        ]);

        DB::table('buku')->where('id', $request->buku_id)->update([
            'nama' => $request->nama,
            'penulis' => $request->penulis,
            'updated_at' => now(),
        ]);

        return redirect()->route('buku');
    }

    public function getDelete($buku_id){

        DB::table('buku')->where('id', $buku_id)->delete();
        return redirect()->route('buku');

    }


}
