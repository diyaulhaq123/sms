<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Application extends Model
{
    use HasFactory;

    protected $fillable = [
        'first_name',
        'last_name',
        'other_name',
        'gender',
        'state_id' ,
        'lga_id',
        'date_of_birth' ,
        'class_category_id',
        'class_id',
        'guardian_name',
        'guardian_phone',
        'guardian_email',
        'address',
        'session_id',
    ];

    /**
     * Get the state associated with the Application
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function state(): HasOne
    {
        return $this->hasOne(State::class, 'id', 'state_id');
    }

    public function lga(): HasOne
    {
        return $this->hasOne(Lga::class, 'id', 'lga_id');
    }

    public function class(): HasOne
    {
        return $this->hasOne(Classes::class, 'id', 'class_id');
    }

    public function classCategory(): HasOne
    {
        return $this->hasOne(ClassCategory::class, 'id', 'class_category_id');
    }

    public function session(): HasOne
    {
        return $this->hasOne(Session::class, 'id', 'session_id');
    }

}
