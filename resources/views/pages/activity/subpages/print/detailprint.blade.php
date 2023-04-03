<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

{{-- <body onload="window.print()"> --}}

<body>
    <table border="1" align="center" width=100%>
        <thead>
            <tr>
                <td rowspan="3" width=25% align="center"><img width="90%" src="{{ asset('img/Logo/mun.png') }}"
                        alt=""></td>
                <td style="text-align:center" width="45%">
                    <h3>FORMULIR</h3>
                </td>
                <td width=25%>
                    <table width=100%>
                        <tr>
                            <td width=38%>No. Dok </td>
                            <td width=5%>:</td>
                            <td>FO/MIS/02/03</td>
                        </tr>
                    </table>
                </td>
            </tr>
            <td rowspan="2" style="text-align:center; ">
                <h3>FORM MAINTENANCE & PERMINTAAN PERBAIKAN </h3>
            </td>
            <td>
                <table width=100%>
                    <tr>
                        <td width=38%>Tgl Terbit </td>
                        <td width=5%>:</td>
                        <td>{{ $date->format('d F Y') }}</td>
                    </tr>
                </table>
            </td>
            <tr>
                <td>
                    <table width=100%>
                        <tr>
                            <td width=38%>No. Revisi </td>
                            <td width=5%>:</td>
                            <td style="overflow: hidden;">01</td>
                        </tr>
                    </table>
                </td>
            </tr>
        </thead>
    </table>
    <br>


    <table width=100% border="0">
        <tr>
            <td width="20%">Periode ( Diisi oleh IT)</td>
            <td width="5%"> : </td>
            <td style="vertical-align: middle;" width="25%"> I <input type="checkbox"> &nbsp;II <input
                    type="checkbox">
                &nbsp;III
                <input type="checkbox">
                :
            </td>
        </tr>
        <tr>
            @foreach ($activitydetail as $activity)
    

            <td>Nama Lengkap (user)</td>
            <td> : </td>
            <td style="overflow: hidden;">
                <u> </u>{{ auth()->user()->nama }}
            </td>
            <td width="10%">Lokasi</td>
            <td> : </td>
            <td style="overflow: hidden;">
                <u></u>{{ $activity->lokasi }}
            </td>
            <td width="5%"> Ext: </td>
            <td>___________ </td>

        </tr>
        <tr>
            <td>Departemen/Shift</td>
            <td> : </td>
            <td style="overflow: hidden;"><u></u>{{ $activity->shift }}</td>
            <td>Jabatan</td>
            <td> : </td>
            <td style="overflow: hidden;"><u></u>{{ auth()->user()->jabatan }}</td>
        </tr>
        @endforeach

    </table>

    @foreach ($activitydetail as $activity)
    Hardware: 
    <input type="checkbox" id="Toll" name="Toll" value="Toll"  @if($activity->kategori_activity == 'Toll') checked @endif> &nbsp;Tol 
    <input type="checkbox" id="NonToll" name="NonToll" value="NonToll" @if($activity->kategori_activity == 'NonToll') checked @endif>&nbsp;Non Tol
    <table border="1" width=100%>
        <thead>
            <tr align="left">
                <th align="center" width="2%"><input type="checkbox"></th>
                <th width="30%">Jenis Hadware</th>
                <th align="center" width="10%">Kondisi</th>
                <th><input type="checkbox"> Mohon dijabarkan Permasalahan (di isi oleh user)</th>
            </tr>
            @php
                $j_hardware = json_decode($activitydetail[0]->j_hardware);
                $s_aplikasi = json_decode($activitydetail[0]->s_aplikasi);
                $a_it = json_decode($activitydetail[0]->a_it);
            @endphp
          
                <tr>
                    <td></td>
                    <td><input type="checkbox" id="PC/Laptop" name="PC/Laptop" value="PC/Laptop"
                            {{ in_array('PC/Laptop', $j_hardware) ? 'checked' : '' }}>PC/Laptop</td>
                    <td align="center"><input type="checkbox" id="PC/Laptop" name="j_hardware[]" value="PC/Laptop" {{ in_array('PC/Laptop', $j_hardware) ? 'checked' : '' }}></td>
                    <td rowspan="6" style="vertical-align: top;">{{ $activity->u_hardware }}</td>
                </tr>
                <tr>
                    <td></td>
                    <td><input type="checkbox" id="Server" name="Server" value="Server"  {{ in_array('Server', $j_hardware) ? 'checked' : '' }}> Server</td>
                    <td align="center"><input type="checkbox" id="Server" name="Server" value="Server"  {{ in_array('Server', $j_hardware) ? 'checked' : '' }}></td>
                </tr>
                <tr>
                    <td></td>
                    <td><input type="checkbox" id="Printer/Periferal" name="Printer/Periferal" value="Printer/Periferal"  {{ in_array('Printer/Periferal', $j_hardware) ? 'checked' : '' }}> Printer/Periferial</td>
                    <td align="center"><input type="checkbox" id="Printer/Periferal" name="Printer/Periferal" value="Printer/Periferal"  {{ in_array('Printer/Periferal', $j_hardware) ? 'checked' : '' }}></td>
                </tr>
                <tr>
                    <td></td>
                    <td><input type="checkbox" id="Internet/Jaringan" name="Internet/Jaringan" value="Internet/Jaringan"  {{ in_array('Internet/Jaringan', $j_hardware) ? 'checked' : '' }}> Internet/Jaringan</td>
                    <td align="center"><input type="checkbox" id="Internet/Jaringan" name="Internet/Jaringan" value="Internet/Jaringan"  {{ in_array('Internet/Jaringan', $j_hardware) ? 'checked' : '' }}></td>
                </tr>
                <tr>
                    <td></td>
                    <td><input type="checkbox" id="LTCS/TFI/PCS/RTM/CCTV" name="LTCS/TFI/PCS/RTM/CCTV" value="LTCS/TFI/PCS/RTM/CCTV"  {{ in_array('LTCS/TFI/PCS/RTM/CCTV', $j_hardware) ? 'checked' : '' }}> LTCS/TFI/PCS/RTM/CCTV</td>
                    <td align="center"><input type="checkbox" id="LTCS/TFI/PCS/RTM/CCTV" name="LTCS/TFI/PCS/RTM/CCTV" value="LTCS/TFI/PCS/RTM/CCTV"  {{ in_array('LTCS/TFI/PCS/RTM/CCTV', $j_hardware) ? 'checked' : '' }}></td>
                </tr>
                <tr>
                    <td></td>
                    <td><input type="checkbox"> ..............................</td>
                    <td align="center"><input type="checkbox"></td>
                </tr>
           
        </thead>
    </table>

    <br>

    
    Software: 
    <input type="checkbox" id="Toll" name="Toll" value="Toll"  @if($activity->kategori_activity == 'Toll') checked @endif> &nbsp;Tol 
    <input type="checkbox" id="NonToll" name="NonToll" value="NonToll" @if($activity->kategori_activity == 'NonToll') checked @endif>&nbsp;Non Tol
    <table border="1" width=100%>
        <thead>
            <tr align="left">
                <th align="center" width="2%"><input type="checkbox"></th>
                <th width="30%">Standar Aplikasi</th>
                <th align="center" width="10%">Kondisi</th>
                <th><input type="checkbox"> Mohon dijabarkan Permasalahan (di isi oleh user)</th>
            </tr>
            <tr>
                <td></td>
                <td><input type="checkbox" id="Sistem Operasi" name="Sistem Operasi" value="Sistem Operasi"  {{ in_array('Sistem Operasi', $s_aplikasi) ? 'checked' : '' }}> Operating System</td>
                <td align="center"><input type="checkbox" id="Sistem Operasi" name="Sistem Operasi" value="Sistem Operasi"  {{ in_array('Sistem Operasi', $s_aplikasi) ? 'checked' : '' }}></td>
                <td rowspan="6" style="vertical-align: top;">{{ $activity->u_aplikasi }}</td>
            </tr>
            <tr>
                <td></td>
                <td><input type="checkbox" id="Microsoft Office" name="Microsoft Office" value="Microsoft Office"  {{ in_array('Microsoft Office', $s_aplikasi) ? 'checked' : '' }}> Open Office (word/excel/power poin)</td>
                <td align="center"><input type="checkbox"  id="Microsoft Office" name="Microsoft Office" value="Microsoft Office"  {{ in_array('Microsoft Office', $s_aplikasi) ? 'checked' : '' }}></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="checkbox"> ..............................</td>
                <td align="center"><input type="checkbox"></td>
            </tr>
        </thead>
    </table>
    <br>

    <table border="1" width=100%>
        <thead>
            <tr align="left">
                <th align="center" width="2%"><input type="checkbox"></th>
                <th width="30%">Aplikasi IT & Peralatan Tol</th>
                <th align="center" width="10%">Kondisi</th>
                <th><input type="checkbox"> Mohon dijabarkan Permasalahan (di isi oleh user)</th>
            </tr>
            <tr>
                <td></td>
                <td><input type="checkbox" id="Program LTCS/TFI" name="Program LTCS/TFI" value="Program LTCS/TFI"  {{ in_array('Program LTCS/TFI', $a_it) ? 'checked' : '' }} > Program LTCS/TFI</td>
                <td align="center"><input type="checkbox" id="Program LTCS/TFI" name="Program LTCS/TFI" value="Program LTCS/TFI"  {{ in_array('Program LTCS/TFI', $a_it) ? 'checked' : '' }}></td>
                <td rowspan="6" style="vertical-align: top;">{{ $activity->u_it }}</td>
            </tr>
            <tr>
                <td></td>
                <td><input type="checkbox" id="Program PCS" name="Program PCS" value="Program PCS"  {{ in_array('Program PCS', $a_it) ? 'checked' : '' }}> Program PCS</td>
                <td align="center"><input type="checkbox" id="Program PCS" name="Program PCS" value="Program PCS"  {{ in_array('Program PCS', $a_it) ? 'checked' : '' }}></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="checkbox" id="Program RTM" name="Program RTM" value="Program RTM"  {{ in_array('Program RTM', $a_it) ? 'checked' : '' }}> Program RTM</td>
                <td align="center"><input type="checkbox" id="Program RTM" name="Program RTM" value="Program RTM"  {{ in_array('Program RTM', $a_it) ? 'checked' : '' }}></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="checkbox" id="Program CCTV/VMS" name="Program CCTV/VMS" value="Program CCTV/VMS"  {{ in_array('Program CCTV/VMS', $a_it) ? 'checked' : '' }}> Program CCTV/VMS</td>
                <td align="center"><input type="checkbox"  id="Program CCTV/VMS" name="Program CCTV/VMS" value="Program CCTV/VMS"  {{ in_array('Program CCTV/VMS', $a_it) ? 'checked' : '' }}></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="checkbox"> ..............................</td>
                <td align="center"><input type="checkbox"></td>
            </tr>
        </thead>
    </table>
    <br>

    @endforeach

    <table border="1" width=100%>
        <thead>
            <tr align="left">
                <th align="center" width="2%"><input type="checkbox"></th>
                <th>Catatan</th>
            </tr>
            <tr height="70px">
                <td style="vertical-align: top;" colspan="2">{{ $activity->catatan }}</td>
            </tr>
        </thead>
    </table>
    <br>

    <table border="1" width=100%>
        <thead>
            <th width=25%>*Mengetahui (Atasan IT)</th>
            <th width=25%>Pengecekan Oleh (IT)</th>
        </thead>
        <tbody>
            <tr height="100px">
                <th width="25%"><img style="width: 100px;" src="{{ asset('img/ttd/625520090e70c.png') }}" alt=""></th>
                <th width="25%"><img style="width: 100px;" src="{{ asset('img/ttd/626b0a3ec261f.png') }}" alt=""></th>
            </tr>
            <tr>
                <th width=25%>Nama : Mahuri Said</th>
                <th width=25%>Nama : Anwar</th>
            </tr>
        </tbody>
    </table>
    <br>
    <table border="0" width=100%>
        <tbody>
            <tr height="70px" style="vertical-align: top;">
                <td style="overflow: hidden;" align="left" width=100%>
                    Catatan : User dapat memilih kosong jika item kerusakan tidak terlist dalam form. Ext hanya diisi
                    untuk lokasi gerbang. User dapat memilih pilihan dengan memberi lingkaran pada opsi yang dimaksud
                    "*"
                    dapat diisi dihari dan jam operasional normal.</td>
            </tr>
        </tbody>
    </table>
</body>

</html>
