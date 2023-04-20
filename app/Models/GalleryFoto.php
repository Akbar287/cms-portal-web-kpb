<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GalleryFoto extends Model
{
    use HasFactory;
    protected $table = 'gallery_foto';
    protected $primaryKey = 'gallery_foto_id';
    protected $fillable = [
        'organisasi_id',
        'nama_gallery_foto',
        'gambar',
        'url',
        'status'
    ];

    public function organisasi() {
        return $this->belongsTo(Organisasi::class, 'organisasi_id', 'organisasi_id');
    }
}
