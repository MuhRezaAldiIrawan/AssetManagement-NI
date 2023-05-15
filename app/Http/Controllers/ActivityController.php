<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Activity;
use App\Models\Kategori;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Carbon;
use App\Imports\ActivityImport;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ActivityExport;
use App\Exports\ActivityExportAll;




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

        foreach ($toll as $c) {
            $c->tanggal = Carbon::parse($c->tanggal)->format('d F Y');
        }




        return view('pages.activity.toll', [
            'toll' => $toll,
            'lokasi' => $lokasi,
            'kategori' => $kategori,
            'selected_value' => $selected_value
        ], compact('title'))->with('i', ($request->input('page', 1) - 1) *  $pagination);
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
            $nontoll = Activity::with('user')->where([['kategori_activity', '=', 'NonToll'], ['status', '=', 'pending'], ['lokasi', 'like', '%' . $request->search . '%']])->paginate($pagination);
            session()->put('selected_value', null);
            session()->put('nontoll', $nontoll);
        } else {
            $nontoll = Activity::with('user')->where([['kategori_activity', '=', 'NonToll'], ['status', '=', 'pending']])->paginate($pagination);
        }

        foreach ($nontoll as $c) {
            $c->tanggal = Carbon::parse($c->tanggal)->format('d F Y');
        }

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

        foreach ($pengembangan as $c) {
            $c->tanggal = Carbon::parse($c->tanggal)->format('d F Y');
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


    public function approve_atasanit(Request $request, $id)
    {

        $activity = Activity::find($request->id);

        $activity->first_review_id = $request->first_review_id;
        $activity->first_value = $request->first_value;
        $activity->save();

        if ($activity->second_review_id) {

            // check first_value and second_value
            if ($activity->first_value == 'approve' && $activity->second_value == 'approve') {
                $activity->status = 'approve';
            } elseif ($activity->first_value == 'approve' && $activity->second_value == 'rejected' || $activity->first_value == 'rejected' && $activity->second_value == 'approve') {
                $activity->status = 'rejected';
            } else {
                $activity->status = 'rejected';
            }
        } else {
            $activity->status = 'pending';
        }



        $activity->save();

        return redirect('/toll');
    }

    public function approve_pengecekanit(Request $request, $id)
    {
        // dd($request);

        $activity = Activity::find($request->id);

        $activity->second_review_id = $request->second_review_id;
        $activity->second_value = $request->second_value;
        $activity->save();

        if ($activity->first_review_id) {

            // check first_value and second_value
            if ($activity->first_value == 'approve' && $activity->second_value == 'approve') {
                $activity->status = 'approve';
            } elseif ($activity->first_value == 'approve' && $activity->second_value == 'rejected' || $activity->first_value == 'rejected' && $activity->second_value == 'approve') {
                $activity->status = 'rejected';
            } else {
                $activity->status = 'rejected';
            }
        } else {
            $activity->status = 'pending';
        }

        $activity->save();


        return redirect('/toll');
    }

    public function rejected_atasanit(Request $request, $id)
    {
        $activity = Activity::find($request->id);

        $activity->first_review_id = $request->first_review_id;
        $activity->first_value = $request->first_value;
        $activity->save();

        if ($activity->second_review_id) {

            // check first_value and second_value
            if ($activity->first_value == 'rejected' && $activity->second_value == 'rejected') {
                $activity->status = 'rejected';
            } elseif ($activity->first_value == 'approve' && $activity->second_value == 'rejected' || $activity->first_value == 'rejected' && $activity->second_value == 'approve') {
                $activity->status = 'rejected';
            } else {
                $activity->status = 'approve';
            }
        } else {
            $activity->status = 'pending';
        }

        $activity->save();


        return redirect('/toll');
    }


    public function rejected_pengecekanit(Request $request, $id)
    {
        $activity = Activity::find($request->id);

        $activity->second_review_id = $request->second_review_id;
        $activity->second_value = $request->second_value;
        $activity->save();


        if ($activity->first_review_id) {

            // check first_value and second_value
            if ($activity->first_value == 'rejected' && $activity->second_value == 'rejected') {
                $activity->status = 'rejected';
            } elseif ($activity->first_value == 'approve' && $activity->second_value == 'rejected' || $activity->first_value == 'rejected' && $activity->second_value == 'approve') {
                $activity->status = 'rejected';
            } else {
                $activity->status = 'approve';
            }
        } else {
            $activity->status = 'pending';
        }


        return redirect('/toll');
    }

    public function tollhistori(Request $request)
    {
        $title = 'MUN | Toll Proggress Activity';
        $subtitle = 'Log Proggress Job Toll';
        $pagination = 10;
        $lokasi = Lokasi::all();
        $selected_value = $request->lokasi;

        if ($request->has('search') || $selected_value) {
            $histori = Activity::with('user')
                ->where(function ($query) use ($request, $selected_value) {
                    $query->where('kategori_activity', 'Toll')
                        ->whereIn('status', ['approve', 'rejected', 'proses']);
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
            $histori = Activity::with('user')
                ->where('kategori_activity', 'Toll')
                ->whereIn('status', ['approve', 'rejected', 'proses'])
                // ->orWhere('status', '=', 'rejected')
                ->latest()
                ->paginate($pagination);
        }

        foreach ($histori as $c) {
            $c->tanggal = Carbon::parse($c->tanggal)->format('d F Y');
        }

        return view('pages.activity.subpages.on-proggress.toll', [
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
                ->latest()
                ->paginate($pagination);
        }

        foreach ($nontollhistori as $c) {
            $c->tanggal = Carbon::parse($c->tanggal)->format('d F Y');
        }

        return view('pages.activity.subpages.on-proggress.nontoll', [
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

        foreach ($pengembangan as $c) {
            $c->tanggal = Carbon::parse($c->tanggal)->format('d F Y');
        }

        return view('pages.activity.subpages.on-proggress.pengembangan', [
            'pengembangan' => $pengembangan,
            'lokasi' => $lokasi,
            'selected_value' => $selected_value
        ], compact('title', 'subtitle'))->with('i', ($request->input('page', 1) - 1) * $pagination);
    }

    public function detailproggress(Request $request, $id)
    {
        $title = 'Print Page';

        $date = Carbon::now();

        $activitydetail = Activity::with('user')->where('id', '=', $id)->get();

        return view('pages.activity.subpages.on-proggress.detailproggress', ['activitydetail' => $activitydetail, 'date' => $date], compact('title'));

        // return view('pages.location.printlocation');

    }

    public function startjob(Request $request, $id)
    {
        DB::table('activities')->where('id', $request->id)->update([
            'status' => $request->status,
        ]);
    
        return redirect('/toll');

    }

    public function print_detail(Request $request, $id)
    {
        $title = 'Print Page';

        $date = Carbon::now();

        $activitydetail = Activity::with('user')->where('id', '=', $id)->get();

        return view('components.print.detailprint', ['activitydetail' => $activitydetail, 'date' => $date], compact('title'));

        // return view('pages.location.printlocation');

    }
    

    public function print_detail_pengembangan(Request $request, $id)
    {
        $title = 'Print Page';

        $date = Carbon::now();

        $activitydetailpengembangan = Activity::with('user')->where('id', '=', $id)->get();

        return view('components.print.pengembanganprint', ['activitydetailpengembangan' => $activitydetailpengembangan, 'date' => $date], compact('title'));
    }

    public function print_activity_toll($startdate, $enddate)
    {

        $title = 'Print Page';

        $date = Carbon::now();

        $printactivity = Activity::with('user')->whereBetween('tanggal', [$startdate, $enddate])
            ->where('kategori_activity', '=', 'Toll')
            ->latest()
            ->get();


        return view('components.print.activityprint', ['printactivity' => $printactivity, 'date' => $date], compact('title'));
    }

    public function print_activity_nontoll($startdate, $enddate)
    {

        $title = 'Print Page';

        $date = Carbon::now();

        $printactivity = DB::table('activities')->whereBetween('tanggal', [$startdate, $enddate])
            ->where('kategori_activity', '=', 'NonToll')
            ->latest()
            ->get();


        return view('components.print.activityprint', ['printactivity' => $printactivity, 'date' => $date], compact('title'));
    }

    public function print_activity_pengembangan($startdate, $enddate)
    {

        $title = 'Print Page';

        $date = Carbon::now();

        $printactivity = DB::table('activities')->whereBetween('tanggal', [$startdate, $enddate])
            ->where('kategori_activity', '=', 'pengembangan')
            ->latest()
            ->get();


        return view('components.print.activityprint', ['printactivity' => $printactivity, 'date' => $date], compact('title'));
    }

    public function import_excel(Request $request)
    {
        // validasi
        $this->validate($request, [
            'user_id' => 'required',
            'file' => 'required|mimes:csv,xls,xlsx'
        ]);

        $user_id = $request->input('user_id');
        $file = $request->file('file');

        $nama_file = rand() . $file->getClientOriginalName();


        $file->move('file_import', $nama_file);

        Excel::import(new ActivityImport($user_id), public_path('/file_import/' . $nama_file));

        Alert::success('Success', 'Data Excel telah berhasil di Import');
        return redirect('/toll');
    }

    public function export_excel()
    {
        return Excel::download(new ActivityExportAll, 'Activity.xlsx');
    }

    public function exportData(Request $request)
    {
        $fromDate = $request->input('from_date');
        $toDate = $request->input('to_date');

        $data = Activity::whereBetween('tanggal', [$fromDate, $toDate])->get();

        return Excel::download(new ActivityExport($data), 'data.xlsx');
    }
}
