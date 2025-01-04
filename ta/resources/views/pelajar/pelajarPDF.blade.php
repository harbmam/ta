<!DOCTYPE html>
<html>
<head>
    <title>Data Pelajar</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            text-align: left;
            padding: 8px;
        }
    </style>
</head>
<body>
    <h1>Data Pelajar</h1>
    @php 
        $ar_judul = ['No','Nama','Pengajar','Jurusan'];
        $no = 1;
    @endphp
    <table>
        <thead>
            <tr>
                @foreach($ar_judul as $jdl)
                    <th style="text-align: center;">{{ $jdl }}</th>
                @endforeach
            </tr>
        </thead>
        <tbody>
        @foreach($ar_pelajar as $pelajar)
                <tr>
                    <td>{{ $no++ }}</td>
                    <td>{{ $pelajar->nama }}</td>
                    <td>{{ $pelajar->pen }}</td>
                    <td>{{ $pelajar->jur }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>