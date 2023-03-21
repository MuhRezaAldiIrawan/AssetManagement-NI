<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    use HasFactory;

                /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'kategori_activity',
        'tanggal',
        'j_hardware',
        'u_hardware',
        's_aplikasi',
        'u_aplikasi',
        'a_it',
        'u_it',
        'catatan',
        'shift',
        'lokasi',
        'kategori',
        'kondisi_akhir',
        'foto',
        'status',
        

    ];

    public function lokasi()
    {
    	return $this->belongsTo(Lokasi::class);
    }

    public function kategori()
    {
    	return $this->belongsTo(Kategori::class);
    }


    
}
