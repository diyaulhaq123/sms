<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StaffType extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'status',
    ];

    public function staff()
    {
        return $this->belongsTo(Staff::class, 'staff_type_id', 'id');
    }
}
