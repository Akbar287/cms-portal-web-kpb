<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrganisasiRequest;
use App\Models\Organisasi;
use Illuminate\Support\Facades\Storage;

class OrganisasiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $organisasis = Organisasi::all();
        return view('organisasi/index', compact('organisasis'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('organisasi/create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(OrganisasiRequest $organisasiRequest)
    {
        $foto = 'default.png';
        if($organisasiRequest->hasFile('icon')) {
            $filenameWithExt = $organisasiRequest->file('icon')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $organisasiRequest->file('icon')->getClientOriginalExtension();
            $foto = $filename.'_'.time(). '.'.$extension;
            $organisasiRequest->file('icon')->storeAs('public/organisasi', $foto);
        }

        $organisasi = Organisasi::create($this->organisasiData($foto));

        return redirect('/organisasi/' . $organisasi->organisasi_id)->with('msg', '<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Sukses!</strong> Data organisasi sudah ditambah.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
    }

    /**
     * Display the specified resource.
     */
    public function show(Organisasi $organisasi)
    {
        return view('organisasi/show', compact('organisasi'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Organisasi $organisasi)
    {
        return view('organisasi/edit', compact('organisasi'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(OrganisasiRequest $organisasiRequest, Organisasi $organisasi)
    {
        $foto = $organisasi->icon;
        if($organisasiRequest->hasFile('icon')) {
            if($organisasi->icon != 'default.png') {
                Storage::delete("public/organisasi/". $organisasi->icon);
            }
            
            $filenameWithExt = $organisasiRequest->file('icon')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $organisasiRequest->file('icon')->getClientOriginalExtension();
            $foto = $filename.'_'.time(). '.'.$extension;
            $organisasiRequest->file('icon')->storeAs('public/organisasi', $foto);
        }

        $organisasi->update($this->organisasiData($foto));

        return redirect('/organisasi/' . $organisasi->organisasi_id)->with('msg', '<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Sukses!</strong> Data organisasi sudah diubah.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Organisasi $organisasi)
    {
        if($organisasi->icon != 'default.png') {
            Storage::delete("public/organisasi/". $organisasi->icon);
        }

        $organisasi->delete();

        return redirect('/organisasi')->with('msg', '<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Sukses!</strong> Data organisasi sudah dihapus.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
    }

    public function organisasiData($foto = null) {
        return [
            'nama' => request('nama'),
            'nama_singkat' => request('nama_singkat'),
            'alamat' => request('alamat'),
            'icon' => $foto != null ? $foto : request('icon'),
            'deskripsi' => request('deskripsi'),
        ];
    }
}
