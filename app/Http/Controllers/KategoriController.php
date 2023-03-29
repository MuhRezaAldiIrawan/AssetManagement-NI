<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class KategoriController extends Controller
{
    public function kategori(Request $request)
    {
        $title = 'MUN | Kategori';
        $pagination = 10;
        $kategori = DB::table('kategori')->paginate($pagination);

        return view('pages.kategori.kategori', ['kategori' => $kategori], compact('title'))->with('i', ($request->input('page', 1) - 1) *  $pagination);
    }

    public function addkategori(Request $request)
    {
        DB::table('kategori')->insert([
            'nama' => $request->nama,


        ]);
        Alert::success('Success', 'Kategori Telah berhasil Ditambahkan');
        return redirect('/kategori');
    }

    public function editkategori($id)
    {

        $kategori = DB::table('kategori')->where('id', $id)->get();

        return view('pages.kategori.kategori', ['kategori' => $kategori]);
    }

    public function updatekategori(Request $request)
    {
        DB::table('kategori')->where('id', $request->id)->update([
            'nama' => $request->nama,
        ]);
        // dd($request);

        return redirect('/kategori');
    }

    public function deletekategori($id)
    {
        DB::table('kategori')->where('id', $id)->delete();
        // dd($id);
        Alert::success('Success', 'Data Lokasi Telah berhasil dihapus');
        return redirect('/kategori');
    }
}
