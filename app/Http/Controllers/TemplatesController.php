<?php

namespace App\Http\Controllers;

use App\Models\Klasifikasi;
use App\Models\Template;
use Illuminate\Http\Request;

class TemplatesController extends Controller
{
    public function index()
    {
        $datas = Template::where('status', 'aktif')->orderBy('status', 'asc')->get();
        return view('pengaturansurat.templatesurat')->with(compact('datas'));
    }

    public function create()
    {
        $nomorsurat = Klasifikasi::all();
        return view('pengaturansurat.tambahtemplate')->with('nomorsurat', $nomorsurat);
    }

    public function show(Template $template)
    {
    }

    public function edit(Template $template, $id)
    {
        $data = Template::find($id);
        $nomorsurat = Klasifikasi::all();
        $jumlahdata = count(json_decode($data->data, true));

        return view('pengaturansurat.edittemplate')->with(compact('data', 'nomorsurat', 'jumlahdata'));
    }

    public function destroy(Template $template)
    {

    }

    public function status(Request $request, $id)
    {
        $template = Template::find($id);
        $template->update([
            'status' => $request->status
        ]);
        $template->save();
        return redirect()->route('templatesurat.index')->with('sukses', 'Status Template Surat Berhasil Diubah');

    }

    public function update(Request $request, Template $template, $id)
    {
        $data = json_encode($request->data, true);
        $template = Template::find($id);
        $template->update([
            'nama_template' => $request->nama_template,
            'klasifikasi_id' => $request->klasifikasi_id,
            'data' => $data,
        ]);
        $template->save();
        return redirect()->route('templatesurat.index')->with('sukses', 'Template Surat Berhasil Diubah');
    }

    public function store(Request $request)
    {

        $credential = $request->validate([
            'nama_template' => 'required',
            'klasifikasi_id' => 'required',
            'data' => 'required',
            'file' => 'required|mimes:docx,docm,doc|max:2048',
        ]);

        $file = $request->file('file')->store('files', 'public');

        $data = json_encode($request->data, true);
        $hasil = new Template();
        $hasil->nama_template = $request->nama_template;
        $hasil->klasifikasi_id = $request->klasifikasi_id;
        $hasil->file = $file;
        $hasil->data = $data;
        $hasil->save();
        return redirect()->route('templatesurat.index')->with('sukses', 'Template Surat Berhasil Ditambahkan');
    }

    public function arsip()
    {
        $datas = Template::where('status', 'arsip')->get();

        return view('pengaturansurat.templatesuratarsip')->with(compact('datas'));
    }

}
