<?php

namespace App\Http\Controllers;

use App\Http\Requests\SosialMediaRequest;
use App\Models\Organisasi;
use App\Models\SosialMedia;
use Illuminate\Support\Facades\Storage;

class SosialMediaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sosialMedias = SosialMedia::all();
        return view('sosial-media/index', compact('sosialMedias'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $organisasi = Organisasi::all();
        return view('sosial-media/create', compact('organisasi'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SosialMediaRequest $sosialMediaRequest)
    {
        $foto = 'default.png';
        if($sosialMediaRequest->hasFile('icon')) {
            $filenameWithExt = $sosialMediaRequest->file('icon')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $sosialMediaRequest->file('icon')->getClientOriginalExtension();
            $foto = $filename.'_'.time(). '.'.$extension;
            $sosialMediaRequest->file('icon')->storeAs('public/sosial-media', $foto);
        }
        $organisasi = Organisasi::find($sosialMediaRequest->organisasi_id);
        $sosialMedia = $organisasi->sosial_media()->create($this->sosialMediaData($foto));

        return redirect('/sosial-media/' . $sosialMedia->sosial_media_id)->with('msg', '<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Sukses!</strong> Data sosial media sudah ditambah.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
    }

    /**
     * Display the specified resource.
     */
    public function show(SosialMedia $sosialMedia)
    {
        return view('sosial-media/show', compact('sosialMedia'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SosialMedia $sosialMedia)
    {
        $organisasi = Organisasi::all();
        return view('sosial-media/edit', compact('sosialMedia', 'organisasi'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SosialMediaRequest $sosialMediaRequest, SosialMedia $sosialMedia)
    {
        $foto = $sosialMedia->icon;
        if($sosialMediaRequest->hasFile('icon')) {
            if($sosialMedia->icon != 'default.png') {
                Storage::delete("public/sosial-media/". $sosialMedia->icon);
            }
            
            $filenameWithExt = $sosialMediaRequest->file('icon')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $sosialMediaRequest->file('icon')->getClientOriginalExtension();
            $foto = $filename.'_'.time(). '.'.$extension;
            $sosialMediaRequest->file('icon')->storeAs('public/sosial-media', $foto);
        }
        $sosialMedia->update($this->sosialMediaData($foto));

        return redirect('/sosial-media/' . $sosialMedia->sosial_media_id)->with('msg', '<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Sukses!</strong> Data sosial media sudah diubah.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SosialMedia $sosialMedia)
    {
        if($sosialMedia->icon != 'default.png') {
            Storage::delete("public/sosial-media/". $sosialMedia->icon);
        }
        $sosialMedia->delete();

        return redirect('/sosial-media')->with('msg', '<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Sukses!</strong> Data sosial media sudah dihapus.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
    }

    public function sosialMediaData($foto = null) {
        return [
            "nama_sosmed" => request('nama_sosmed'),
            "icon" => $foto != null ? $foto : request('icon'),
            "url" => request('url'),
            "status" => request('status'),
            "urutan" => request('urutan'),
        ];
    }
}
