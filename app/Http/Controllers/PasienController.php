<?php

namespace App\Http\Controllers;

use SimpleSoftwareIO\QrCode\Facades\QrCode;

class PasienController extends Controller
{
    public function __invoke($param)
    {
        // $ciphering = "AES-128-CTR";

        // $iv_length = openssl_cipher_iv_length($ciphering);
        // $options = 0;

        // $encryption_key = "empampom";

        // $decryption_iv = '1234567891011121';

        // $decryption_key = "empampom";

        // $decryption = openssl_decrypt($request->id, $ciphering, $decryption_key, $options, $decryption_iv);

        $decryption = base64_decode($param);

        $arr_request = explode('||', $decryption);

        $no_mr = $arr_request[0];
        $nama = $arr_request[1];
        $tgl_lahir = $arr_request[2];

        $qrcode = QrCode::size(100)->generate($no_mr);
        return view('kartu_pasien', compact('no_mr', 'nama', 'tgl_lahir', 'qrcode'));
    }
}
