<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Organisasi extends Model
{
    use HasFactory;
    protected $table = 'organisasi';
    protected $primaryKey = 'organisasi_id';
    protected $fillable = [
        'nama',
        'nama_singkat',
        'alamat',
        'icon',
        'deskripsi',
    ];

    public function tentang_kami() {
        return $this->hasOne(TentangKami::class, 'organisasi_id', 'organisasi_id');
    }

    public function aplikasi() {
        return $this->hasMany(Aplikasi::class, 'organisasi_id', 'organisasi_id');
    }

    public function sosial_media() {
        return $this->hasMany(SosialMedia::class, 'organisasi_id', 'organisasi_id');
    }

    public function gallery_foto() {
        return $this->hasMany(GalleryFoto::class, 'organisasi_id', 'organisasi_id');
    }

    public function layanan() {
        return $this->hasMany(Layanan::class, 'organisasi_id', 'organisasi_id');
    }

    public function hubungi() {
        return $this->hasOne(Hubungi::class, 'organisasi_id', 'organisasi_id');
    }

    public function banner() {
        return $this->hasMany(Banner::class, 'organisasi_id', 'organisasi_id');
    }

    public function hubungi_kami() {
        return $this->hasMany(HubungiKami::class, 'organisasi_id', 'organisasi_id');
    }

    public function video() {
        return $this->hasMany(Video::class, 'organisasi_id', 'organisasi_id');
    }

    public function gallery_video() {
        return $this->hasMany(GalleryVideo::class, 'organisasi_id', 'organisasi_id');
    }

    public function event() {
        return $this->hasMany(Event::class, 'organisasi_id', 'organisasi_id');
    }

    public function download() {
        return $this->hasMany(Download::class, 'organisasi_id', 'organisasi_id');
    }
}
