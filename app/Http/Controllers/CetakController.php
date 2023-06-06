<?php

namespace App\Http\Controllers;


use App\Models\PengaturanSurat;
use Barryvdh\DomPDF\Facade\Pdf;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class CetakController extends Controller
{
    public function cetak()
    {
        $header = PengaturanSurat::where('jenis', 'header')->first();
        $footer = PengaturanSurat::where('jenis', 'footer')->first();
        $qrcode = base64_encode(QrCode::format('svg')->size(200)->errorCorrection('H')->generate('string'));
        $data = [
            'title' => 'Welcome to ItSolutionStuff.com',
            'date' => date('m/d/Y'),
            'qr' => $qrcode,
            'header' => $header,
            'footer' => $footer,
        ];

        $pdf = PDF::loadView('cetak.pdf', $data)
            ->setpaper(array(0, 0, 609.4488, 935.433), 'portrait');
        return $pdf->stream("cetak.pdf", array("Attachment" => false));
    }
}
