<?php

namespace App\Models;

use App\Models\Scopes\SchoolScope;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PaymentType extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'status'
    ];


    protected static function booted()
    {
        static::addGlobalScope(new SchoolScope);
    }


}
