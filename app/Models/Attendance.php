<?php

namespace App\Models;

use App\Models\Scopes\SchoolScope;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Attendance extends Model
{
    use HasFactory;

    protected $fillable = [
        'student_id',
            'staff_id',
            'admission_no',
            'class_id',
            'term_id',
            'session_id',
            'wing',
            'active_status',
            'date'
    ];

    protected static function booted()
    {
        static::addGlobalScope(new SchoolScope);
    }

        /**
         * Get the user associated with the Attendance
         *
         * @return \Illuminate\Database\Eloquent\Relations\HasOne
         */
        public function student(): HasMany
        {
            return $this->hasMany(Student::class, 'student_id', 'id');
        }

        public function session(): HasMany
        {
            return $this->hasMany(Session::class, 'session_id', 'id');
        }

        public function class(): HasMany
        {
            return $this->hasMany(Classes::class, 'class_id', 'id');
        }
}
