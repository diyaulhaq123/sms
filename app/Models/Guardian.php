<?php

namespace App\Models;

use App\Models\Scopes\SchoolScope;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Guardian extends Model
{
    use HasFactory;
    protected $fillable = [
        'first_name','other_names','email','phone','marital_status','address',
    ];

    protected static function booted()
    {
        static::addGlobalScope(new SchoolScope);
    }

}
