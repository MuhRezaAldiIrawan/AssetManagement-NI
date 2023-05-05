<?php

namespace App\Exports;

use App\Models\Activity;
use Maatwebsite\Excel\Concerns\FromCollection;

class ActivityExportAll implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Activity::all();
    }
}
