<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ScratchCard extends Model
{
    use HasFactory;
    protected $fillable = [
        'token',
        'is_valid',
        'guardian_id',
        'trial',
        'transaction_id',
    ];


    public function guardian(){
        return $this->hasOne(Guardian::class, 'id', 'guardian_id');
    }
}
