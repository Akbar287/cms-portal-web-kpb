<?php

namespace App\Http\Controllers;

use App\Http\Requests\AplikasiRequest;
use App\Models\Aplikasi;
use App\Models\Organisasi;

class AplikasiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $apps = Aplikasi::all();
        return view('aplikasi.index', compact('apps'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('aplikasi/create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AplikasiRequest $aplikasiRequest)
    {
        $aplikasi = Organisasi::find($aplikasiRequest->organisasi_id);

        $aplikasi->create($this->aplikasiData());

        return redirect('/aplikasi/' . $aplikasi->aplikasi_id)->with('msg', '<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Sukses!</strong> Data Aplikasi sudah ditambah.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
    }

    /**
     * Display the specified resource.
     */
    public function show(Aplikasi $aplikasi)
    {
        return view('aplikasi.show', compact('aplikasi'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Aplikasi $aplikasi)
    {
        return view('aplikasi.edit', compact('aplikasi'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AplikasiRequest $aplikasiRequest, Aplikasi $aplikasi)
    {
        $aplikasi->update($this->aplikasiData());

        return redirect('/aplikasi/' . $aplikasi->aplikasi_id)->with('msg', '<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Sukses!</strong> Data Aplikasi sudah diubah.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Aplikasi $aplikasi)
    {
        $aplikasi->delete();

        return redirect('/aplikasi')->with('msg', '<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Sukses!</strong> Data Aplikasi sudah dihapus.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
    }

    public function aplikasiData() {
        return [
            'nama_aplikasi' => request('nama_aplikasi'),
            'url' => request('url'),
            'deskripsi' => request('deskripsi'),
        ];
    }
}
