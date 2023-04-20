<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;
    protected $table = 'event';
    protected $primaryKey = 'event_id';
    protected $fillable = [
        'organisasi_id',
        'jenis',
        'judul',
        'deskripsi',
        'status',
        'gambar',
        'slug',
        'created_by',
        'updated_by',
        'deleted_by',
    ];

    public function organisasi() {
        return $this->belongsTo(Organisasi::class, 'organisasi_id', 'organisasi_id');
    }

    public function member() {
        return $this->belongsTo(Member::class, 'created_by', 'member_id');
    }
}
