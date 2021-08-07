<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Competition extends Model
{
    use HasFactory;
    protected $fillable = [
        'uuid',
        'title',
        'description',
        'location',
        'cover',
        'url_files',
        'start_at',
        'end_at',
        'status',
    ];

    public function participant()
    {
        return $this->hasMany(PhotoCompetition::class, 'competition_id');
    }
}
