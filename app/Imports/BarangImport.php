<?php

namespace App\Imports;

use App\Models\Barang;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class BarangImport implements ToModel, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        $barang = Barang::where('nama_equipment', $row['nama_equipment'])->first();
        if ($barang) {
            $barang->stock = $row['stock'];
            $barang->save();
        } else {
            $barang = new Barang([
                'nama_equipment' => $row['nama_equipment'],
                'unit' => $row['unit'],
                'merk' => $row['merk'],
                'stock' => $row['stock']
            ]);
            $barang->save();
        }
        return $barang;
    }
}
