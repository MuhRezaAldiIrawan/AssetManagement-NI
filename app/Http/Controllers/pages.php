<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\Barang;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Hash;


use Barryvdh\DomPDF\Facade\PDF;

use App\Models\lokasi;
use App\Models\TollActivity;
use App\Models\User;



class pages extends Controller
{

    public function index()
    {
        $title = 'MUN | Dashboard';

        
        $jumlahactivity = Activity::all()->where('status', '=', 'pending')->count();

        $mayor = Activity::all()->where('kategori_id', '=', 'Kerusakan Mayor')->count();
        $perbaikan = Activity::all()->where('kategori_id', '=', 'Perbaikan')->count();
        $pergantian = Activity::all()->where('kategori_id', '=', 'Kerusakan/Pergantian')->count();
        $minor = Activity::all()->where('kategori_id', '=', 'Kerusakan Minor')->count();

        $lastMonth = date('Y-m-d', strtotime('first day of last month'));
        $thisMonth = date('Y-m-d', strtotime('first day of this month'));


        $stockLastMonthMayor = Activity::whereBetween('tanggal', [$lastMonth, $thisMonth])->where('kategori', '=', 'Kerusakan Mayor')->count('kategori');
        $stockThisMonthMayor = Activity::whereBetween('tanggal', [$thisMonth, now()])->where('kategori', '=', 'Kerusakan Mayor')->count('kategori');
        $stockDiffMayor = $stockThisMonthMayor - $stockLastMonthMayor;

        $stockLastMonthPerbaikan = Activity::whereBetween('tanggal', [$lastMonth, $thisMonth])->where('kategori', '=', 'Perbaikan')->count('kategori');
        $stockThisMonthPerbaikan = Activity::whereBetween('tanggal', [$thisMonth, now()])->where('kategori', '=', 'Perbaikan')->count('kategori');
        $stockDiffPerbaikan = $stockThisMonthPerbaikan - $stockLastMonthPerbaikan;

        $stockLastMonthPergantian = Activity::whereBetween('tanggal', [$lastMonth, $thisMonth])->where('kategori', '=', 'Kerusakan/Pergantian')->count('kategori');
        $stockThisMonthPergantian = Activity::whereBetween('tanggal', [$thisMonth, now()])->where('kategori', '=', 'Kerusakan/Pergantian')->count('kategori');
        $stockDiffPergantian = $stockThisMonthPergantian - $stockLastMonthPergantian;

        $stockLastMonthMinor = Activity::whereBetween('tanggal', [$lastMonth, $thisMonth])->where('kategori', '=', 'Kerusakan Minor')->count('kategori');
        $stockThisMonthMinor = Activity::whereBetween('tanggal', [$thisMonth, now()])->where('kategori', '=', 'Kerusakan Minor')->count('kategori');
        $stockDiffMinor = $stockThisMonthMinor - $stockLastMonthMinor;


        return view('pages.dashboard', compact('title'))->with([
            'mayor' => $mayor,
            'perbaikan' => $perbaikan,
            'pergantian' => $pergantian,
            'minor' => $minor,
            'jumlahactivity' => $jumlahactivity,

            'stockLastMonthMayor' => $stockLastMonthMayor,
            'stockThisMonthMayor' => $stockThisMonthMayor,
            'stockDiffMayor' => $stockDiffMayor,

            'stockLastMonthPerbaikan' => $stockLastMonthPerbaikan,
            'stockThisMonthPerbaikan' => $stockThisMonthPerbaikan,
            'stockDiffPerbaikan' => $stockDiffPerbaikan,

            'stockLastMonthPergantian' => $stockLastMonthPergantian,
            'stockThisMonthPergantian' => $stockThisMonthPergantian,
            'stockDiffPergantian' => $stockDiffPergantian,

            'stockLastMonthMinor' => $stockLastMonthMinor,
            'stockThisMonthMinor' => $stockThisMonthMinor,
            'stockDiffMinor' => $stockDiffMinor,


        ]);
    }


}
