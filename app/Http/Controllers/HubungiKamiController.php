<?php

namespace App\Http\Controllers;

use App\Http\Requests\HubungiKamiRequest;
use App\Models\HubungiKami;
use App\Models\Organisasi;

class HubungiKamiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $hubungiKamis = HubungiKami::all();
        return view('hubungi-kami/index', compact('hubungiKamis'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $organisasi = Organisasi::all();
        return view('hubungi-kami/create', compact('organisasi'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(HubungiKamiRequest $hubungiKamiRequest)
    {
        $organisasi = Organisasi::find($hubungiKamiRequest->organisasi_id);
        $hubungiKami = $organisasi->hubungi_kami()->create($this->hubungiKamiData());

        return redirect('/hubungi-kami/' . $hubungiKami->hubungi_kami_id)->with('msg', '<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Sukses!</strong> Data Hubungi Kami sudah ditambah.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
    }

    /**
     * Display the specified resource.
     */
    public function show(HubungiKami $hubungiKami)
    {
        return view('hubungi-kami/show', compact('hubungiKami'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(HubungiKami $hubungiKami)
    {
        $organisasi = Organisasi::all();
        return view('hubungi-kami/edit', compact('hubungiKami', 'organisasi'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(HubungiKamiRequest $hubungiKamiRequest, HubungiKami $hubungiKami)
    {
        $hubungiKami->update($this->hubungiKamiData());

        return redirect('/hubungi-kami/' . $hubungiKami->hubungi_kami_id)->with('msg', '<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Sukses!</strong> Data Hubungi Kami sudah diubah.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(HubungiKami $hubungiKami)
    {
        $hubungiKami->delete();

        return redirect('/hubungi-kami')->with('msg', '<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Sukses!</strong> Data Hubungi Kami sudah dihapus.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
    }

    public function hubungiKamiData() {
        return [
            'nama' => request("nama"),
            'telepon' => request("telepon"),
            'email' => request("email"),
            'deskripsi' => request("deskripsi"),
            'status' => request("status"),
        ];
    }
}
