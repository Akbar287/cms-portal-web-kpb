<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aplikasi extends Model
{
    use HasFactory;
    protected $table = 'aplikasi';
    protected $primaryKey = 'aplikasi_id';
    public $timestamps = false;
    protected $fillable = [
        'organisasi_id',
        'nama_aplikasi',
        'url',
        'deskripsi'
    ];

    public function organisasi() {
        return $this->belongsTo(Organisasi::class, 'organisasi_id', 'organisasi_id');
    }
}
