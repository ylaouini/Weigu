<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChMessage extends Model
{
    use HasFactory;
    protected $fillable = [
        'type',
        'broadcast_message_id',
        'from_id',
        'to_id',
        'body',
        'attachment',
        'seen',
    ];
}
