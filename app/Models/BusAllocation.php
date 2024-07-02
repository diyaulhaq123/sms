<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class BusAllocation extends Model
{
    use HasFactory;
    protected $fillable = [
        'route_id', 'bus_id', 'status'
    ];

    /**
     * Get the bus associated with the BusAllocation
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function bus(): HasOne
    {
        return $this->hasOne(Vehicle::class, 'id', 'bus_id');
    }

    /**
     * Get the route associated with the BusAllocation
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function route(): HasOne
    {
        return $this->hasOne(TransportRoute::class, 'id', 'route_id');
    }
    
}
