<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ClassAllocation extends Model
{
    use HasFactory;

    protected $fillable = [
        'staff_id', 'class_id', 'wing', 'session_id'
    ];

    /**
     * Get the class associated with the Class_allocation
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function class(): HasOne
    {
        return $this->hasOne(Classes::class, 'id', 'class_id');
    }


    public function session(): HasOne
    {
        return $this->hasOne(Session::class, 'id', 'session_id');
    }

    public function staff(): HasOne
    {
        return $this->hasOne(Staff::class, 'id', 'staff_id');
    }
}
