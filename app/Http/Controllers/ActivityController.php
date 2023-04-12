<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Activity;
use App\Models\Kategori;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Carbon;

use App\Models\lokasi;

class ActivityController extends Controller
{
    //Activity Controllers
    public function toll(Request $request)
    {
        $title = 'MUN | Toll';
        $pagination = 10;
        $lokasi = Lokasi::all();
        $kategori = Kategori::all();

        $selected_value = $request->lokasi;
        

        if ($request->has('search') || $selected_value) {
            $toll = Activity::with('user')
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
            $toll = Activity::with('user')
                ->where('kategori_activity', 'Toll')
                ->whereIn('status', ['pending'])
                // ->orWhere('status', '=', 'rejected')
                ->latest()
                ->paginate($pagination);
        }
        // dd($user);

        return view('pages.activity.toll', [
            'toll' => $toll, 
            'lokasi' => $lokasi, 
            'kategori' => $kategori, 
            'selected_value' => $selected_value], compact('title'))->with('i', ($request->input('page', 1) - 1) *  $pagination);
    }


    public function addtollactivity(Request $request)
    {

        $validatedData = $request->validate([
            'user_id' => 'required',
            'kategori_activity' => 'required',
            'tanggal' => 'required',
            'j_hardware' => 'nullable',
            'u_hardware' => 'nullable',
            'gto' => 'nullable',
            'u_gto' => 'nullable',
            's_aplikasi' => 'nullable',
            'u_aplikasi' => 'nullable',
            'a_it' => 'nullable',
            'u_it' => 'nullable',
            'catatan' => 'nullable',
            'shift' => 'required',
            'lokasi' => 'required',
            'kategori' => 'required',
            'kondisi_akhir' => 'nullable',
            'biaya' => 'required',
            'foto' => 'image|file',
            'status' => 'required'

        ]);


        if (($request->input('j_hardware'))) {
            $validatedData['j_hardware'] = implode(',', $validatedData['j_hardware']);
        }

        if (($request->input('gto'))) {
            $validatedData['gto'] = implode(',', $validatedData['gto']);
        }

        if (($request->input('s_aplikasi'))) {
            $validatedData['s_aplikasi'] = implode(',', $validatedData['s_aplikasi']);
        }

        if (($request->input('a_it'))) {
            $validatedData['a_it'] = implode(',', $validatedData['a_it']);
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
            $nontoll =Activity::with('user')->where([['kategori_activity', '=', 'NonToll'], ['status', '=', 'pending'], ['lokasi', 'like', '%' . $request->search . '%']])->paginate($pagination);
            session()->put('selected_value', null);
            session()->put('nontoll', $nontoll);
        } else {
            $nontoll =Activity::with('user')->where([['kategori_activity', '=', 'NonToll'], ['status', '=', 'pending']])->paginate($pagination);
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
            'j_hardware' => 'nullable',
            'u_hardware' => 'nullable',
            'gto' => 'nullable',
            'u_gto' => 'nullable',
            's_aplikasi' => 'nullable',
            'u_aplikasi' => 'nullable',
            'a_it' => 'nullable',
            'u_it' => 'nullable',
            'catatan' => 'nullable',
            'shift' => 'required',
            'lokasi' => 'required',
            'kategori' => 'required',
            'kondisi_akhir' => 'nullable',
            'biaya' => 'required',
            'foto' => 'image|file',
            'status' => 'required'

        ]);
        // if (($request->input('j_hardware'))) {
        //     $validatedData['j_hardware'] =  json_encode($request->j_hardware);
        // }

        // if (($request->input('s_aplikasi'))) {
        //     $validatedData['s_aplikasi'] = json_encode($request->s_aplikasi);
        // }

        // if (($request->input('a_it'))) {
        //     $validatedData['a_it'] = json_encode($request->a_it);
        // }

        if (($request->input('j_hardware'))) {
            $validatedData['j_hardware'] = implode(',', $validatedData['j_hardware']);
        }

        if (($request->input('gto'))) {
            $validatedData['gto'] = implode(',', $validatedData['gto']);
        }

        if (($request->input('s_aplikasi'))) {
            $validatedData['s_aplikasi'] = implode(',', $validatedData['s_aplikasi']);
        }

        if (($request->input('a_it'))) {
            $validatedData['a_it'] = implode(',', $validatedData['a_it']);
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
            $pengembangan = Activity::with('user')
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
            $pengembangan = Activity::with('user')
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
            'j_hardware' => 'nullable',
            'u_hardware' => 'nullable',
            'gto' => 'nullable',
            'u_gto' => 'nullable',
            's_aplikasi' => 'nullable',
            'u_aplikasi' => 'nullable',
            'a_it' => 'nullable',
            'u_it' => 'nullable',
            'catatan' => 'nullable',
            'shift' => 'required',
            'lokasi' => 'required',
            'kategori' => 'required',
            'kondisi_akhir' => 'nullable',
            'biaya' => 'required',
            'foto' => 'image|file',
            'status' => 'required'

        ]);


        if (($request->input('j_hardware'))) {
            $validatedData['j_hardware'] =  implode(',', $validatedData['j_hardware']);
        }

        if (($request->input('gto'))) {
            $validatedData['gto'] = implode(',', $validatedData['gto']);
        }

        if (($request->input('s_aplikasi'))) {
            $validatedData['s_aplikasi'] = implode(',', $validatedData['s_aplikasi']);
        }

        if (($request->input('a_it'))) {
            $validatedData['a_it'] = implode(',', $validatedData['a_it']);
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


    public function approve_atasanit(Request $request, $id)
    {

        $first_review = $request->filled('first_review') ? $request->first_review : null;
        $second_review = $request->filled('second_review') ? $request->second_review : null;

        DB::table('activities')->where('id', $id)->update([
            'first_review' => $request->first_review,

        ]);




        return redirect('/dashboard');
    }

    public function approve_pengecekanit(Request $request, $id)
    {
        $first_review = $request->filled('first_review') ? $request->first_review : null;
        $second_review = $request->filled('second_review') ? $request->second_review : null;
  
        DB::table('activities')->where('id', $id)->update([
            'second_review' => $request->second_review,

            


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

        return view('pages.activity.subpages.histori.histori', [
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

        return view('pages.activity.subpages.histori.nontollhistori', [
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

        return view('pages.activity.subpages.histori.pengembanganhistori', [
            'pengembangan' => $pengembangan,
            'lokasi' => $lokasi,
            'selected_value' => $selected_value
        ], compact('title', 'subtitle'))->with('i', ($request->input('page', 1) - 1) * $pagination);
    }

    public function print_detail(Request $request, $id)
    {
        $title = 'Print Page';

        $date = Carbon::now();

        $activitydetail = DB::table('activities')->where('id', '=', $id)->get();

        return view('pages.activity.subpages.print.detailprint', ['activitydetail' => $activitydetail, 'date' => $date], compact('title'));

        // return view('pages.location.printlocation');

    }

    public function print_activity_toll($startdate, $enddate)
    {

        $title = 'Print Page';

        $date = Carbon::now();

        $printactivity = DB::table('activities')->whereBetween('tanggal', [$startdate, $enddate])
        ->where('kategori_activity', '=' , 'Toll' )
        ->latest()
        ->get();


        return view('pages.activity.subpages.print.activityprint', ['printactivity' => $printactivity, 'date' => $date], compact('title'));
    }

    public function print_activity_nontoll($startdate, $enddate)
    {

        $title = 'Print Page';

        $date = Carbon::now();

        $printactivity = DB::table('activities')->whereBetween('tanggal', [$startdate, $enddate])
        ->where('kategori_activity', '=' , 'NonToll' )
        ->latest()
        ->get();


        return view('pages.activity.subpages.print.activityprint', ['printactivity' => $printactivity, 'date' => $date], compact('title'));
    }

    public function print_activity_pengembangan($startdate, $enddate)
    {

        $title = 'Print Page';

        $date = Carbon::now();

        $printactivity = DB::table('activities')->whereBetween('tanggal', [$startdate, $enddate])
        ->where('kategori_activity', '=' , 'pengembangan' )
        ->latest()
        ->get();


        return view('pages.activity.subpages.print.activityprint', ['printactivity' => $printactivity, 'date' => $date], compact('title'));
    }
}
