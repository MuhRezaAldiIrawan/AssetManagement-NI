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
                            <td>FO-MMN-MIS-02-03</td>
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
                        <td></td>
                    </tr>
                </table>
            </td>
            <tr>
                <td>
                    <table width=100%>
                        <tr>
                            <td width=38%>No. Revisi </td>
                            <td width=5%>:</td>
                            <td style="overflow: hidden;">05</td>
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
            <td style="vertical-align: middle;" width="25%"> 
                I <input type="checkbox" id="shift" name="shift" value="shift"  @if($activity->kategori_activity == 'shift') checked @endif> &nbsp;
                II <input type="checkbox" id="shift" name="shift" value="shift"  @if($activity->kategori_activity == 'shift') checked @endif> &nbsp;
                III<input type="checkbox" id="shift" name="shift" value="shift"  @if($activity->kategori_activity == 'shift') checked @endif>
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
                <tr>
                    <td></td>
                    <td><input type="checkbox" id="PC/Laptop" name="PC/Laptop" value="PC/Laptop" @if(in_array('PC/Laptop', explode(',', $activity->j_hardware ?? ''))){{ 'checked' }}@endif>PC/Laptop</td>
                    <td align="center"><input type="checkbox" id="PC/Laptop" name="j_hardware[]" value="PC/Laptop" @if(in_array('PC/Laptop', explode(',', $activity->j_hardware ?? ''))){{ 'checked' }}@endif></td>
                    <td rowspan="6" style="vertical-align: top;">{{ $activity->u_hardware }}</td>
                </tr>
                <tr>
                    <td></td>
                    <td><input type="checkbox" id="Server" name="Server" value="Server"  @if(in_array('Server', explode(',', $activity->j_hardware ?? ''))){{ 'checked' }}@endif> Server</td>
                    <td align="center"><input type="checkbox" id="Server" name="Server" value="Server"  @if(in_array('Server', explode(',', $activity->j_hardware ?? ''))){{ 'checked' }}@endif></td>
                </tr>
                <tr>
                    <td></td>
                    <td><input type="checkbox" id="Printer/Periferal" name="Printer/Periferal" value="Printer/Periferal"  @if(in_array('Printer/Periferal', explode(',', $activity->j_hardware ?? ''))){{ 'checked' }}@endif> Printer/Periferial</td>
                    <td align="center"><input type="checkbox" id="Printer/Periferal" name="Printer/Periferal" value="Printer/Periferal"  @if(in_array('Printer/Periferal', explode(',', $activity->j_hardware ?? ''))){{ 'checked' }}@endif></td>
                </tr>
                <tr>
                    <td></td>
                    <td><input type="checkbox" id="Internet/Jaringan" name="Internet/Jaringan" value="Internet/Jaringan" @if(in_array('Internet/Jaringan', explode(',', $activity->j_hardware ?? ''))){{ 'checked' }}@endif > Internet/Jaringan</td>
                    <td align="center"><input type="checkbox" id="Internet/Jaringan" name="Internet/Jaringan" value="Internet/Jaringan" @if(in_array('Internet/Jaringan', explode(',', $activity->j_hardware ?? ''))){{ 'checked' }}@endif></td>
                </tr>
                <tr>
                    <td></td>
                    <td><input type="checkbox" id="LTCS/TFI/PCS/RTM/CCTV" name="LTCS/TFI/PCS/RTM/CCTV" value="LTCS/TFI/PCS/RTM/CCTV"  @if(in_array('LTCS/TFI/PCS/RTM/CCTV', explode(',', $activity->j_hardware ?? ''))){{ 'checked' }}@endif > LTCS/TFI/PCS/RTM/CCTV</td>
                    <td align="center"><input type="checkbox" id="LTCS/TFI/PCS/RTM/CCTV" name="LTCS/TFI/PCS/RTM/CCTV" value="LTCS/TFI/PCS/RTM/CCTV"   @if(in_array('LTCS/TFI/PCS/RTM/CCTV', explode(',', $activity->j_hardware ?? ''))){{ 'checked' }}@endif></td>
                </tr>
                <tr>
                    <td></td>
                    <td><input type="checkbox" id="Lainnya" name="Lainnya" value="Lainnya"
                            @if (in_array('Lainnya', explode(',', $activity->j_hardware ?? ''))) {{ 'checked' }} @endif>Lainnya</td>
                    <td align="center"><input type="checkbox" id="Lainnya" name="Lainnya" value="Lainnya"
                            @if (in_array('Lainnya', explode(',', $activity->j_hardware ?? ''))) {{ 'checked' }} @endif></td>
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
                <td><input type="checkbox" id="Sistem Operasi" name="Sistem Operasi" value="Sistem Operasi"  @if(in_array('Sistem Operasi', explode(',', $activity->s_aplikasi ?? ''))){{ 'checked' }}@endif> Operating System</td>
                <td align="center"><input type="checkbox" id="Sistem Operasi" name="Sistem Operasi" value="Sistem Operasi"  @if(in_array('Sistem Operasi', explode(',', $activity->s_aplikasi ?? ''))){{ 'checked' }}@endif></td>
                <td rowspan="6" style="vertical-align: top;">{{ $activity->u_aplikasi }}</td>
            </tr>
            <tr>
                <td></td>
                <td><input type="checkbox" id="Microsoft Office" name="Microsoft Office" value="Microsoft Office" @if(in_array('Microsoft Office', explode(',', $activity->s_aplikasi ?? ''))){{ 'checked' }}@endif > Open Office (word/excel/power poin)</td>
                <td align="center"><input type="checkbox"  id="Microsoft Office" name="Microsoft Office" value="Microsoft Office"  @if(in_array('Microsoft Office', explode(',', $activity->s_aplikasi ?? ''))){{ 'checked' }}@endif></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="checkbox" id="Lainnya" name="Lainnya" value="Lainnya"
                        @if (in_array('Lainnya', explode(',', $activity->s_aplikasi ?? ''))) {{ 'checked' }} @endif> Lainnya</td>
                <td align="center"><input type="checkbox" id="Lainnya" name="Lainnya" value="Lainnya"
                        @if (in_array('Lainnya', explode(',', $activity->s_aplikasi ?? ''))) {{ 'checked' }} @endif></td>
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
                <td><input type="checkbox" id="Program LTCS/TFI" name="Program LTCS/TFI" value="Program LTCS/TFI"  @if(in_array('Program LTCS/TFI', explode(',', $activity->a_it ?? ''))){{ 'checked' }}@endif  > Program LTCS/TFI</td>
                <td align="center"><input type="checkbox" id="Program LTCS/TFI" name="Program LTCS/TFI" value="Program LTCS/TFI"  @if(in_array('Program LTCS/TFI', explode(',', $activity->a_it ?? ''))){{ 'checked' }}@endif ></td>
                <td rowspan="6" style="vertical-align: top;">{{ $activity->u_it }}</td>
            </tr>
            <tr>
                <td></td>
                <td><input type="checkbox" id="Program PCS" name="Program PCS" value="Program PCS"    @if(in_array('Program PCS', explode(',', $activity->a_it ?? ''))){{ 'checked' }}@endif> Program PCS</td>
                <td align="center"><input type="checkbox" id="Program PCS" name="Program PCS" value="Program PCS"    @if(in_array('Program PCS', explode(',', $activity->a_it ?? ''))){{ 'checked' }}@endif></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="checkbox" id="Program RTM" name="Program RTM" value="Program RTM"    @if(in_array('Program RTM', explode(',', $activity->a_it ?? ''))){{ 'checked' }}@endif> Program RTM</td>
                <td align="center"><input type="checkbox" id="Program RTM" name="Program RTM" value="Program RTM"    @if(in_array('Program RTM', explode(',', $activity->a_it ?? ''))){{ 'checked' }}@endif></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="checkbox" id="Program CCTV/VMS" name="Program CCTV/VMS" value="Program CCTV/VMS"    @if(in_array('Program CCTV/VMS', explode(',', $activity->a_it ?? ''))){{ 'checked' }}@endif> Program CCTV/VMS</td>
                <td align="center"><input type="checkbox"  id="Program CCTV/VMS" name="Program CCTV/VMS" value="Program CCTV/VMS"    @if(in_array('Program CCTV/VMS', explode(',', $activity->a_it ?? ''))){{ 'checked' }}@endif></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="checkbox" id="Lainnya" name="Lainnya" value="Lainnya"
                        @if (in_array('Lainnya', explode(',', $activity->a_it ?? ''))) {{ 'checked' }} @endif>Lainnya</td>
                <td align="center"><input type="checkbox" id="Lainnya" name="Lainnya" value="Lainnya"
                        @if (in_array('Lainnya', explode(',', $activity->a_it ?? ''))) {{ 'checked' }} @endif></td>
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
            <th width=25%>User</th>
        </thead>
        <tbody>
            <tr height="100px">
                <th width="25%"><img style="width: 100px;" src="{{ asset('img/ttd/625520090e70c.png') }}" alt=""></th>
                <th width="25%"><img style="width: 100px;" src="{{ asset('img/ttd/626b0a3ec261f.png') }}" alt=""></th>
                <th width="25%"><img style="width: 100px;" src="{{ asset('img/ttd/626b0a3ec261f.png') }}" alt=""></th>
            </tr>
            <tr>
                <th width=25%>Nama : Mahuri Said</th>
                <th width=25%>Nama : Anwar</th>
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
