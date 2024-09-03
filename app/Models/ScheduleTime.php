<?php

namespace App\Models;

use App\Models\Scopes\SchoolScope;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ScheduleTime extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'status'];

    protected static function booted()
    {
        static::addGlobalScope(new SchoolScope);
    }

}
