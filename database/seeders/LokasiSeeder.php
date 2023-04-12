<?php

namespace Database\Seeders;

use App\Models\Lokasi;
use Illuminate\Database\Seeder;

class LokasiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $lokasi = [
                [
                    'id' => '1',
                    'nama' => 'Bira Barat',
                    'singkatan' => 'BRB'
                ],
                [
                    'id' => '2',
                    'nama' => 'GTO 1 Bira Barat',
                    'singkatan' => 'BRB01'
                ],
                [
                    'id' => '3',
                    'nama' => 'Bira Barat GRD 02',
                    'singkatan' => 'BRB02'
                ],
                [
                    'id' => '4',
                    'nama' => 'Bira Barat Plaza',
                    'singkatan' => 'BRBPCS'
                ],
                [
                    'id' => '5',
                    'nama' => 'Bira Barat RTM',
                    'singkatan' => 'BRBRTM'
                ],
                [
                    'id' => '6',
                    'nama' => 'Gardu dan Plaza BRK',
                    'singkatan' => 'BRK'
                ],
                [
                    'id' => '7',
                    'nama' => 'GTO 1 Biringkanaya',
                    'singkatan' => 'BRK01'
                ],
                [
                    'id' => '8',
                    'nama' => 'GTO 2 Biringkanaya',
                    'singkatan' => 'BRK02'
                ],
                [
                    'id' => '9',
                    'nama' => 'GTO 3 Biringkanaya',
                    'singkatan' => 'BRK03'
                ],
                [
                    'id' => '10',
                    'nama' => 'GRD 4 Biringkanaya',
                    'singkatan' => 'BRK04'
                ],
                [
                    'id' => '11',
                    'nama' => 'GRD 5 Biringkanaya',
                    'singkatan' => 'BRK05'
                ],
                [
                    'id' => '12',
                    'nama' => 'PCS Biringkanaya',
                    'singkatan' => 'BRKPCS'
                ],
                [
                    'id' => '13',
                    'nama' => 'RTM Biringkanay',
                    'singkatan' => 'BRKRTM'
                ],
                [
                    'id' => '14',
                    'nama' => 'Bira Timur',
                    'singkatan' => 'BRT'
                ],
                [
                    'id' => '15',
                    'nama' => 'GTO 1 Bira Timur',
                    'singkatan' => 'BRT01'
                ],
                [
                    'id' => '16',
                    'nama' => 'GTO 02 Bira Timur',
                    'singkatan' => 'BRT02'
                ],
                [
                    'id' => '17',
                    'nama' => 'Gardu 03 Bira Timur',
                    'singkatan' => 'BRT03'
                ],
                [
                    'id' => '18',
                    'nama' => 'PCS Bira Timur',
                    'singkatan' => 'BRTPCS'
                ],
                [
                    'id' => '19',
                    'nama' => 'RTM Bira Timur',
                    'singkatan' => 'BRTRTM'
                ],
                [
                    'id' => '20',
                    'nama' => 'Cambaya',
                    'singkatan' => 'CBY'
                ],
                [
                    'id' => '21',
                    'nama' => 'GTO 1 Cambaya',
                    'singkatan' => 'CBY01'
                ],
                [
                    'id' => '22',
                    'nama' => 'GTO 2 Cambaya',
                    'singkatan' => 'CBY02'
                ],
                [
                    'id' => '23',
                    'nama' => 'GRD3 CAMBAYA',
                    'singkatan' => 'CBY03'
                ],
                [
                    'id' => '24',
                    'nama' => 'GRD4 CAMBAYA',
                    'singkatan' => 'CBY04'
                ],
                [
                    'id' => '25',
                    'nama' => 'GTO 5 Cambaya',
                    'singkatan' => 'CBY05'
                ],
                [
                    'id' => '26',
                    'nama' => 'Plaza Pelaporan SPT dan ATB2 c',
                    'singkatan' => 'CBYPCS'
                ],
                [
                    'id' => '27',
                    'nama' => 'Real Time Monitoring Cambaya',
                    'singkatan' => 'CBYRTM'
                ],
                [
                    'id' => '28',
                    'nama' => 'Pemasangan GTO',
                    'singkatan' => 'GTO'
                ],
                [
                    'id' => '29',
                    'nama' => 'Semua Gardu JTSE',
                    'singkatan' => 'JTSE'
                ],
                [
                    'id' => '30',
                    'nama' => 'Kaluku Bodoa',
                    'singkatan' => 'KLB'
                ],
                [
                    'id' => '32',
                    'nama' => 'GTO 2 Kaluku Bodoa',
                    'singkatan' => 'KLB02'
                ],
                [
                    'id' => '33',
                    'nama' => 'Kalbod Gardu 03',
                    'singkatan' => 'KLB03'
                ],
                [
                    'id' => '34',
                    'nama' => 'Kalbod Gardu 04',
                    'singkatan' => 'KLB04'
                ],
                [
                    'id' => '35',
                    'nama' => 'GTO 5 Kaluku Bodoa',
                    'singkatan' => 'KLB05'
                ],
                [
                    'id' => '36',
                    'nama' => 'Plaza Pelaporan SPT dan ATB2 k',
                    'singkatan' => 'KLBPCS'
                ],
                [
                    'id' => '37',
                    'nama' => 'RTM Kalbod',
                    'singkatan' => 'KLBRTM'
                ],
                [
                    'id' => '38',
                    'nama' => 'Lalin',
                    'singkatan' => 'LLN'
                ],
                [
                    'id' => '39',
                    'nama' => 'Semua Gardu MMN',
                    'singkatan' => 'MMN'
                ],
                [
                    'id' => '40',
                    'nama' => 'Gerbang MMN-JTSE',
                    'singkatan' => 'MMN-JTS'
                ],
                [
                    'id' => '41',
                    'nama' => 'Menara',
                    'singkatan' => 'MNR'
                ],
                [
                    'id' => '42',
                    'nama' => 'PPT',
                    'singkatan' => 'PPT'
                ],
                [
                    'id' => '43',
                    'nama' => 'Parangloe',
                    'singkatan' => 'PRL'
                ],
                [
                    'id' => '44',
                    'nama' => 'GTO 1 Parangloe',
                    'singkatan' => 'PRL01'
                ],
                [
                    'id' => '45',
                    'nama' => 'GRD2 Parangloe',
                    'singkatan' => 'PRL02'
                ],
                [
                    'id' => '46',
                    'nama' => 'GRD3 Parangloe',
                    'singkatan' => 'PRL03'
                ],
                [
                    'id' => '47',
                    'nama' => 'GTO 4 Ramp Parangloe',
                    'singkatan' => 'PRL04'
                ],
                [
                    'id' => '48',
                    'nama' => 'GRD5 Parangloe',
                    'singkatan' => 'PRL05'
                ],
                [
                    'id' => '49',
                    'nama' => 'GTO 6 Parangloe',
                    'singkatan' => 'PRL06'
                ],
                [
                    'id' => '50',
                    'nama' => ' Gardu 07 Parangloe',
                    'singkatan' => 'PRL07'
                ],
                [
                    'id' => '51',
                    'nama' => 'Gardu 08 Parangloe',
                    'singkatan' => 'PRL08'
                ],
                [
                    'id' => '52',
                    'nama' => 'PCS Parangloe',
                    'singkatan' => 'PRLPCS'
                ],
                [
                    'id' => '53',
                    'nama' => 'RTM Parangloe',
                    'singkatan' => 'PRLRTM'
                ],
                [
                    'id' => '54',
                    'nama' => 'Tol Seksi tiga',
                    'singkatan' => 'SKSTIGA'
                ],
                [
                    'id' => '55',
                    'nama' => 'Tallo Barat',
                    'singkatan' => 'TLB'
                ],
                [
                    'id' => '56',
                    'nama' => 'GTO 1 Tallo Barat',
                    'singkatan' => 'TLB01'
                ],
                [
                    'id' => '57',
                    'nama' => 'Tallo Barat GRD 02',
                    'singkatan' => 'TLB02'
                ],
                [
                    'id' => '58',
                    'nama' => 'Tallo Barat pcs',
                    'singkatan' => 'TLBPCS'
                ],
                [
                    'id' => '59',
                    'nama' => 'Tallo Barat rtm',
                    'singkatan' => 'TLBRTM'
                ],
                [
                    'id' => '60',
                    'nama' => 'Tallo Timur',
                    'singkatan' => 'TLT'
                ],
                [
                    'id' => '61',
                    'nama' => 'GTO 1 Tallo Timur',
                    'singkatan' => 'TLT01'
                ],
                [
                    'id' => '62',
                    'nama' => 'Tallo Timur GRD 02',
                    'singkatan' => 'TLT02'
                ],
                [
                    'id' => '63',
                    'nama' => 'Tallo Timur pcs',
                    'singkatan' => 'TLTPCS'
                ],
                [
                    'id' => '64',
                    'nama' => 'Tallo Timur RTM',
                    'singkatan' => 'TLTRTM'
                ],
                [
                    'id' => '65',
                    'nama' => 'Tol Layang',
                    'singkatan' => 'TLY'
                ],
                [
                    'id' => '66',
                    'nama' => 'Gardu dan Plaza TMA',
                    'singkatan' => 'TMA'
                ],
                [
                    'id' => '67',
                    'nama' => 'GTO 1 Tamalanrea',
                    'singkatan' => 'TMA01'
                ],
                [
                    'id' => '68',
                    'nama' => 'GTO 2 Tamalanrea',
                    'singkatan' => 'TMA02'
                ],
                [
                    'id' => '69',
                    'nama' => 'GTO 3 Tamalanrea',
                    'singkatan' => 'TMA03'
                ],
                [
                    'id' => '70',
                    'nama' => 'GTO 4 Tamalanrea',
                    'singkatan' => 'TMA04'
                ],
                [
                    'id' => '71',
                    'nama' => 'Tamalanrea GRD 05',
                    'singkatan' => 'TMA05'
                ],
                [
                    'id' => '72',
                    'nama' => 'Tamalanrea GRD 06',
                    'singkatan' => 'TMA06'
                ],
                [
                    'id' => '73',
                    'nama' => 'Gardu 07 Tamalanrea',
                    'singkatan' => 'TMA07'
                ],
                [
                    'id' => '74',
                    'nama' => 'PCS Tamalanrea',
                    'singkatan' => 'TMAPCS'
                ],
                [
                    'id' => '75',
                    'nama' => 'RTM Tamalanrea',
                    'singkatan' => 'TMARTM'
                ],
                [
                    'id' => '76',
                    'nama' => 'Workshop IT',
                    'singkatan' => 'WKS_IT'
                ],
                [
                    'id' => '78',
                    'nama' => 'Kantor OPS Cambaya',
                    'singkatan' => 'KCBY'
                ],
                [
                    'id' => '79',
                    'nama' => 'Kantor OPS Lalin',
                    'singkatan' => 'KLLN'
                ],
                [
                    'id' => '80',
                    'nama' => 'Kantor Proyek',
                    'singkatan' => 'KPRY'
                ],
                [
                    'id' => '81',
                    'nama' => 'Kantor Menara',
                    'singkatan' => 'KMNR'
                ]
        
        ];
        Lokasi::insert($lokasi);
    }
}
