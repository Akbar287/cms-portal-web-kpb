<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hubungi extends Model
{
    use HasFactory;
    protected $table = 'hubungi';
    protected $primaryKey = 'hubungi_id';
    public $timestamps = false;
    protected $fillable = [
        'organisasi_id',
        'alamat',
        'telepon',
        'no_hp',
        'no_wa',
        'email',
    ];

    public function organisasi() {
        return $this->belongsTo(Organisasi::class, 'organisasi_id', 'organisasi_id');
    }
}


