<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TransportRoute extends Model
{
    use HasFactory;

    protected $fillable = ['session_id','name','amount'];

    /**
     * Get the user associated with the TransportRoute
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function session(): HasOne
    {
        return $this->hasOne(Session::class, 'id', 'session_id');
    }

}
