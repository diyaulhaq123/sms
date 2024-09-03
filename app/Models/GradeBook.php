<?php

namespace App\Models;

use App\Models\Scopes\SchoolScope;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class GradeBook extends Model
{
    use HasFactory;

    protected $fillable = [
        'staff_id',
        'admission_no',
        'session_id',
        'student_id',
        'class_id',
        'wing',
        'subject_id',
        'term_id',
        'ca1', 'ca2', 'ca3', 'exam'
    ];

    protected static function booted()
    {
        static::addGlobalScope(new SchoolScope);
    }

    /**
     * Get all of the comments for the Grade_book
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasManyThrough
     */
    public function class()
        {
            return $this->hasOne(Classes::class, 'id', 'class_id');
        }

    public function subject()
        {
            return $this->hasOne(Subject::class, 'id', 'subject_id');
        }

    public function student()
        {
            return $this->hasOne(Student::class, 'id', 'student_id');
        }

    public function session()
        {
            return $this->hasOne(Session::class, 'id', 'session_id');
        }

    public function user()
        {
            return $this->hasOne(User::class, 'id', 'staff_id');
        }

    public function staff()
    {
        return $this->hasOne(User::class, 'id', 'staff_id');
    }



    public function term()
        {
            return $this->hasOne(Term::class, 'id', 'term_id');
        }



}
