<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlockedUser extends Model
{
    use HasFactory;

    protected $table = 'blocked_users';

    protected $fillable = [
        'user_id',
        'user_blocked_id'
    ];


    public function User()
    {
        return $this->belongsTo(User::class);
    }
}
