<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentRecord extends Model
{
    use HasFactory;
    public function guardian()
    {
        return $this->hasOne(Guardian::class, 'id', 'guardian_id');
    }

    public function class_category()
    {
        return $this->hasone(ClassCategory::class, 'id', 'class_category_id');
    }

    public function class()
    {
        return $this->hasOne(Classes::class, 'id', 'class_id');
    }

    public function session()
    {
        return $this->hasOne(Session::class, 'id', 'session_id');
    }

    public function state()
    {
        return $this->hasOne(State::class, 'id', 'state_id');
    }

    public function lga()
    {
        return $this->hasOne(Lga::class, 'id', 'lga_id');
    }

}
