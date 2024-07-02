<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubjectAllocation extends Model
{
    use HasFactory;

    protected $fillable = [
        'session_id',
        'term_id',
        'staff_id',
        'subject_id',
        'class_id',
        'class_category_id'
    ];
        /*
         * Get the user associated with the Subject_allocation
         *
         * @return \Illuminate\Database\Eloquent\Relations\HasOne
         */
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

        public function subject()
        {
            return $this->hasOne(Subject::class, 'id', 'subject_id');
        }

        public function class_category()
        {
            return $this->hasOne(Class_category::class, 'id', 'class_category_id');
        }

        public function staff()
        {
            return $this->hasOne(Staff::class, 'id', 'staff_id');
        }

        public function user()
        {
            return $this->hasOne(User::class, 'id', 'staff_id');
        }


}
