<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Download extends Model
{
    use HasFactory;
    protected $table = 'download';
    protected $primaryKey = 'download_id';
    public $timestamps = false;
    protected $fillable = [
        'organisasi_id',
        'kategori_id',
        'judul',
        'konten',
        'nama_file',
        'status',
    ];

    public function organisasi() {
        return $this->belongsTo(Organisasi::class, 'organisasi_id', 'organisasi_id');
    }

    public function kategori() {
        return $this->belongsTo(Kategori::class, 'kategori_id', 'kategori_id');
    }
}
