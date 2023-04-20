<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TentangKami extends Model
{
    use HasFactory;
    protected $table = 'tentang_kami';
    protected $primaryKey = 'tentang_kami_id';
    public $timestamps = false;
    protected $fillable = [
        'organisasi_id',
        'judul',
        'gambar',
        'deskripsi'
    ];

    public function organisasi() {
        return $this->belongsTo(Organisasi::class, 'organisasi_id', 'organisasi_id');
    }

    public function visi_misi() {
        return $this->hasMany(VisiMisi::class, 'tentang_kami_id', 'tentang_kami_id');
    }
}
