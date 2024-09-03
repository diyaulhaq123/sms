<?php

namespace App\Models;

use App\Models\Scopes\SchoolScope;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Vehicle extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'plate_number', 'date_of_use', 'seat_number','status'];

    protected static function booted()
    {
        static::addGlobalScope(new SchoolScope);
    }

}
