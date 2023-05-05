<?php

namespace App\Exports;

use App\Models\Activity;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;


class ActivityExport implements FromCollection, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */
    protected $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function collection()
    {
        return collect($this->data);
    }

    public function headings(): array
    {
        return [
            'No',
            'User ID',
            'Kategori Activity',
            'Tanggal',
            'Jenis Hardware',
            'Uraian Hardware',
            'GTO',
            'Uraian GTO',
            'Standart Aplikasi',
            'Uraian Standart Aplikasi',
            'Aplikasi IT',
            'Uraian Aplikasi IT',
            'Catatan',
            'Shift',
            'Lokasi',
            'Kategori',
            'Kondisi Akhir',
            'Biaya',
            'Foto',
            'Status',
            'First Review',
            'Second Review',
            'First Approval',
            'Second Approval',
            'created_at',
            'updated_at',
        ];
    }
}
