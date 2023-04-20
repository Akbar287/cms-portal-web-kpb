<?php

namespace App\Http\Controllers;

use App\Http\Requests\DownloadRequest;
use App\Models\Download;
use App\Models\Kategori;
use App\Models\Organisasi;
use Illuminate\Support\Facades\Storage;

class DownloadController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $downloads = Download::all();
        return view('download/index', compact('downloads'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $organisasi = Organisasi::all();
        $kategories = Kategori::all();
        return view('download/create', compact('organisasi', 'kategories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(DownloadRequest $downloadRequest)
    {
        $file = 'default.png';
        if($downloadRequest->hasFile('nama_file')) {
            $filenameWithExt = $downloadRequest->file('nama_file')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $downloadRequest->file('nama_file')->getClientOriginalExtension();
            $file = $filename.'_'.time(). '.'.$extension;
            $downloadRequest->file('nama_file')->storeAs('public/file', $file);
        }

        $organisasi = Organisasi::find($downloadRequest->organisasi_id);
        $download = $organisasi->download()->create($this->downloadData($file));

        return redirect('/download/' . $download->download_id)->with('msg', '<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Sukses!</strong> Data Download sudah ditambah.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
    }

    /**
     * Display the specified resource.
     */
    public function show(Download $download)
    {
        return view('download/show', compact('download'));
    }
    
    public function download(Download $download)
    {
        return Storage::download('public/file/'.$download->nama_file);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Download $download)
    {
        $organisasi = Organisasi::all();
        $kategories = Kategori::all();
        return view('download/edit', compact('download', 'organisasi', 'kategories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(DownloadRequest $downloadRequest, Download $download)
    {

        $file = $download->nama_file;
        if($downloadRequest->hasFile('nama_file')) {
            if($download->nama_file != 'default.png') {
                Storage::delete("public/file/". $download->nama_file);
            }
            
            $filenameWithExt = $downloadRequest->file('nama_file')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $downloadRequest->file('nama_file')->getClientOriginalExtension();
            $file = $filename.'_'.time(). '.'.$extension;
            $downloadRequest->file('nama_file')->storeAs('public/file', $file);
        }
        $download->update($this->downloadData($file));

        return redirect('/download/' . $download->download_id)->with('msg', '<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Sukses!</strong> Data download sudah diubah.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Download $download)
    {
        $download->delete();

        return redirect('/download')->with('msg', '<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Sukses!</strong> Data download sudah dihapus.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
    }

    public function downloadData($file = null) {
        return [
            'kategori_id' => request('kategori_id'),
            'judul' => request('judul'),
            'konten' => request('konten'),
            'nama_file' => $file != null ? $file : request('nama_file'),
            'status' => request('status'),
        ];
    }
}
