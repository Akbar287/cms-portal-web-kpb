<?php

namespace App\Http\Controllers;

use App\Http\Requests\TentangKamiRequest;
use App\Models\Organisasi;
use App\Models\TentangKami;
use Illuminate\Support\Facades\Storage;

class TentangKamiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tentangKamis = TentangKami::all();
        return view('tentang-kami/index', compact('tentangKamis'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $organisasi = Organisasi::all();
        return view('tentang-kami/create', compact('organisasi'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TentangKamiRequest $tentangKamiRequest)
    {
        $foto = 'default.png';
        if($tentangKamiRequest->hasFile('icon')) {
            $filenameWithExt = $tentangKamiRequest->file('icon')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $tentangKamiRequest->file('icon')->getClientOriginalExtension();
            $foto = $filename.'_'.time(). '.'.$extension;
            $tentangKamiRequest->file('icon')->storeAs('public/tentang-kami', $foto);
        }
        $organisasi = Organisasi::find($tentangKamiRequest->organisasi_id);
        $tentangKami = $organisasi->tentang_kami()->create($this->tentangKamiData($foto));

        return redirect('/tentang/' . $tentangKami->tentang_kami_id)->with('msg', '<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Sukses!</strong> Data tentang kami sudah ditambah.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');

    }

    /**
     * Display the specified resource.
     */
    public function show(TentangKami $tentangKami)
    {
        return view('tentang-kami/show', compact('tentangKami'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TentangKami $tentangKami)
    {
        $organisasi = Organisasi::all();
        return view('tentang-kami/edit', compact('tentangKami', 'organisasi'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TentangKamiRequest $tentangKamiRequest, TentangKami $tentangKami)
    {
        $foto = $tentangKami->gambar;
        if($tentangKamiRequest->hasFile('icon')) {
            if($tentangKami->icon != 'default.png') {
                Storage::delete("public/tentang-kami/". $tentangKami->icon);
            }

            $filenameWithExt = $tentangKamiRequest->file('icon')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $tentangKamiRequest->file('icon')->getClientOriginalExtension();
            $foto = $filename.'_'.time(). '.'.$extension;
            $tentangKamiRequest->file('icon')->storeAs('public/tentang-kami', $foto);
        }
        $tentangKami->update($this->tentangKamiData($foto));

        return redirect('/tentang/' . $tentangKami->tentang_kami_id)->with('msg', '<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Sukses!</strong> Data tentang kami sudah diubah.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TentangKami $tentangKami)
    {
        if($tentangKami->icon != 'default.png') {
            Storage::delete("public/tentang-kami/". $tentangKami->icon);
        }
        $tentangKami->delete();

        return redirect('/tentang')->with('msg', '<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Sukses!</strong> Data tentang kami sudah dihapus.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
    }

    public function tentangKamiData($foto = null) {
        return [
            "judul" => request('judul'),
            "gambar" => $foto != null ? $foto : request('gambar'),
            "deskripsi" => request('deskripsi'),
        ];
    }
}
