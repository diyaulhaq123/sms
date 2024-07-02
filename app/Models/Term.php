<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Term extends Model
{
    use HasFactory;
    public static function activateTerm($id)
    {
        // First, set the status of all rows to 0
        self::where('status', 1)->update(['status' => 0]);

        // Then, set the status of the specified row to 1
        self::where('id', $id)->update(['status' => 1]);
    }
}
