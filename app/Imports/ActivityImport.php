<?php

namespace App\Imports;

use App\Models\Activity;
use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Support\Carbon;
// use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\WithHeadingRow;


class ActivityImport implements ToModel,WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    
    public function model(array $row)
    {
        $user = auth()->user();
        return new Activity([
            'user_id'=> $user->id,
            'kategori_activity' => $row['kategori_activity'],    
            'tanggal' => \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row[ 'tanggal']),
            'j_hardware' => $row['j_hardware'], 
            'u_hardware' => $row[ 'u_hardware'],
            'gto' => $row['gto'], 
            'u_gto' => $row['u_gto'], 
            's_aplikasi' => $row['s_aplikasi'],
            'u_aplikasi' => $row['u_aplikasi'], 
            'a_it' => $row['a_it'], 
            'u_it' => $row['u_it'],
            'catatan' => $row['catatan'], 
            'shift' => $row['shift'], 
            'lokasi' => $row['lokasi'],
            'kategori' => $row['kategori'], 
            'kondisi_akhir' => $row['kondisi_akhir'], 
            'biaya' => $row['biaya'],
            'status' => $row['status'],
        ]);
    }
}
