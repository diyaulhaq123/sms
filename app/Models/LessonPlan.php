<?php

namespace App\Models;

use App\Models\Scopes\SchoolScope;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class LessonPlan extends Model
{
    use HasFactory;

    // public $timestamps = false;

    protected $fillable = [
        'staff_id',
        'session_id',
        'term_id',
        'class_id',
        'subject_id',
        'status',
        'topic',
        'sub_topic',
        'behaviour', 	'duration', 	'date', 	'reference', 'remark', 'school_id'
    ];

    protected static function booted()
    {
        static::addGlobalScope(new SchoolScope);
    }

    /**
     * Get the session associated with the LessonPlan
     *
     * @return HasOne
     */
    public function session(): HasOne
    {
        return $this->hasOne(Session::class, 'id', 'session_id');
    }

    /**
     * Get the term associated with the LessonPlan
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function term(): HasOne
    {
        return $this->hasOne(Term::class, 'id', 'term_id');
    }

    /**
     * Get the subject associated with the LessonPlan
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function subject(): HasOne
    {
        return $this->hasOne(Subject::class, 'id', 'subject_id');
    }


    /**
     * Get the class associated with the LessonPlan
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function class(): HasOne
    {
        return $this->hasOne(Classes::class, 'id', 'class_id');
    }

    /**
     * Get the staff associated with the LessonPlan
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function staff(): HasOne
    {
        return $this->hasOne(User::class, 'id', 'staff_id');
    }

    /**
     * Get the profile associated with the LessonPlan
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function profile(): HasOne
    {
        return $this->hasOne(Profile::class, 'user_id', 'staff_id');
    }

}
