<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PinjamBukuController extends Controller
{

    public function index(){

        $pinjam_buku = DB::table('pinjam_buku')->orderByDesc('created_at')->get();
        foreach ($pinjam_buku as $key => $p) {
            $pinjam_buku[$key]->buku = DB::table('buku')->where('id', $p->buku_id)->first();
        }

        $buku = DB::table('buku')->whereNotIn('id', function($q){
            $q->select('buku_id')->from(DB::table('pinjam_buku'))->whereDate('tanggal_dikembalikan', '>=', date("Y-m-d"));
        })->get();


        $data = [
            'pinjam_buku' => $pinjam_buku,
            'buku' => $buku,
        ];
        return view('pinjam', $data);

    }

    public function postAdd(Request $request){

        $this->validate($request, [
            'buku_id' => ['required', 'exists:buku,id'],
            'nama' => ['required', 'string'],
            'hp' => ['required', 'string'],
            'email' => ['required', 'email'],
            'tanggal_dikembalikan' => ['required', 'date'],
        ]);

        DB::table('pinjam_buku')->insert([
            'buku_id' => $request->buku_id,
            'nama' => $request->nama,
            'hp' => $request->hp,
            'email' => $request->email,
            'tanggal_dikembalikan' => $request->tanggal_dikembalikan,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return back();
    }

    public function getEdit($pinjam_id){

        $pinjam = DB::table('pinjam_buku')->where('id', $pinjam_id)->first();
        if(!$pinjam){
            return redirect()->route('pinjam.buku');
        }

        $buku = DB::table('buku')->where('id', $pinjam->buku_id)->first();

        $data = [
            'pinjam' => $pinjam,
            'buku' => $buku,
        ];
        return view('pinjam.edit', $data);
    }


    public function postEdit(Request $request){

        $this->validate($request, [
            'pinjam_id' => ['required', 'exists:pinjam_buku,id'],
            'nama' => ['required', 'string'],
            'hp' => ['required', 'string'],
            'email' => ['required', 'email'],
            'tanggal_dikembalikan' => ['required', 'date'],
        ]);

        $pinjam = DB::table('pinjam_buku')->where('id', $request->pinjam_id)->whereDate('tanggal_dikembalikan', '>=', $request->tanggal_dikembalikan)->first();
        if(!$pinjam){
            return back();
        }

        DB::table('pinjam_buku')->where('id', $request->pinjam_id)->update([
            'nama' => $request->nama,
            'hp' => $request->hp,
            'email' => $request->email,
            'tanggal_dikembalikan' => $request->tanggal_dikembalikan,
            'updated_at' => now(),
        ]);

        return redirect()->route('pinjam.buku');
    }

    public function getDelete($pinjam_id){

        DB::table('pinjam_buku')->where('id', $pinjam_id)->delete();
        return redirect()->route('pinjam.buku');

    }

}
