<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Hash;

use App\Models\lokasi;
use App\Models\User;


class pages extends Controller
{
    public function index()
    {
        $title = 'MUN | Dashboard';
        return view('pages.dashboard', compact('title'));
    }

    //Activity Controllers
    public function toll()
    {
        $title = 'MUN | Toll';
        return view('pages.activity.toll', compact('title'));
    }

    public function nontoll()
    {
        $title = 'MUN | Non Toll';
        return view('pages.activity.nontoll', compact('title'));
    }

    public function pengembangan()
    {
        $title = 'MUN | Pengembangan';
        return view('pages.activity.pengembangan', compact('title'));
    }

    public function activitydetail()
    {
        $title = 'MUN | Detail Activity';
        return view('pages.activity.subpages.activitydetail', compact('title'));
    }

    //End Activity Controllers

    //Location Controllers
    public function location()
    {
        $title = 'MUN | Location';
        $location = DB::table('lokasi')->get();

        return view('pages.location.location', ['location' => $location], compact('title'));
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
        $title = 'MUN | Kategori';
        $kategori = DB::table('kategori')->get();

        return view('pages.kategori.kategori', ['kategori' => $kategori], compact('title'));
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
        $title = 'MUN | User';
        return view('pages.users.users', compact('title'));
    }

    public function allusers()
    {
        $title = 'MUN | All User';

        $allusers = DB::table('users')->get();

        return view('pages.users.allusers', ['allusers' => $allusers], compact('title'));
    }
    public function addallusers(Request $request)
    {
        $validatedData = $request->validate([
            'nama' => 'required|max:255',
            'email' => 'required|email',
            'password' => 'required|min:3',
            'jabatan' => 'required',
            'foto' => 'image|file',

        ]);

        if($request->file('foto')){
            $validatedData['foto'] = $request->file('foto')->store('users-foto');
        }

        $validatedData['password'] = Hash::make($validatedData['password']);


        // dd($request);
        User::create($validatedData);
        return redirect('/allusers');
    }

    public function editallusers($id)
    {

        $allusers = DB::table('allusers')->where('id', $id)->get();

        return view('pages.users.allusers', ['allusers' => $allusers]);
    }

    public function updateallusers(Request $request)
    {
        DB::table('users')->where('id', $request->id)->update([
            'nama' => $request->nama,
            'email' => $request->email,
            'jabatan' => $request->jabatan,
            'foto' => $request->foto,

        ]);
        dd($request);

        // return redirect('/allusers');
    }

    public function deleteallusers($id)
    {
        DB::table('users')->where('id', $id)->delete();

        Alert::success('Success', 'Data User Telah berhasil dihapus');
        return redirect('/allusers');
    }

    //End User Controllers


}
