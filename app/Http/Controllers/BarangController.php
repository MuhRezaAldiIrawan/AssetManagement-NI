<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barang;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\BarangExport;


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
        $pagination1 = 10;
        $pagination2 = 10;
        $logbarangmasuk = DB::table('log_activity_barangs')->where('activity', 'masuk')->latest('tanggal')->paginate($pagination1);
        $logbarangkeluar = DB::table('log_activity_barangs')->where('activity', 'keluar')->latest('tanggal')->paginate($pagination2);

        foreach ($logbarangmasuk as $barang) {
            $barang->tanggal = Carbon::parse($barang->tanggal)->format('d F Y');
        }

        foreach ($logbarangkeluar as $barang) {
            $barang->tanggal = Carbon::parse($barang->tanggal)->format('d F Y');
        }


        return view('pages.barang.logbarang', ['logbarangmasuk' => $logbarangmasuk, 'logbarangkeluar' => $logbarangkeluar], compact('title'))->with('i_masuk', ($request->input('page', 1) - 1) *  $pagination1)->with('i_keluar', ($request->input('page', 1) - 1) *  $pagination2);
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

    public function import_excel(Request $request)
    {
        $file = $request->file('file');
        $data = Excel::toArray([], $file);

        if (count($data) > 0) {
            foreach ($data[0] as $key => $row) {
                if ($key == 0) continue;

                // validate each column value
                if (!isset($row[1]) || !isset($row[2]) || !isset($row[3]) || !isset($row[4])) {
                    // handle missing column value
                    continue;
                }
                $nama_equipment = $row[1];
                $unit = $row[2];
                $merk = $row[3];
                $stock_baru = $row[4];

                $product = DB::table('barangs')
                    ->where('nama_equipment', $nama_equipment)
                    ->where('unit', $unit)
                    ->first();

                if ($product) {
                    // jika nama_equipmen dan unit sudah ada di database, tambahkan stok baru
                    $product->stock += $stock_baru;
                    DB::table('barangs')->where('id', $product->id)->update(['unit' => $unit, 'merk' => $merk, 'stock' => $product->stock]);
                } else {
                    // jika nama_equipmen dan unit belum ada di database, insert data baru
                    DB::table('barangs')->insert(['nama_equipment' => $nama_equipment, 'unit' => $unit, 'merk' => $merk, 'stock' => $stock_baru]);
                }
            }
        }

        return redirect()->back()->with('success', 'Data berhasil diimport.');
    }

    public function export_excel()
	{
		return Excel::download(new BarangExport, 'List Barang.xlsx');
	}
}
