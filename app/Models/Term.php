<?php

namespace App\Models;

use App\Models\Scopes\SchoolScope;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Term extends Model
{
    use HasFactory;


    protected static function booted()
    {
        static::addGlobalScope(new SchoolScope);
    }

    public static function activateTerm($id)
    {
        // First, set the status of all rows to 0
        self::where('status', 1)->update(['status' => 0]);

        // Then, set the status of the specified row to 1
        self::where('id', $id)->update(['status' => 1]);
    }
}
