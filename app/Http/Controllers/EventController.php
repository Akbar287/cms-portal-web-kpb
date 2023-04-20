<?php

namespace App\Http\Controllers;

use App\Http\Requests\EventRequest;
use App\Models\Event;
use App\Models\Organisasi;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $events = Event::all();
        return view('event/index', compact('events'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $organisasi = Organisasi::all();
        return view('event/create', compact('organisasi'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(EventRequest $eventRequest)
    {
        $organisasi = Organisasi::find($eventRequest->organisasi_id);
        $name = request('slug') . time() . '.txt';
        Storage::disk('public')->put($name, request('deskripsi'));

        $foto = 'default.png';
        if($eventRequest->hasFile('gambar')) {
            $filenameWithExt = $eventRequest->file('gambar')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $eventRequest->file('gambar')->getClientOriginalExtension();
            $foto = $filename.'_'.time(). '.'.$extension;
            $eventRequest->file('gambar')->storeAs('public/event', $foto);
        }

        DB::table('event')->insert([
            'organisasi_id' => $organisasi->organisasi_id,
            'jenis' => request('jenis'),
            'judul' => request('judul'),
            'deskripsi' => $name,
            'status' => request('status'),
            'prolog' => request('prolog'),
            'gambar' => $foto,
            'slug' => request('slug'),
            'created_by' => Auth::user()->member()->first()->member_id,
            'updated_by' => Auth::user()->member()->first()->member_id,
            'created_at' => Date('Y-m-d H:i:s')
        ]);

        return redirect('/event')->with('msg', '<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Sukses!</strong> Data Event sudah ditambah.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
    }

    /**
     * Display the specified resource.
     */
    public function show(Event $event)
    {
        $organisasi = Organisasi::find($event->event_id);
        $deskripsi = Storage::disk('public')->get($event->deskripsi);
        return view('event/show', compact('event', 'organisasi', 'deskripsi'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Event $event)
    {
        $organisasi = Organisasi::all();
        $deskripsi = Storage::disk('public')->get($event->deskripsi);
        return view('event/edit', compact('event', 'organisasi', 'deskripsi'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EventRequest $eventRequest, Event $event)
    {
        $foto = $event->gambar;
        if($eventRequest->hasFile('gambar')) {
            if($event->gambar != 'default.png') {
                Storage::delete("public/event/". $event->gambar);
            }
            
            $filenameWithExt = $eventRequest->file('gambar')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $eventRequest->file('gambar')->getClientOriginalExtension();
            $foto = $filename.'_'.time(). '.'.$extension;
            $eventRequest->file('gambar')->storeAs('public/event', $foto);
        }
        DB::table('event')->where('event_id', $event->event_id)->update([
            'jenis' => request('jenis'),
            'judul' => request('judul'),
            'prolog' => request('prolog'),
            'status' => request('status'),
            'gambar' => $foto,
            'slug' => request('slug'),
            'updated_by' => Auth::user()->member()->first()->member_id,
            'updated_at' => Date('Y-m-d H:i:s')
        ]);
        Storage::delete('public/'. $event->deskripsi);
        Storage::disk('public')->put($event->deskripsi, request('deskripsi'));
        return redirect('/event/' . $event->event_id)->with('msg', '<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Sukses!</strong> Data Event sudah diubah.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Event $event)
    {
        $event->update(['deleted_by' => Auth::user()->member()->first()->member_id, 'deleted_at' => Date('Y-m-d H:i:s')]);
        $event->delete();
        return redirect('/event')->with('msg', '<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Sukses!</strong> Data Event sudah dihapus.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
    }

    public function eventData ($foto = null) {
        return [
            'jenis' => request('jenis'),
            'judul' => request('judul'),
            'deskripsi' => request('deskripsi'),
            'prolog' => request('prolog'),
            'status' => request('status'),
            'gambar' => $foto != null ? $foto : request('gambar'),
            'slug' => request('slug'),
            'created_by' => Auth::user()->member()->first()->member_id,
            'updated_by' => Auth::user()->member()->first()->member_id,
        ];
    }
}
