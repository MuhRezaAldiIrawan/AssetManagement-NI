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


    //End User Controllers

    //External Command
    public function printactivity()
    {
        $title = 'MUN | Dashboard';

        return view('pages.activity.subpages.printactivity', compact('title'));
    }

    // public function cari(Request $request)
    // {

    //     dd($request);
    //     $cari = $request->cari;

    //     $toll = DB::table('activities')->where('lokasi', 'like', "%" . $request->cari . "%")->paginate();

    //     return view('index', ['toll' => $toll]);
    // }

    //Barang


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
