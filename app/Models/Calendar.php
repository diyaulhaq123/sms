<?php

namespace App\Models;

use App\Models\Scopes\SchoolScope;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Calendar extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'date', 'description'];


    protected static function booted()
    {
        static::addGlobalScope(new SchoolScope);
    }

}
