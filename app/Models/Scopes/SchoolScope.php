<?php

namespace App\Models\Scopes;

use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;
use Illuminate\Database\Eloquent\Builder;

class SchoolScope implements Scope
{
    /**
     * Apply the scope to a given Eloquent query builder.
     */
    public function apply(Builder $builder, Model $model): void
    {
        if (Auth::check()) {
            $school_id = auth()->user()->school_id; // Retrieve school id from the application instance
            \Log::info('Applying SchoolScope for school_id: ' . $school_id);

            if ($school_id) {
                $builder->where('school_id', $school_id);
            } else {
                \Log::warning('No school_id found for authenticated user.');
            }
        } else {
            \Log::warning('User not authenticated.');
        }
    }


}
