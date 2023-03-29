<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\Barang;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Carbon;

use Barryvdh\DomPDF\Facade\PDF;

use App\Models\lokasi;
use App\Models\TollActivity;
use App\Models\User;



class pages extends Controller
{
    public function index()
    {
        $title = 'MUN | Dashboard';


        $mayor = Activity::all()->where('kategori', '=', 'Kerusakan Mayor')->count();
        $perbaikan = Activity::all()->where('kategori', '=', 'Perbaikan')->count();
        $pergantian = Activity::all()->where('kategori', '=', 'Kerusakan/Pergantian')->count();
        $minor = Activity::all()->where('kategori', '=', 'Kerusakan Minor')->count();



        return view('pages.dashboard', compact('title'))->with(['mayor' => $mayor, 'perbaikan' => $perbaikan, 'pergantian' => $pergantian, 'minor' => $minor]);
    }


    //End Activity Controllers

    //Location Controllers
   

    //End Location Controllers

    //Kategori Controllers
  

    //End Kategori Controllers


    //User Controllers
    public function users()
    {
        $title = 'MUN | User';
        return view('pages.users.users', compact('title'));
    }

    public function updateusers(Request $request, $id)
    {
        // dd($request);
        $updateuser = $request->validate([
            'nama' => 'required|max:255',
            'email' => 'required|email',
            'foto' => 'image|file',
            'ttd' => 'image|file',
        ]);

        if ($request->file('foto')) {
            $updateuser['foto'] = $request->file('foto')->store('users-foto');
        }
        if ($request->file('ttd')) {
            $updateuser['ttd'] = $request->file('ttd')->store('users-ttd');
        }

        User::where('id', $request->id)->update($updateuser);

        return redirect('/users');
    }

    public function allusers(Request $request)
    {
        $title = 'MUN | All User';
        $pagination = 10;
        $allusers = DB::table('users')->paginate($pagination);

        return view('pages.users.allusers', ['allusers' => $allusers], compact('title'))->with('i', ($request->input('page', 1) - 1) *  $pagination);
    }

    public function editallusers($id)
    {

        $users = DB::table('users')->where('id', $id)->get();

        return view('pages.users.allusers', ['users' => $users]);
    }

    public function updateallusers(Request $request, $id)
    {

        $title = 'MUN | All User';

        $allusers = $request->validate([
            'nama' => 'required|max:255',
            'email' => 'required|email',
            'jabatan' => 'required',
            'foto' => 'image|file',
        ]);

        if ($request->file('foto')) {
            $allusers['foto'] = $request->file('foto')->store('users-foto');
        }

        User::where('id', $request->id)->update($allusers);

        // return view('pages.users.allusers', ['allusers' => $allusers], compact('title'));

        return redirect('/allusers');
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

        if ($request->file('foto')) {
            $validatedData['foto'] = $request->file('foto')->store('users-foto');
        }

        $validatedData['password'] = Hash::make($validatedData['password']);


        // dd($request);
        User::create($validatedData);
        return redirect('/allusers');
    }

    public function deleteallusers($id)
    {
        DB::table('users')->where('id', $id)->delete();

        Alert::success('Success', 'Data User Telah berhasil dihapus');
        return redirect('/allusers');
    }

    //End User Controllers

    //External Command
    public function printactivity()
    {
        $title = 'MUN | Dashboard';

        return view('pages.activity.subpages.printactivity', compact('title'));
    }

    public function cari(Request $request)
    {

        dd($request);
        $cari = $request->cari;

        $toll = DB::table('activities')->where('lokasi', 'like', "%" . $request->cari . "%")->paginate();

        return view('index', ['toll' => $toll]);
    }

    //Barang
    public function listbarang(Request $request)
    {
        $title = 'MUN | List Stok Barang';
        $pagination = 10;
        $listbarang = DB::table('barangs')->paginate($pagination);

        return view('pages.barang.listbarang', ['listbarang' => $listbarang], compact('title'))->with('i', ($request->input('page', 1) - 1) *  $pagination);
    }

    public function addbarang(Request $request)
    {
        $validatedData = $request->validate([
            'nama_equipment' => 'required',
            'unit' => 'required',
            'merk' => 'required',
            'stock' => 'required',

        ]);

        Barang::create($validatedData);

        Alert::success('Success', 'Log Activity Telah berhasil Ditambahkan');
        return redirect('/listbarang');

        return view('pages.barang.listbarang', compact('title'));
    }

    public function logbarang(Request $request)
    {
        $title = 'MUN | Log Activity Barang';

        return view('pages.barang.logbarang', compact('title'));
    }

    // All Print
    public function print_location(Request $request)
    {
        $title = 'Print Page';
     
        $date = Carbon::now()->format('d-m-Y');
        $location = DB::table('lokasi')->get();

        return view('pages.location.printlocation', ['location' => $location, 'date' => $date], compact('title'))->with('i', ($request->input('page', 1) - 1));
    
        // return view('pages.location.printlocation');
    
    }
}
