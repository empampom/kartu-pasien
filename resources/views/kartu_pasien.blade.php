<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>RS Umum Pekerja</title>
    <style>
        div.relative {
            position: relative;
            width: 550px;
        }

        div.nama {
            position: absolute;
            top: 120px;
            right: 220px;
            width: 260px;
            height: 100px;
        }

        div.qrcode {
            position: absolute;
            top: 60px;
            right: 0;
            width: 200px;
            height: 100px;
        }
    </style>
</head>

<body>
    <div class="relative">
        <img src="{{ asset('kartu_pasien.png') }}" width="500">
        <div class="nama">
            <span style="font-size: 25px">{{ $nama }}</span>
            <br>
            <span style="font-size: 15px">{{ $tgl_lahir }}</span>
        </div>
        <div class="qrcode">
            {!! $qrcode !!}
            <br>
            <span style="font-size: 25px">{{ $no_mr }}</span>
        </div>
    </div>
</body>

</html>
