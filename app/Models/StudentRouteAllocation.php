<?php

namespace App\Models;

use App\Models\Scopes\SchoolScope;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class StudentRouteAllocation extends Model
{
    use HasFactory;
    protected $fillable = [
        'student_id', 'route_id', 'term_id', 'session_id', 'status'
    ];

    protected static function booted()
    {
        static::addGlobalScope(new SchoolScope);
    }

    /**
     * Get the route associated with the StudentRouteAllocation
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function route(): HasOne
    {
        return $this->hasOne(TransportRoute::class, 'id', 'route_id');
    }

    /**
     * Get the term associated with the StudentRouteAllocation
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function term(): HasOne
    {
        return $this->hasOne(Term::class, 'id', 'term_id');
    }

    /**
     * Get the session associated with the StudentRouteAllocation
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function session(): HasOne
    {
        return $this->hasOne(Session::class, 'id', 'session_id');
    }

    /**
     * Get the student associated with the StudentRouteAllocation
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function student(): HasOne
    {
        return $this->hasOne(Student::class, 'id', 'student_id');
    }


}
