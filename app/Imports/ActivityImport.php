<?php

namespace App\Imports;

use App\Models\Activity;
use Maatwebsite\Excel\Concerns\ToModel;
// use Carbon;
use Carbon\Carbon;
// use App\Imports\ToModel;

class ActivityImport implements ToModel
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
            'kategori_activity' => $row[1],
            'tanggal' => Carbon::parse($row[2])->format('Y-m-d H:i:s'), 
            'j_hardware' => $row[3], 
            'u_hardware' => $row[4],
            'gto ' => $row[5], 
            'u_gto' => $row[6], 
            's_aplikasi' => $row[7],
            'u_aplikasi' => $row[8], 
            'a_it' => $row[9], 
            'u_it' => $row[10],
            'catatan' => $row[11], 
            'shift' => $row[12], 
            'lokasi' => $row[13],
            'kategori' => $row[14], 
            'kondisi_akhir' => $row[15], 
            'biaya' => $row[16],
            'status' => $row[17],
        ]);
    }
}
