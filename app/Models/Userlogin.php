<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Userlogin extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    protected $table = 'userlogin';
    protected $primaryKey = 'user_login_id';
    protected $fillable = [
        'member_id',
        'username',
        'password',
        'is_aktif',
        'access_token',
        'access',
        'last_login'
    ];

    public function member() {
        return $this->belongsTo(Member::class, 'member_id', 'member_id');
    }
}
