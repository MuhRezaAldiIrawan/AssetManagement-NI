<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Hash;

use App\Models\lokasi;
use App\Models\TollActivity;
use App\Models\User;



class pages extends Controller
{
    public function index()
    {
        $title = 'MUN | Dashboard';
        return view('pages.dashboard', compact('title'));
    }

    //Activity Controllers
    public function toll(Request $request)
    {
        $title = 'MUN | Toll';
        $pagination = 10;
        $toll = DB::table('activities')->where('kategori_activity', '=', 'Toll')->paginate($pagination);


        return view('pages.activity.toll', ['toll' => $toll], compact('title'))->with('i', ($request->input('page', 1) - 1) *  $pagination);
    }

    public function addtollactivity(Request $request)
    {
        $validatedData = $request->validate([
            'user_id' => 'required',
            'kategori_activity' => 'required',
            'tanggal' => 'required',
            'j_hardware' => 'required',
            'u_hardware' => 'required',
            's_aplikasi' => 'required',
            'u_aplikasi' => 'required',
            'a_it' => 'required',
            'u_it' => 'required',
            'catatan' => 'required',
            'shift' => 'required',
            'lokasi' => 'required',
            'kategori' => 'required',
            'kondisi_akhir' => 'required',
            'foto' => 'image|file',
            'status' => 'required'

        ]);

        
        if(($request->input('j_hardware'))){
            $validatedData['j_hardware'] = join(',', $request->input('j_hardware'));
        }

        if(($request->input('s_aplikasi'))){
            $validatedData['s_aplikasi'] = join(',', $request->input('s_aplikasi'));
        }

        if(($request->input('a_it'))){
            $validatedData['a_it'] = join(',', $request->input('a_it'));
        }

        if ($request->file('foto')) {
            $validatedData['foto'] = $request->file('foto')->store('activity-foto');
        }

        Activity::create($validatedData);

        Alert::success('Success', 'Log Activity Telah berhasil Ditambahkan');
        return redirect('/toll');
    }

    public function nontoll(Request $request)
    {
        $title = 'MUN | Non Toll';
        $pagination = 10;
        $nontoll = DB::table('activities')->where('kategori_activity', '=', 'NonToll')->paginate($pagination);

        return view('pages.activity.nontoll', ['nontoll' => $nontoll], compact('title'))->with('i', ($request->input('page', 1) - 1) *  $pagination);
    }

    public function addnontollactivity(Request $request)
    {

        $validatedData = $request->validate([
            'user_id' => 'required',
            'kategori_activity' => 'required',
            'tanggal' => 'required',
            'j_hardware' => 'required',
            'u_hardware' => 'required',
            's_aplikasi' => 'required',
            'u_aplikasi' => 'required',
            'a_it' => 'required',
            'u_it' => 'required',
            'catatan' => 'required',
            'shift' => 'required',
            'lokasi' => 'required',
            'kategori' => 'required',
            'kondisi_akhir' => 'required',
            'foto' => 'image|file',

        ]);

        if(($request->input('j_hardware'))){
            $validatedData['j_hardware'] = join(',', $request->input('j_hardware'));
        }

        if(($request->input('s_aplikasi'))){
            $validatedData['s_aplikasi'] = join(',', $request->input('s_aplikasi'));
        }

        if(($request->input('a_it'))){
            $validatedData['a_it'] = join(',', $request->input('a_it'));
        }

        if ($request->file('foto')) {
            $validatedData['foto'] = $request->file('foto')->store('activity-foto');
        }
        Activity::create($validatedData);
        Alert::success('Success', 'Log Activity Telah berhasil Ditambahkan');
        return redirect('/nontoll');
    }

    public function pengembangan(Request $request)
    {
        $title = 'MUN | Pengembangan';
        $pagination = 10;
        $pengembangan = DB::table('activities')->where('kategori_activity', '=', 'Pengembangan')->paginate($pagination);


        return view('pages.activity.pengembangan', ['pengembangan' => $pengembangan], compact('title'))->with('i', ($request->input('page', 1) - 1) *  $pagination);;
    }

    public function pengembanganactivity(Request $request)
    {

        $validatedData = $request->validate([
            'user_id' => 'required',
            'kategori_activity' => 'required',
            'tanggal' => 'required',
            'j_hardware' => 'required',
            'u_hardware' => 'required',
            's_aplikasi' => 'required',
            'u_aplikasi' => 'required',
            'a_it' => 'required',
            'u_it' => 'required',
            'catatan' => 'required',
            'shift' => 'required',
            'lokasi' => 'required',
            'kategori' => 'required',
            'kondisi_akhir' => 'required',
            'foto' => 'image|file',

        ]);

        if ($request->file('foto')) {
            $validatedData['foto'] = $request->file('foto')->store('activity-foto');
        }
        Activity::create($validatedData);
        Alert::success('Success', 'Log Activity Telah berhasil Ditambahkan');
        return redirect('/pengembangan');
    }

    public function activitydetail($id)
    {
        $title = 'MUN | Detail Activity';

        $activitydetail = DB::table('activities')->where('id', $id)->get();

        return view('pages.activity.subpages.activitydetail', ['activitydetail' => $activitydetail], compact('title'));
    }

    public function updateactivitydetail(Request $request, $id)
    {

        $activitydetail = $request->validate([
            'user_id' => 'required',
            'kategori_activity' => 'required',
            'tanggal' => 'required',
            'j_hardware' => 'required',
            'u_hardware' => 'required',
            's_aplikasi' => 'required',
            'u_aplikasi' => 'required',
            'a_it' => 'required',
            'u_it' => 'required',
            'catatan' => 'required',
            'shift' => 'required',
            'lokasi' => 'required',
            'kategori' => 'required',
            'kondisi_akhir' => 'required',
            'foto' => 'image|file',
            'status' => 'required'
        ]);

        if(($request->input('j_hardware'))){
            $validatedData['j_hardware'] = join(',', $request->input('j_hardware'));
        }

        if(($request->input('s_aplikasi'))){
            $validatedData['s_aplikasi'] = join(',', $request->input('s_aplikasi'));
        }

        if(($request->input('a_it'))){
            $validatedData['a_it'] = join(',', $request->input('a_it'));
        }

        if ($request->file('foto')) {
            $validatedData['foto'] = $request->file('foto')->store('activity-foto');
        }

        User::where('id', $request->id)->update($activitydetail);

        // return view('pages.users.allusers', ['allusers' => $allusers], compact('title'));

        return redirect('/allusers');
    }

    public function tollhistori(Request $request)
    {
        $title = 'MUN | Toll Histori';
        $subtitle = 'Log Histori Toll';
        $pagination = 10;
        $histori = DB::table('activities')->where([['kategori_activity', '=', 'Toll'],['status', '=', 'approve']])->orWhere('status', '=', 'rejected')->paginate($pagination);


        return view('pages.activity.subpages.histori', ['histori' => $histori], compact('title','subtitle'))->with('i', ($request->input('page', 1) - 1) *  $pagination);
    }

    public function nontollhistori(Request $request)
    {
        $title = 'MUN | Non Toll Histori';
        $subtitle = 'Log Histori Non Toll';
        $pagination = 10;
        $histori = DB::table('activities')->where('kategori_activity', '=', 'NonToll')->paginate($pagination);


        return view('pages.activity.subpages.histori', ['histori' => $histori], compact('title','subtitle'))->with('i', ($request->input('page', 1) - 1) *  $pagination);
    }

    public function pengembanganhistori(Request $request)
    {
        $title = 'MUN | Pengembangan Histori';
        $subtitle = 'Log Histori Pengembangan';
        $pagination = 10;
        $histori = DB::table('activities')->where('kategori_activity', '=', 'Pengembangan')->paginate($pagination);


        return view('pages.activity.subpages.histori', ['histori' => $histori], compact('title','subtitle'))->with('i', ($request->input('page', 1) - 1) *  $pagination);
    }


    //End Activity Controllers

    //Location Controllers
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

    //End Location Controllers

    //Kategori Controllers
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

    //End Kategori Controllers


    //User Controllers
    public function users()
    {
        $title = 'MUN | User';
        return view('pages.users.users', compact('title'));
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


}
