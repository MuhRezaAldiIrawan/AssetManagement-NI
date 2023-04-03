<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="dist/css/pint.css"> -->
    <title>Document</title>
</head>

<body>
    <table border="1" align="center" width=100%>
        <thead>
            <tr>
                <td rowspan="3" width=20% align="center"><img width="90%" src="{{ asset('img/Logo/mun.png') }}"
                        alt=""></td>
                <td style="text-align:center" width="45%">
                    <h3>FORMULIR</h3>
                </td>
                <td width=25%>
                    <table width=100%>
                        <tr>
                            <td width=38%>No. Dok </td>
                            <td width=5%>:</td>
                            <td>FO/MIS/02/04</td>
                        </tr>
                    </table>
                </td>
            </tr>
            <td rowspan="2" style="text-align:center; ">
                <h3>LOG MAINTENANCE </h3>
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
                            <td style="overflow: hidden;">00</td>
                        </tr>
                    </table>
                </td>
            </tr>
        </thead>
    </table>
    <br>



    PERIODE :
    <table border="1" width=100%>
        <thead>
            <tr align="center" style="background-color: gray;">
                <th rowspan="2" width="2%">NO</th>
                <th rowspan="2" width="15%">USER / NAMA BARANG</th>
                <th rowspan="2" width="10%" align="center">JENIS KERUSAKAN</th>
                <th rowspan="2" width="40%">PERBAIKAN YANG DILAKUKAN</th>
                <th colspan="2" align="center">TANGGAL</th>
                <th rowspan="2" align="center">PEMERIKSA</th>
            </tr>
            <tr align="center" style="background-color: gray;">
                <td width="10%">DITERIMA IT</td>
                <td width="10%">KEMBALI</td>
            </tr>
        </thead>
        @php $i=1 @endphp
        @foreach ($printactivity as $l)
            <tbody>
                <td>{{ $i++ }}</td>
                <td>
                    @foreach(explode(',', $l->j_hardware) as $hardware)
                    {{$hardware}} <br>
                @endforeach
                </td>
                <td>{{ $l->kategori }}</td>
                <td>{{ $l->u_hardware }}</td>
                <td></td>
                <td></td>
                <td>{{ $l->user_id }}</td>
            </tbody>
        @endforeach
    </table>
    <br>

    <br>
    <table border="0" width=100%>
        <tbody>
            <tr height="70px" style="vertical-align: top;">
                <td style="overflow: hidden;" align="left" width=100%>
                    Makassar,
                    <p>Dicheck Oleh</p>
                    <img src="{{ asset('img/ttd/625520090e70c.png') }}" alt="" width="15%">
                    <p>( IT & Develovpment )</p>
            </tr>
        </tbody>
    </table>
</body>

</html>
