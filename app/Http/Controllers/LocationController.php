<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class LocationController extends Controller
{
    public function location(Request $request)
    {
        $title = 'MUN | Location';
        $pagination = 10;
        $location = DB::table('lokasi')->paginate($pagination);

        return view('pages.location.location', ['location' => $location], compact('title'))->with('i', ($request->input('page', 1) - 1) *  $pagination);
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
}
