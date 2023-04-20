<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HubungiKami extends Model
{
    use HasFactory;
    protected $table = 'hubungi_kami';
    protected $primaryKey = 'hubungi_kami_id';
    protected $fillable = [
        'organisasi_id',
        'nama',
        'telepon',
        'email',
        'deskripsi',
        'status'
    ];

    public function organisasi() {
        return $this->belongsTo(Organisasi::class, 'organisasi_id', 'organisasi_id');
    }
}
