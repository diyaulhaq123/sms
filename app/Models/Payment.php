<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = [
        'student_id', 'session_id', 'term_id', 'payment_type_id','response', 'guardian_id', 'amount', 'class_id', 'ref_no', 'paid'
    ];

    /**
     * Get all of the payment_type_id for the Payment
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function payment_type()
    {
        return $this->hasOne(PaymentType::class, 'id', 'payment_type_id');
    }

    public function student()
    {
        return $this->hasOne(Student::class, 'id', 'student_id');
    }

    public function guardian()
    {
        return $this->hasOne(Guardian::class, 'id', 'guardian_id');
    }

    public function session()
    {
        return $this->hasOne(Session::class, 'id', 'session_id');
    }

    public function term()
    {
        return $this->hasOne(Term::class,  'id', 'term_id');
    }

    public function class()
    {
        return $this->hasOne(Classes::class,  'id', 'class_id');
    }

}
