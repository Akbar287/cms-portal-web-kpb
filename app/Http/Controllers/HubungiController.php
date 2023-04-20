<?php

namespace App\Http\Controllers;

use App\Http\Requests\HubungiRequest;
use App\Models\Hubungi;
use App\Models\Organisasi;

class HubungiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $hubungis = Hubungi::all();
        return view('hubungi/index', compact('hubungis'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $organisasi = Organisasi::all();
        return view('hubungi/create', compact('organisasi'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(HubungiRequest $hubungiRequest)
    {
        $organisasi = Organisasi::find($hubungiRequest->organisasi_id);
        $hubungi = $organisasi->hubungi()->create($this->hubungiData());

        return redirect('/hubungi/' . $hubungi->hubungi_id)->with('msg', '<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Sukses!</strong> Data Hubungi sudah ditambah.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
    }

    /**
     * Display the specified resource.
     */
    public function show(Hubungi $hubungi)
    {
        return view('hubungi/show', compact('hubungi'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Hubungi $hubungi)
    {
        $organisasi = Organisasi::all();
        return view('hubungi/edit', compact('hubungi', 'organisasi'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(HubungiRequest $hubungiRequest, Hubungi $hubungi)
    {
        $hubungi->update($this->hubungiData());

        return redirect('/hubungi/' . $hubungi->hubungi_id)->with('msg', '<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Sukses!</strong> Data Hubungi sudah diubah.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Hubungi $hubungi)
    {
        $hubungi->delete();

        return redirect('/hubungi')->with('msg', '<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Sukses!</strong> Data Hubungi sudah dihapus.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
    }

    public function hubungiData () {
        return [
            'alamat' => request('alamat'),
            'telepon' => request('telepon'),
            'no_hp' => request('no_hp'),
            'no_wa' => request('no_wa'),
            'email' => request('email'),
        ];
    }
}
