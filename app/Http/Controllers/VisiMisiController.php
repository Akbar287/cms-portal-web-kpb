<?php

namespace App\Http\Controllers;

use App\Http\Requests\VisiMisiRequest;
use App\Models\TentangKami;
use App\Models\VisiMisi;

class VisiMisiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $visiMisis = VisiMisi::all();

        return view('visi-misi/index', compact('visiMisis'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $tentangKamis = TentangKami::all();
        return view('visi-misi/create', compact('tentangKamis'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(VisiMisiRequest $visiMisiRequest)
    {
        $tentangKami = TentangKami::find($visiMisiRequest->tentang_kami_id);
        $visiMisi = $tentangKami->visi_misi()->create($this->visiMisiData());

        return redirect('/visi-misi/' . $visiMisi->visi_misi_id)->with('msg', '<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Sukses!</strong> Data Visi Misi sudah ditambah.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
    }

    /**
     * Display the specified resource.
     */
    public function show(VisiMisi $visiMisi)
    {
        return view('visi-misi/show', compact('visiMisi'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(VisiMisi $visiMisi)
    {
        $tentangKamis = TentangKami::all();
        return view('visi-misi/edit', compact('visiMisi', 'tentangKamis'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(VisiMisiRequest $visiMisiRequest, VisiMisi $visiMisi)
    {
        $visiMisi->update($this->visiMisiData());

        return redirect('/visi-misi/' . $visiMisi->visi_misi_id)->with('msg', '<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Sukses!</strong> Data Visi Misi sudah diubah.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(VisiMisi $visiMisi)
    {
        $visiMisi->delete();

        return redirect('/visi-misi')->with('msg', '<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Sukses!</strong> Data Visi Misi sudah dihapus.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
    }

    public function visiMisiData() {
        return [
            'jenis' => request('jenis'),
            'deskripsi' => request('deskripsi'),
            'status' => request('status'),
            'urutan' => request('urutan'),
        ];
    }
}
