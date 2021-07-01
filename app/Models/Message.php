<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;
    protected $fillable = [
        'room_id',
        'from_id',
        'to_id',
        'messages',
        'attachments',
    ];

    public function files()
    {
        return $this->belongsTo(File::class, 'attachments');
    }

}
