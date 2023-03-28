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

    //Activity Controllers
    public function toll(Request $request)
    {
        $title = 'MUN | Toll';
        $pagination = 10;
        $lokasi = Lokasi::all();
        $kategori = Kategori::all();
        $selected_value = $request->lokasi;

        if ($request->has('search') || $selected_value) {
            $toll = DB::table('activities')
                ->where(function ($query) use ($request, $selected_value) {
                    $query->where('kategori_activity', 'Toll')
                        ->whereIn('status', ['pending']);
                    if ($request->has('search')) {
                        $query->where('lokasi', 'like', '%' . $request->search . '%');
                        session()->put('selected_value', null);
                    } else {
                        $query->where('lokasi', '=', $selected_value);
                        session()->put('selected_value', $selected_value);
                    }
                })
                ->latest()
                ->paginate($pagination);

            session()->put('toll', $toll);
        } else {
            $toll = DB::table('activities')
                ->where('kategori_activity', 'Toll')
                ->whereIn('status', ['pending'])
                // ->orWhere('status', '=', 'rejected')
                ->latest()
                ->paginate($pagination);
        }

        return view('pages.activity.toll', ['toll' => $toll, 'lokasi' => $lokasi, 'kategori' => $kategori, 'selected_value' => $selected_value], compact('title'))->with('i', ($request->input('page', 1) - 1) *  $pagination);
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
            'biaya' => 'required',
            'foto' => 'image|file',
            'status' => 'required'

        ]);


        if (($request->input('j_hardware'))) {
            $validatedData['j_hardware'] = json_encode($request->j_hardware);
        }

        if (($request->input('s_aplikasi'))) {
            $validatedData['s_aplikasi'] = json_encode($request->s_aplikasi);
        }

        if (($request->input('a_it'))) {
            $validatedData['a_it'] = json_encode($request->a_it);
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
        $lokasi = Lokasi::all();
        $kategori = Kategori::all();

        if ($request->has('search')) {
            $nontoll = DB::table('activities')->where([['kategori_activity', '=', 'NonToll'], ['status', '=', 'pending'], ['lokasi', 'like', '%' . $request->search . '%']])->paginate($pagination);
            session()->put('selected_value', null);
            session()->put('nontoll', $nontoll);
        } else {
            $nontoll = DB::table('activities')->where([['kategori_activity', '=', 'NonToll'], ['status', '=', 'pending']])->paginate($pagination);
        }

        // $nontoll = DB::table('activities')->where([['kategori_activity', '=', 'NonToll'],['status', '=', 'pending']])->paginate($pagination);

        return view('pages.activity.nontoll', ['nontoll' => $nontoll, 'lokasi' => $lokasi, 'kategori' => $kategori], compact('title'))->with('i', ($request->input('page', 1) - 1) *  $pagination);
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
            'biaya' => 'required',
            'foto' => 'image|file',
            'status' => 'required'

        ]);

        if (($request->input('j_hardware'))) {
            $validatedData['j_hardware'] = json_encode($request->j_hardware);
        }

        if (($request->input('s_aplikasi'))) {
            $validatedData['s_aplikasi'] = json_encode($request->s_aplikasi);
        }

        if (($request->input('a_it'))) {
            $validatedData['a_it'] = json_encode($request->a_it);
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
        $lokasi = Lokasi::all();
        $kategori = Kategori::all();
        $selected_value = $request->lokasi;

        if ($request->has('search') || $selected_value) {
            $pengembangan = DB::table('activities')
                ->where(function ($query) use ($request, $selected_value) {
                    $query->where('kategori_activity', 'pengembangan')
                        ->whereIn('status', ['pending']);
                    if ($request->has('search')) {
                        $query->where('lokasi', 'like', '%' . $request->search . '%');
                        session()->put('selected_value', null);
                    } else {
                        $query->where('lokasi', '=', $selected_value);
                        session()->put('selected_value', $selected_value);
                    }
                })
                ->latest()
                ->paginate($pagination);

            session()->put('pengembangan', $pengembangan);
        } else {
            $pengembangan = DB::table('activities')
                ->where('kategori_activity', 'pengembangan')
                ->whereIn('status', ['pending'])
                // ->orWhere('status', '=', 'rejected')
                ->latest()
                ->paginate($pagination);
        }

        return view('pages.activity.pengembangan', ['pengembangan' => $pengembangan, 'lokasi' => $lokasi, 'kategori' => $kategori, 'selected_value' => $selected_value], compact('title'))->with('i', ($request->input('page', 1) - 1) *  $pagination);;
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
            'biaya' => 'required',
            'foto' => 'image|file',
            'status' => 'required'

        ]);


        if (($request->input('j_hardware'))) {
            $validatedData['j_hardware'] = json_encode($request->j_hardware);
        }

        if (($request->input('s_aplikasi'))) {
            $validatedData['s_aplikasi'] = json_encode($request->s_aplikasi);
        }

        if (($request->input('a_it'))) {
            $validatedData['a_it'] = json_encode($request->a_it);
        }

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

    public function ubahdata(Request $request, Activity $activity)
    {
        // dd($request);
        // return ($request->file('foto')->store('activity-foto'));

        $activitydetail = $request->validate([
            'id' => 'required',
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

        if (($request->input('j_hardware'))) {
            $validatedData['j_hardware'] = json_encode($request->j_hardware);
        }

        if (($request->input('s_aplikasi'))) {
            $validatedData['s_aplikasi'] = json_encode($request->s_aplikasi);
        }

        if (($request->input('a_it'))) {
            $validatedData['a_it'] = json_encode($request->a_it);
        }

        if ($request->file('foto')) {
            $validatedData['foto'] = $request->file('foto')->store('activity-foto');
        }



        Activity::where('id', $activity->id)->update($activitydetail);
        // Activity::save();

        // return view('pages.users.allusers', compact('title'));

        return redirect('/activitydetail');
    }


    public function approve(Request $request, $id)
    {
        // dd($request);
        DB::table('activities')->where('id', $id)->update([
            'status' => $request->status,

        ]);

        return redirect('/dashboard');
    }

    public function rejected(Request $request, $id)
    {
        // dd($request);
        DB::table('activities')->where('id', $id)->update([
            'status' => $request->status,

        ]);

        return redirect('/dashboard');
    }

    public function tollhistori(Request $request)
    {
        $title = 'MUN | Toll Histori';
        $subtitle = 'Log Histori Toll';
        $pagination = 10;
        $lokasi = Lokasi::all();
        $selected_value = $request->lokasi;

        if ($request->has('search') || $selected_value) {
            $histori = DB::table('activities')
                ->where(function ($query) use ($request, $selected_value) {
                    $query->where('kategori_activity', 'Toll')
                        ->whereIn('status', ['approve', 'rejected']);
                    if ($request->has('search')) {
                        $query->where('lokasi', 'like', '%' . $request->search . '%');
                        session()->put('selected_value', null);
                    } else {
                        $query->where('lokasi', '=', $selected_value);
                        session()->put('selected_value', $selected_value);
                    }
                })
                ->latest()
                ->paginate($pagination);

            session()->put('toll', $histori);
        } else {
            $histori = DB::table('activities')
                ->where('kategori_activity', 'Toll')
                ->whereIn('status', ['approve', 'rejected'])
                // ->orWhere('status', '=', 'rejected')
                ->latest()
                ->paginate($pagination);
        }

        return view('pages.activity.subpages.histori', [
            'histori' => $histori,
            'lokasi' => $lokasi,
            'selected_value' => $selected_value
        ], compact('title', 'subtitle'))->with('i', ($request->input('page', 1) - 1) * $pagination);
    }

    public function nontollhistori(Request $request)
    {
        $title = 'MUN | Toll Histori';
        $subtitle = 'Log Histori Non Toll';
        $pagination = 10;
        $lokasi = Lokasi::all();
        $selected_value = $request->lokasi;

        if ($request->has('search') || $selected_value) {
            $nontollhistori = DB::table('activities')
                ->where(function ($query) use ($request, $selected_value) {
                    $query->where('kategori_activity', 'NonToll')
                        ->whereIn('status', ['approve', 'rejected']);
                    if ($request->has('search')) {
                        $query->where('lokasi', 'like', '%' . $request->search . '%');
                        session()->put('selected_value', null);
                    } else {
                        $query->where('lokasi', '=', $selected_value);
                        session()->put('selected_value', $selected_value);
                    }
                })
                ->latest()
                ->paginate($pagination);

            session()->put('nontollhistori', $nontollhistori);
        } else {
            $nontollhistori = DB::table('activities')
                ->where('kategori_activity', 'NonToll')
                ->whereIn('status', ['approve', 'rejected'])
                // ->where([
                //     ['kategori_activity', '=', 'NonToll'],
                //     ['status', '=', 'approve'],
                // ])
                // ->orWhere('status', '=', 'rejected')
                ->latest()
                ->paginate($pagination);
        }

        return view('pages.activity.subpages.nontollhistori', [
            'nontollhistori' => $nontollhistori,
            'lokasi' => $lokasi,
            'selected_value' => $selected_value
        ], compact('title', 'subtitle'))->with('i', ($request->input('page', 1) - 1) * $pagination);
    }

    public function pengembanganhistori(Request $request)
    {
        $title = 'MUN | Pengembangan Histori';
        $subtitle = 'Log Histori Pengembangan';
        $pagination = 10;
        $lokasi = Lokasi::all();
        $selected_value = $request->lokasi;

        if ($request->has('search') || $selected_value) {
            $pengembangan = DB::table('activities')
                ->where(function ($query) use ($request, $selected_value) {
                    $query->where('kategori_activity', 'pengembangan')
                        ->whereIn('status', ['approve', 'rejected']);
                    if ($request->has('search')) {
                        $query->where('lokasi', 'like', '%' . $request->search . '%');
                        session()->put('selected_value', null);
                    } else {
                        $query->where('lokasi', '=', $selected_value);
                        session()->put('selected_value', $selected_value);
                    }
                })
                ->latest()
                ->paginate($pagination);

            session()->put('pengembangan', $pengembangan);
        } else {
            $pengembangan = DB::table('activities')
                ->where('kategori_activity', 'pengembangan')
                ->whereIn('status', ['approve', 'rejected'])
                ->latest()
                ->paginate($pagination);
        }

        return view('pages.activity.subpages.pengembanganhistori', [
            'pengembangan' => $pengembangan,
            'lokasi' => $lokasi,
            'selected_value' => $selected_value
        ], compact('title', 'subtitle'))->with('i', ($request->input('page', 1) - 1) * $pagination);
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
        $pagination = 10;
        $date = Carbon::now()->format('d-m-Y');
        $location = DB::table('lokasi')->paginate($pagination);

        return view('pages.location.printlocation', ['location' => $location, 'date' => $date], compact('title'))->with('i', ($request->input('page', 1) - 1) *  $pagination);
    
        // return view('pages.location.printlocation');
    
    }
}
