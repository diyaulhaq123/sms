<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Fee extends Model
{
    use HasFactory;

    protected $fillable = [
        'payment_type_id', 'class_id', 'session_id', 'term_id', 'amount', 'class_category_id'
    ];

    /**
     * Get the user associated with the Fee
     *
     * @return HasOne
     */
    public function session()
    {
        return $this->hasOne(Session::class, 'id', 'session_id');
    }

    public function class()
    {
        return $this->hasOne(Classes::class, 'id', 'class_id');
    }

    public function term()
    {
        return $this->hasOne(Term::class, 'id', 'term_id');
    }

    public function payment_type()
    {
        return $this->hasOne(PaymentType::class, 'id', 'payment_type_id');
    }

    public function class_category()
    {
        return $this->hasOne(ClassCategory::class, 'id', 'class_category_id');
    }
}
