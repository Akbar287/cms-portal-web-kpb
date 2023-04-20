<?php

namespace App\Http\Controllers;

use App\Http\Requests\KategoriRequest;
use App\Models\Kategori;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kategories = Kategori::all();
        return view('kategori/index', compact('kategories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('kategori/create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(KategoriRequest $kategoriRequest)
    {
        $kategori = Kategori::create($this->kategoriData());

        return redirect('/kategori/' . $kategori->kategori_id)->with('msg', '<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Sukses!</strong> Data kategori sudah ditambah.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
    }

    /**
     * Display the specified resource.
     */
    public function show(Kategori $kategori)
    {
        return view('kategori/show', compact('kategori'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Kategori $kategori)
    {
        return view('kategori/edit', compact('kategori'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(KategoriRequest $kategoriRequest, Kategori $kategori)
    {
        $kategori->update($this->kategoriData());
        
        return redirect('/kategori/' . $kategori->kategori_id)->with('msg', '<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Sukses!</strong> Data kategori sudah diubah.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Kategori $kategori)
    {
        $kategori->delete();

        return redirect('/kategori')->with('msg', '<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Sukses!</strong> Data kategori sudah dihapus.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
    }

    public function kategoriData(){
        return [
            'nama_kategori' => request('nama_kategori'),
            'status' => request('status')
        ];
    }
}
