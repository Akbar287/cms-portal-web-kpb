<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    use HasFactory;
    protected $table = 'banner';
    protected $primaryKey = 'banner_id';
    public $timestamps = false;
    protected $fillable = [
        'organisasi_id',
        'nama',
        'gambar',
        'urutan',
        'deskripsi',
        'status',
    ];

    public function organisasi() {
        return $this->belongsTo(Organisasi::class, 'organisasi_id', 'organisasi_id');
    }
}
