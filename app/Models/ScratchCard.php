<?php

namespace App\Models;

use App\Models\Scopes\SchoolScope;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

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


    protected static function booted()
    {
        static::addGlobalScope(new SchoolScope);
    }


    public function guardian(){
        return $this->hasOne(Guardian::class, 'id', 'guardian_id');
    }
}
