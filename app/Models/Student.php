<?php

namespace App\Models;

use App\Models\Scopes\SchoolScope;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Student extends Model
{
    use HasFactory;
    protected $fillable = [
        'first_name',
        'last_name',
        'other_name',
        'guardian_id',
        'class_id',
        'class_category_id',
        'session_id',
        'admin_session',
        'admission_no',
        'wing',
        'address',
        'state_id',
        'lga_id',
        'user_id',

    ];


    protected static function booted()
    {
        static::addGlobalScope(new SchoolScope);
    }


    /**
         * Get the user associated with the Student
         *
         * @return \Illuminate\Database\Eloquent\Relations\HasMany
         */
        public function guardian()
        {
            return $this->hasOne(Guardian::class, 'id', 'guardian_id');
        }

        public function class_category()
        {
            return $this->hasOne(ClassCategory::class, 'id', 'class_category_id');
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

        public function user()
        {
            return $this->hasOne(User::class, 'id', 'guardian_id');
        }

        public function admission_session(){
            return $this->hasOne(Session::class, 'id', 'admit_session');
        }

}
