<?php

namespace App\Http\Controllers;

use App\Http\Requests\BannerRequest;
use App\Models\Banner;
use App\Models\Organisasi;
use Illuminate\Support\Facades\Storage;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $banners = Banner::all();
        return view('banner/index', compact('banners'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $organisasi = Organisasi::all();
        return view('banner.create', compact('organisasi'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BannerRequest $bannerRequest)
    {
        $foto = 'default.png';
        if($bannerRequest->hasFile('icon')) {
            $filenameWithExt = $bannerRequest->file('icon')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $bannerRequest->file('icon')->getClientOriginalExtension();
            $foto = $filename.'_'.time(). '.'.$extension;
            $bannerRequest->file('icon')->storeAs('public/banner', $foto);
        }
        $organisasi = Organisasi::find($bannerRequest->organisasi_id);
        $banner = $organisasi->banner()->create($this->bannerData($foto));

        return redirect('/banner/' . $banner->banner_id)->with('msg', '<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Sukses!</strong> Data Banner sudah ditambah.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
    }

    /**
     * Display the specified resource.
     */
    public function show(Banner $banner)
    {
        return view('banner.show', compact('banner'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Banner $banner)
    {
        $organisasi = Organisasi::all();
        return view('banner.edit', compact('banner', 'organisasi'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(BannerRequest $bannerRequest, Banner $banner)
    {
        $foto = $banner->icon;
        if($bannerRequest->hasFile('icon')) {
            if($banner->icon != 'default.png') {
                Storage::delete("public/banner/". $banner->icon);
            }
            
            $filenameWithExt = $bannerRequest->file('icon')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $bannerRequest->file('icon')->getClientOriginalExtension();
            $foto = $filename.'_'.time(). '.'.$extension;
            $bannerRequest->file('icon')->storeAs('public/banner', $foto);
        }
        $banner->update($this->bannerData($foto));

        return redirect('/banner/' . $banner->banner_id)->with('msg', '<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Sukses!</strong> Data Banner sudah diubah.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Banner $banner)
    {
        if($banner->icon != 'default.png') {
            Storage::delete("public/banner/". $banner->icon);
        }
        $banner->delete();

        return redirect('/banner')->with('msg', '<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Sukses!</strong> Data Banner sudah dihapus.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
    }

    public function bannerData ($foto = null) {
        return [
            'nama' => request('nama'),
            'gambar' => $foto != null ? $foto : request('gambar'),
            'urutan' => request('urutan'),
            'deskripsi' => request('deskripsi'),
            'status' => request('status'),
        ];
    }
}
