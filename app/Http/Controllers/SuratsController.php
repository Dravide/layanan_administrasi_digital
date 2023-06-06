<?php

namespace App\Http\Controllers;


use App\Models\Surat;
use App\Models\Template;
use Illuminate\Http\Request;
use PhpOffice\PhpWord\TemplateProcessor;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Str;

class SuratsController extends Controller
{
    public function index($id)
    {
        $data = Template::find($id);
        return view('surat.index')->with(compact('data'));
    }

    public function store(Request $request)
    {
        $credential = $request->validate([
            'judul_surat' => 'required',
            'nomor_surat' => 'required',
            'titimangsa' => 'required',
            'tte' => 'required',
            'deskripsi' => 'required',
        ]);
        $data = json_encode($request->except([
            'templates_id', 'nomor_surat', '_token', 'judul_surat', 'titimangsa', 'tte', 'deskripsi'
        ], true));
        $hasil = new Surat();
        $hasil->judul_surat = $request->judul_surat;
        $hasil->templates_id = $request->templates_id;
        $hasil->nomor_surat = $request->nomor_surat;
        $hasil->titimangsa = $request->titimangsa;
        $hasil->deskripsi = $request->deskripsi;
        $hasil->tte = $request->tte;
        $hasil->url = Str::random(20);
        $hasil->data = $data;
        $hasil->save();
        return redirect()->route('surat.keluar')->with('sukses', 'Surat Berhasil Dibuat');
    }

    public function keluar()
    {
        $datas = Surat::where('status', 'aktif')->orderBy('created_at', 'desc')->get();
        return view('surat.keluar')->with(compact('datas'));

    }

    public function generate(Request $request)
    {
        $data = Surat::join('templates', 'templates.id', '=', 'surats.templates_id')
            ->where('surats.id', $request->id)
            ->select(['surats.*', 'templates.file'])
            ->first();

        $file = 'storage/'.$data->file.'';
        QrCode::format('png')->size(60)->generate(url('validasi/'.$data->url), 'storage/qr/'.$data->url.'.png');
        $templateProcessor = new TemplateProcessor($file);
        $json = json_decode($data->data, true);

        foreach ($json as $key => $value) {
            $templateProcessor->setValue($key, $value);
        }
        if ($data->tte == 1) {
            $templateProcessor->setImageValue('qr', 'storage/qr/'.$data->url.'.png');
        } else {
            $templateProcessor->setValue('qr', '');
        }

        $templateProcessor->setValue('nomor_surat', $data->nomor_surat);
        $templateProcessor->setValue('titimangsa', $data->titimangsa->translatedFormat('d F Y'));
        $path = 'storage/generate/'.$data->judul_surat.' - '.date('d-m-Y').'.docx';
        Surat::where('id', $request->id)->update(['file' => $path]);
        $templateProcessor->saveas($path);

        return redirect()->route('surat.keluar')->with('sukses', 'Surat Berhasil Dibuat');

    }

    public function edit($id)
    {
        $surat = Surat::find($id);
        $data = Template::find($surat->templates_id);
        $array1 = json_decode($surat->data, true);
        $array2 = json_decode($data->data, true);

        $array3 = array();
        foreach ($array2 as $key => $value) {
            $array3[$value] = $array1[$value];
        }


        return view('surat.edit')->with(compact('data', 'surat', 'array3'));
    }

}
