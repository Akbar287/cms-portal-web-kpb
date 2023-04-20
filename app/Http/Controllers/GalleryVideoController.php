<?php

namespace App\Http\Controllers;

use App\Http\Requests\GalleryVideoRequest;
use App\Models\GalleryVideo;
use App\Models\Organisasi;
use Illuminate\Support\Facades\Storage;

class GalleryVideoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $galleryVideos = GalleryVideo::all();
        return view('gallery/video/index', compact('galleryVideos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $organisasi = Organisasi::all();
        return view('gallery/video/create', compact('organisasi'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(GalleryVideoRequest $galleryVideoRequest)
    {
        $foto = 'default.png';
        if($galleryVideoRequest->hasFile('icon')) {
            $filenameWithExt = $galleryVideoRequest->file('icon')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $galleryVideoRequest->file('icon')->getClientOriginalExtension();
            $foto = $filename.'_'.time(). '.'.$extension;
            $galleryVideoRequest->file('icon')->storeAs('public/gallery/video', $foto);
        }
        $organisasi = Organisasi::find($galleryVideoRequest->organisasi_id);
        $galleryVideo = $organisasi->gallery_video()->create($this->galleryVideoData($foto));

        return redirect('/gallery/video/' . $galleryVideo->gallery_video_id)->with('msg', '<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Sukses!</strong> Data Gallery Video sudah ditambah.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
    }

    /**
     * Display the specified resource.
     */
    public function show(GalleryVideo $galleryVideo)
    {
        return view('gallery/video/show', compact('galleryVideo'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(GalleryVideo $galleryVideo)
    {
        $organisasi = Organisasi::all();
        return view('gallery/video/edit', compact('galleryVideo', 'organisasi'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(GalleryVideoRequest $galleryVideoRequest, GalleryVideo $galleryVideo)
    {
        $foto = $galleryVideo->gambar;
        if($galleryVideoRequest->hasFile('icon')) {
            if($galleryVideo->gambar != 'default.png') {
                Storage::delete("public/gallery/video/". $galleryVideo->gambar);
            }
            
            $filenameWithExt = $galleryVideoRequest->file('icon')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $galleryVideoRequest->file('icon')->getClientOriginalExtension();
            $foto = $filename.'_'.time(). '.'.$extension;
            $galleryVideoRequest->file('icon')->storeAs('public/gallery/video', $foto);
        }
        $galleryVideo->update($this->galleryVideoData($foto));

        return redirect('/gallery/video/' . $galleryVideo->gallery_video_id)->with('msg', '<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Sukses!</strong> Data Gallery Video sudah diubah.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(GalleryVideo $galleryVideo)
    {
        if($galleryVideo->gambar != 'default.png') {
            Storage::delete("public/gallery/video/". $galleryVideo->gambar);
        }
        $galleryVideo->delete();

        return redirect('/gallery/video')->with('msg', '<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Sukses!</strong> Data Gallery Video sudah dihapus.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
    }

    public function galleryVideoData ($foto = null) {
        return [
            'nama_gallery_video' => request('nama_gallery_video'),
            'gambar' => $foto != null ? $foto : request('gambar'),
            'url' => request('url'),
            'status' => request('status'),
        ];
    }
}
