<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Session extends Model
{
    use HasFactory;
    public static function activateSession($id)
    {
        // First, set the status of all rows to 0
        self::where('status', 1)->update(['status' => 2]);

        // Then, set the status of the specified row to 1
        self::where('id', $id)->update(['status' => 1]);
    }
}
