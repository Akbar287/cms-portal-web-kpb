<?php

namespace App\Http\Controllers;

use App\Http\Requests\GalleryFotoRequest;
use App\Models\GalleryFoto;
use App\Models\Organisasi;
use Illuminate\Support\Facades\Storage;

class GalleryFotoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $galleryFotos = GalleryFoto::all();
        return view('gallery/foto/index', compact('galleryFotos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $organisasi = Organisasi::all();
        return view('gallery/foto/create', compact('organisasi'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(GalleryFotoRequest $galleryFotoRequest)
    {
        $foto = 'default.png';
        if($galleryFotoRequest->hasFile('icon')) {
            $filenameWithExt = $galleryFotoRequest->file('icon')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $galleryFotoRequest->file('icon')->getClientOriginalExtension();
            $foto = $filename.'_'.time(). '.'.$extension;
            $galleryFotoRequest->file('icon')->storeAs('public/gallery/foto', $foto);
        }

        $organisasi = Organisasi::find($galleryFotoRequest->organisasi_id);
        $galleryFoto = $organisasi->gallery_foto()->create($this->galleryFotoData($foto));

        return redirect('/gallery/foto/' . $galleryFoto->gallery_foto_id)->with('msg', '<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Sukses!</strong> Data Gallery Foto sudah ditambah.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
    }

    /**
     * Display the specified resource.
     */
    public function show(GalleryFoto $galleryFoto)
    {
        return view('gallery/foto/show', compact('galleryFoto'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(GalleryFoto $galleryFoto)
    {
        $organisasi = Organisasi::all();
        return view('gallery/foto/edit', compact('galleryFoto', 'organisasi'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(GalleryFotoRequest $galleryFotoRequest, GalleryFoto $galleryFoto)
    {
        $foto = $galleryFoto->gambar;
        if($galleryFotoRequest->hasFile('icon')) {
            if($galleryFoto->gambar != 'default.png') {
                Storage::delete("public/gallery/foto/". $galleryFoto->gambar);
            }
            
            $filenameWithExt = $galleryFotoRequest->file('icon')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $galleryFotoRequest->file('icon')->getClientOriginalExtension();
            $foto = $filename.'_'.time(). '.'.$extension;
            $galleryFotoRequest->file('icon')->storeAs('public/gallery/foto', $foto);
        }
        $galleryFoto->update($this->galleryFotoData($foto));

        return redirect('/gallery/foto/' . $galleryFoto->gallery_foto_id)->with('msg', '<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Sukses!</strong> Data Gallery Foto sudah diubah.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(GalleryFoto $galleryFoto)
    {
        if($galleryFoto->gambar != 'default.png') {
            Storage::delete("public/gallery/foto/". $galleryFoto->gambar);
        }
        $galleryFoto->delete();

        return redirect('/gallery/foto')->with('msg', '<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Sukses!</strong> Data Gallery Foto sudah dihapus.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
    }

    public function galleryFotoData($foto = null) {
        return [
            'nama_gallery_foto' => request('nama_gallery_foto'),
            'gambar' => $foto != null ? $foto : request('gambar'),
            'url' => request('url'),
            'status' => request('status'),
        ];
    }
}
