<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    use HasFactory;
    protected $table = 'video';
    protected $primaryKey = 'video_id';
    public $timestamps = false;
    protected $fillable = [
        'organisasi_id',
        'nama_video',
        'gambar',
        'url',
        'status'
    ];

    public function organisasi() {
        return $this->belongsTo(Organisasi::class, 'organisasi_id', 'organisasi_id');
    }
}
