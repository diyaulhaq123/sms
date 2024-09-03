<?php

namespace App\Models;

use App\Models\Scopes\SchoolScope;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class StudentPerformance extends Model
{
    use HasFactory;

    protected $fillable = [
        'student_id',
        'staff_id',
        'session_id',
        'term_id',
        'class_category_id',
        'class_id',
        'wing',
        'punctuality',
        'neatness',
        'attendance',
        'confidence',
        'remark'
    ];

    protected static function booted()
    {
        static::addGlobalScope(new SchoolScope);
    }

/**
         * Get the user associated with the StudentPerformance
         *
         * @return \Illuminate\Database\Eloquent\Relations\HasOne
         */
        public function student()
        {
            return $this->hasOne(Student::class, 'id', 'student_id');
        }

        public function class()
        {
            return $this->hasOne(Classes::class, 'id', 'class_id');
        }

        public function session()
        {
            return $this->hasOne(Session::class, 'id', 'session_id');
        }

        public function term()
        {
            return $this->hasOne(Term::class, 'id', 'term_id');
        }

        public function staff()
        {
            return $this->hasOne(Staff::class, 'id', 'staff_id');
        }

        public function class_category()
        {
            return $this->hasOne(Classes::class, 'id', 'class_category_id');
        }

        public function admission_session(){
            return $this->hasOne(Session::class, 'id', 'admit_session');
        }

}
