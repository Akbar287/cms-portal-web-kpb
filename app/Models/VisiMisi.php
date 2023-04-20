<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VisiMisi extends Model
{
    use HasFactory;
    protected $table = 'visi_misi';
    protected $primaryKey = 'visi_misi_id';
    public $timestamps = false;
    protected $fillable = [
        'tentang_kami_id',
        'jenis',
        'deskripsi',
        'status',
        'urutan',
    ];

    public function tentang_kami() {
        return $this->belongsTo(TentangKami::class, 'tentang_kami_id', 'tentang_kami_id');
    }
}
