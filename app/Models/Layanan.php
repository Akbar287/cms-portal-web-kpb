<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Layanan extends Model
{
    use HasFactory;
    protected $table = 'layanan';
    protected $primaryKey = 'layanan_id';
    protected $fillable = [
        'organisasi_id',
        'nama',
        'icon',
        'deskripsi',
        'status',
    ];

    public function organisasi() {
        return $this->belongsTo(Organisasi::class, 'organisasi_id', 'organisasi_id');
    }
}
