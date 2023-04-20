<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\Event;
use App\Models\GalleryFoto;
use App\Models\GalleryVideo;
use App\Models\Hubungi;
use App\Models\Layanan;
use App\Models\Organisasi;
use App\Models\SosialMedia;
use App\Models\TentangKami;
use App\Models\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ThemeRimpangController extends Controller
{
    public $organisasi;
    public $hubungi;
    public $sosialMedia;
    public function __construct()
    {
        $this->organisasi = Organisasi::get()->first();
        $this->hubungi = Hubungi::get()->first();
        $this->sosialMedia = SosialMedia::where('status', 'aktif')->get();
        
    }
    public function index()
    {
        $organisasi = $this->organisasi;
        $hubungi = $this->hubungi;
        $sosialMedia = $this->sosialMedia;
        $layanan = Layanan::where('status', 'aktif')->get();
        $video = Video::where('status', 'aktif')->first();
        $berita = Event::where('status', 'aktif')->where('jenis', 'berita')->orderBy('created_at', 'desc')->limit(3)->get();
        $banner = Banner::where('status', 'aktif')->get();
        return view('front-end.theme-rimpang/index', compact('layanan', 'organisasi', 'hubungi', 'video', 'berita', 'banner', 'sosialMedia'));
    }

    public function about()
    {
        $organisasi = $this->organisasi;
        $hubungi = $this->hubungi;
        $sosialMedia = $this->sosialMedia;
        $tentangKami = TentangKami::get()->first();
        return view('front-end.theme-rimpang/about', compact('organisasi', 'hubungi', 'sosialMedia', 'tentangKami'));
    }

    public function visi()
    {
        $organisasi = $this->organisasi;
        $hubungi = $this->hubungi;
        $sosialMedia = $this->sosialMedia;
        $visiMisi = TentangKami::get()->first()->visi_misi()->orderBy('urutan', 'asc')->get();
        return view('front-end.theme-rimpang/visi', compact('organisasi', 'hubungi', 'sosialMedia', 'visiMisi'));
    }

    public function galleryFoto()
    {
        $organisasi = $this->organisasi;
        $hubungi = $this->hubungi;
        $sosialMedia = $this->sosialMedia;
        $galleryFoto = $organisasi->gallery_foto()->where('status', 'aktif')->orderBy('created_at', 'desc')->paginate(8);
        return view('front-end.theme-rimpang/gallery/foto', compact('organisasi', 'hubungi', 'sosialMedia', 'galleryFoto'));
    }
    
    public function galleryVideo()
    {
        $organisasi = $this->organisasi;
        $hubungi = $this->hubungi;
        $sosialMedia = $this->sosialMedia;
        $video = $organisasi->video()->first();
        $galleryVideo = $organisasi->gallery_video()->where('status', 'aktif')->orderBy('created_at', 'desc')->paginate(8);
        return view('front-end.theme-rimpang/gallery/video', compact('organisasi', 'hubungi', 'sosialMedia', 'galleryVideo', 'video'));
    }

    public function kontak()
    {
        $organisasi = $this->organisasi;
        $hubungi = $this->hubungi;
        $sosialMedia = $this->sosialMedia;
        return view('front-end.theme-rimpang/kontak', compact('organisasi', 'hubungi', 'sosialMedia'));
    }

    public function kontak_store(Request $request) {
        $request->validate([
            'name' => ['required'],
            'no_telepon' => ['required'],
            'email' => ['required'],
            'deskripsi' => ['required']
        ]);

        $this->organisasi->hubungi_kami()->create([
            'nama' => request('name'),
            'telepon' => request('no_telepon'),
            'email' => request('email'),
            'deskripsi' => request('deskripsi'),
            'status' => 'baru'
        ]);

        return redirect('/kontak')->with('msg', '<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Sukses!</strong> Pesan anda sudah kami catat.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
    }

    public function download()
    {
        $organisasi = $this->organisasi;
        $hubungi = $this->hubungi;
        $sosialMedia = $this->sosialMedia;
        $downloads = $organisasi->download()->where('status', 'aktif')->orderBy('download_id', 'desc')->paginate(10);
        return view('front-end.theme-rimpang/download', compact('organisasi', 'hubungi', 'sosialMedia', 'downloads'));
    }

    public function berita()
    {
        $organisasi = $this->organisasi;
        $hubungi = $this->hubungi;
        $sosialMedia = $this->sosialMedia;
        $berita = $organisasi->event()->where('jenis', 'berita')->orWhere('jenis', 'artikel')->paginate(6);
        return view('front-end.theme-rimpang/berita', compact('organisasi', 'hubungi', 'sosialMedia', 'berita'));
    }
    
    public function beritaDetail($slug)
    {
        $organisasi = $this->organisasi;
        $hubungi = $this->hubungi;
        $sosialMedia = $this->sosialMedia;
        $event = Event::where('slug', $slug)->first();
        $deskripsi = Storage::disk('public')->get($event->deskripsi);
        return view('front-end.theme-rimpang/berita_detail', compact('organisasi', 'hubungi', 'sosialMedia', 'event', 'deskripsi'));
    }

    public function agenda()
    {
        $organisasi = $this->organisasi;
        $hubungi = $this->hubungi;
        $sosialMedia = $this->sosialMedia;
        $agenda = $organisasi->event()->where('jenis', 'agenda')->paginate(6);
        return view('front-end.theme-rimpang/agenda', compact('organisasi', 'hubungi', 'sosialMedia', 'agenda'));
    }
    
    public function agendaDetail($slug)
    {
        $organisasi = $this->organisasi;
        $hubungi = $this->hubungi;
        $sosialMedia = $this->sosialMedia;
        $agenda = Event::where('slug', $slug)->first();
        $deskripsi = Storage::disk('public')->get($agenda->deskripsi);
        return view('front-end.theme-rimpang/agenda_detail', compact('organisasi', 'hubungi', 'sosialMedia', 'agenda', 'deskripsi'));
    }
}
