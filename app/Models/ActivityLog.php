<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ActivityLog extends Model
{
    use HasFactory;
    protected $table = 'activity_log';
    protected $primaryKey = 'activity_log_id';
    protected $fillable = [
        'nama_aktivitas',
        'class',
        'function',
        'input',
        'output'
    ];

    public function member() {
        return $this->belongsTo(Member::class, 'member_id', 'member_id');
    }
}
