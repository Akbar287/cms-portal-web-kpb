<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SosialMedia extends Model
{
    use HasFactory;
    protected $table = 'sosial_media';
    protected $primaryKey = 'sosial_media_id';
    public $timestamps = false;
    protected $fillable = [
        'organisasi_id',
        'nama_sosmed',
        'icon',
        'url',
        'status',
        'urutan'
    ];

    public function organisasi() {
        return $this->belongsTo(Organisasi::class, 'organisasi_id', 'organisasi_id');
    }
}
