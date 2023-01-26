<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class PasienController extends Controller
{
    public function __invoke($param)
    {
        // Storingthe cipher method
        $ciphering = "AES-128-CTR";

        // Using OpenSSl Encryption method
        $iv_length = openssl_cipher_iv_length($ciphering);
        $options = 0;

        // Non-NULL Initialization Vector for encryption
        $encryption_iv = '1234567891011121';

        // Storing the encryption key
        $encryption_key = "empampom";

        // Non-NULL Initialization Vector for decryption
        $decryption_iv = '1234567891011121';

        // Storing the decryption key
        $decryption_key = "empampom";

        // Using openssl_decrypt() function to decrypt the data
        $decryption = openssl_decrypt($param, $ciphering, $decryption_key, $options, $decryption_iv);

        $arr_param = explode('||', $decryption);

        $no_mr = $arr_param[0];
        $nama = $arr_param[1];
        $tgl_lahir = $arr_param[2];

        $qrcode = QrCode::size(100)->generate($no_mr);
        return view('kartu_pasien', compact('no_mr', 'nama', 'tgl_lahir', 'qrcode'));
    }
}
