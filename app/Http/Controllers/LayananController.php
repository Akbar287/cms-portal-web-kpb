<?php

namespace App\Http\Controllers;

use App\Http\Requests\LayananRequest;
use App\Models\Layanan;
use App\Models\Organisasi;
use Illuminate\Support\Facades\Storage;

class LayananController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $layanans = Layanan::all();
        return view('layanan/index', compact('layanans'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $organisasi = Organisasi::all();
        return view('layanan/create', compact('organisasi'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(LayananRequest $layananRequest)
    {
        $foto = 'default.png';
        if($layananRequest->hasFile('icon')) {
            $filenameWithExt = $layananRequest->file('icon')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $layananRequest->file('icon')->getClientOriginalExtension();
            $foto = $filename.'_'.time(). '.'.$extension;
            $layananRequest->file('icon')->storeAs('public/layanan', $foto);
        }
        $organisasi = Organisasi::find($layananRequest->organisasi_id);
        $layanan = $organisasi->layanan()->create($this->layananData($foto));

        return redirect('/layanan/' . $layanan->layanan_id)->with('msg', '<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Sukses!</strong> Data layanan sudah ditambah.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
    }

    /**
     * Display the specified resource.
     */
    public function show(Layanan $layanan)
    {
        return view('layanan/show', compact('layanan'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Layanan $layanan)
    {
        $organisasi = Organisasi::all();
        return view('layanan/edit', compact('layanan', 'organisasi'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(LayananRequest $layananRequest, Layanan $layanan)
    {

        $foto = $layanan->icon;
        if($layananRequest->hasFile('icon')) {
            if($layanan->icon != 'default.png') {
                Storage::delete("public/layanan/". $layanan->icon);
            }
            
            $filenameWithExt = $layananRequest->file('icon')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $layananRequest->file('icon')->getClientOriginalExtension();
            $foto = $filename.'_'.time(). '.'.$extension;
            $layananRequest->file('icon')->storeAs('public/layanan', $foto);
        }
        $layanan->update($this->layananData($foto));

        return redirect('/layanan/' . $layanan->layanan_id)->with('msg', '<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Sukses!</strong> Data layanan sudah diubah.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Layanan $layanan)
    {
        if($layanan->icon != 'default.png') {
            Storage::delete("public/layanan/". $layanan->icon);
        }
        $layanan->delete();

        return redirect('/layanan')->with('msg', '<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Sukses!</strong> Data layanan sudah dihapus.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
    }

    public function layananData($foto = null) {
        return [
            'nama' => request('nama'),
            'icon' => $foto != null ? $foto : request('icon'),
            'deskripsi' => request('deskripsi'),
            'status' => request('status'),
        ];
    }
}
