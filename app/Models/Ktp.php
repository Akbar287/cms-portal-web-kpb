<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ktp extends Model
{
    use HasFactory;
    protected $table = 'ktp';
    protected $primaryKey = 'ktp_id';
    protected $fillable = [
        'nik',
        'nama',
        'jenis_kelamin',
        'tempat_lahir',
        'tanggal_lahir',
        'verified',
    ];

    public function member() {
        return $this->hasOne(Member::class, 'ktp_id', 'ktp_id');
    }
}
