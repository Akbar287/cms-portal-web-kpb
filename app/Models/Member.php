<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    use HasFactory;
    protected $table = 'member';
    protected $primaryKey = 'member_id';
    protected $fillable = [
        'ktp_id',
        'email',
        'no_hp',
        'no_wa',
        'avatar'
    ];

    public function ktp() {
        return $this->belongsTo(Ktp::class, 'ktp_id', 'ktp_id');
    }

    public function activity_log() {
        return $this->hasMany(ActivityLog::class, 'member_id', 'member_id');
    }

    public function userlogin() {
        return $this->hasOne(Userlogin::class, 'member_id', 'member_id');
    }

    public function event() {
        return $this->hasMany(Event::class, 'event_id', 'event_id');
    }
}
