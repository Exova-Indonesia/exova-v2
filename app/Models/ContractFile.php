<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContractFile extends Model
{
    use HasFactory;
    protected $fillable = [
        'contract_id',
        'file_id',
    ];

    public function file()
    {
        return $this->belongsTo(File::class, 'file_id');
    }
}
