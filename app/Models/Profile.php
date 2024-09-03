<?php

namespace App\Models;

use App\Models\StaffFormat;
use App\Models\Scopes\SchoolScope;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Profile extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'file_number',
        'first_name',
        'last_name',
        'other_name',
        'gender',
        'marital_status',
        'phone_number',
        'nationality',
        'state',
        'lga',
        'town',
        'address_line_1',
        'address_line_2',
        'date_of_birth',
        'place_of_birth',
        'avatar'

    ];


    // protected static function booted()
    // {
    //     static::addGlobalScope(new SchoolScope);
    // }

    public function formNumberUpdate(){
        $number_format = StaffFormat::where('status', 1)->first();
        $row = Self::latest('id')->first();
        $string = $number_format->file_number ;
        $array = explode(",", $string);
        $lastElement = end($array);
    }

}
