
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


</head>


<body onload="window.print();">
    <table border="1" align="center" width=100% >
        <thead>
            <tr>
                <td rowspan="3" width=20% align="center"><img width="90%" src="{{ asset('img/Logo/mun.png') }}"
                        alt=""></td>
                <td style="text-align:center" width="45%">
                    <h3>LOKASI</h3>
                </td>
            </tr>
        </thead>
    </table>
    <br>

    <table border="1" width=100% >
        <thead >
            <tr align="center" style="background-color: gray;">
                <th rowspan="2" width="2%">NO</th>
                <th rowspan="2" width="15%">NAMA</th>
                <th rowspan="2" width="15%">EMAIL</th>
                <th rowspan="2" width="15%">JABATAN</th>      
            </tr>
        </thead>
        @php $i=1 @endphp
        @foreach ($allusers as $l)
            <tbody>
                <td style="text-align:center">{{ $i++ }}</td>
                <td>{{ $l->nama }}</td>
                <td style="text-align:center">{{ $l->email }}</td>
                <td style="text-align:center">{{ $l->jabatan }}</td>
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
