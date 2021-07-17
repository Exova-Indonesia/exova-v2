<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WebinarAttendant extends Model
{
    use HasFactory;
    protected $fillable = [
        'webinar_id',
        'name',
        'email',
        'instansi',
        'status',
    ];
}
