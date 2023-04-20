<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GalleryVideo extends Model
{
    use HasFactory;
    protected $table = 'gallery_video';
    protected $primaryKey = 'gallery_video_id';
    protected $fillable = [
        'organisasi_id',
        'nama_gallery_video',
        'gambar',
        'url',
        'status'
    ];

    public function organisasi() {
        return $this->belongsTo(Organisasi::class, 'organisasi_id', 'organisasi_id');
    }
}
