<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    protected $table = 'staffs';
    use HasFactory;

    protected $fillable = ['first_name','last_name', 'user_id', 'staff_id','phone', 'email','address','state_id', 'lga_id',
    'avatar'
    ];

    public function staff_type()
    {
        return $this->hasOne(Staff_type::class, 'id', 'staff_type_id');
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
