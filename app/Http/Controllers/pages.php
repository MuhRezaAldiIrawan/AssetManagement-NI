<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

use App\Models\lokasi;

class pages extends Controller
{
    public function index()
    {
        return view('pages.dashboard');
    }

    //Activity Controllers
    public function toll()
    {
        return view('pages.activity.toll');
    }

    public function nontoll()
    {
        return view('pages.activity.nontoll');
    }

    public function pengembangan()
    {
        return view('pages.activity.pengembangan');
    }

    public function activitydetail()
    {
        return view('pages.activity.subpages.activitydetail');
    }

    //End Activity Controllers

    //Location Controllers
    public function location()
    {
        $location = DB::table('lokasi')->get();

        return view('pages.location.location', ['location' => $location]);
    }

    public function addlocation(Request $request)
    {
        DB::table('lokasi')->insert([
            'nama' => $request->nama,
            'singkatan' => $request->singkatan,

        ]);
        Alert::success('Success', 'Data Lokasi Telah berhasil Ditambahkan');
        return redirect('/location');
    }

    public function editlocation($id)
    {

        $location = DB::table('lokasi')->where('id', $id)->get();

        return view('pages.location.location', ['location' => $location]);
    }

    public function updatelocation(Request $request)
    {
        DB::table('lokasi')->where('id', $request->id)->update([
            'nama' => $request->nama,
            'singkatan' => $request->singkatan,
        ]);
        // dd($request);

        return redirect('/location');
    }

    public function deletelocation($id)
    {
        DB::table('lokasi')->where('id', $id)->delete();
        // dd($id);
        Alert::success('Success', 'Data Lokasi Telah berhasil dihapus');
        return redirect('/location');
    }

    //End Location Controllers

    //Kategori Controllers
    public function kategori()
    {
        $kategori = DB::table('kategori')->get();

        return view('pages.kategori.kategori', ['kategori' => $kategori]);

    }

    public function addkategori(Request $request)
    {
        DB::table('kategori')->insert([
            'nama' => $request->nama,

        ]);
        Alert::success('Success', 'Data Lokasi Telah berhasil Ditambahkan');
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

    //End Kategori Controllers


    //User Controllers
    public function users()
    {
        return view('pages.users.users');
    }

    public function allusers()
    {
        return view('pages.users.allusers');
    }

    //End User Controllers


}
