<?php

namespace App\Models;

use App\Models\Scopes\SchoolScope;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Classes extends Model
{
    use HasFactory;
    protected $table = 'Classes';

    protected $fillable = [
        'name',
        'class_category_id'
    ];

    // protected static function booted()
    // {
    //     static::addGlobalScope(new SchoolScope);
    // }
}
