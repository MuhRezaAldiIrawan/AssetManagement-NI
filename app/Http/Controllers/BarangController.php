<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barang;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class BarangController extends Controller
{
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
        $pagination = 10;
        $logbarang = DB::table('log_activity_barangs')->paginate($pagination);

        return view('pages.barang.logbarang', ['logbarang' => $logbarang], compact('title'))->with('i', ($request->input('page', 1) - 1) *  $pagination);
    }

    public function updatestock(Request $request, $id)
    {
        // dd($request);
        $product = Barang::find($id);
        $product->stock += $request->input('stock');
        $product->save();

        toast('Stock Berhasil ditambahkan', 'success');
        return redirect('/listbarang');
    }

    public function minusstock(Request $request, $id)
    {
        // dd($request);
        $product = Barang::find($id);
        $product->stock -= $request->input('stock');
        $product->save();

        toast('Stock Berhasil dikurangkan', 'success');
        return redirect('/listbarang');
    }

    public function print_listbarang(Request $request)
    {
        $title = 'Print Page';

        $date = Carbon::now()->format('d-m-Y');
        $listbarang = DB::table('barangs')->get();

        return view('pages.barang.printlistbarang', ['listbarang' => $listbarang, 'date' => $date], compact('title'))->with('i', ($request->input('page', 1) - 1));
    }
}
