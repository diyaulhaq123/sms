<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TimeTable extends Model
{
    use HasFactory;
    protected $fillable = [
        'class_id',
        'wing',
        'subject_id',
        'start',
        'end',
        'session_id',
        'term_id','day',
    ];

    /**
     * Get the subject associated with the TimeTable
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function subject(): HasOne
    {
        return $this->hasOne(Subject::class, 'id', 'subject_id');
    }

    /**
     * Get the class associated with the TimeTable
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function class(): HasOne
    {
        return $this->hasOne(Classes::class, 'id', 'class_id');
    }

    /**
     * Get the schedule associated with the TimeTable
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function start_time(): HasOne
    {
        return $this->hasOne(ScheduleTime::class, 'id', 'start');
    }

    public function end_time(): HasOne
    {
        return $this->hasOne(ScheduleTime::class, 'id', 'end');
    }

    /**
     * Get the day associated with the TimeTable
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function days(): HasOne
    {
        return $this->hasOne(Day::class, 'id', 'day');
    }

}
