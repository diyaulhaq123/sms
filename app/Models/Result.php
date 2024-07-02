<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Result extends Model
{
    use HasFactory;
    protected $fillable = [
        'session_id', 'term_id', 'class_id', 'status'
    ];

    public function class()
    {
        return $this->hasOne(Classes::class, 'id', 'class_id');
    }

    public function session()
    {
        return $this->hasOne(Session::class, 'id', 'session_id');
    }

    public function term()
    {
        return $this->hasOne(Term::class, 'id', 'term_id');
    }

    public static function toggleResult($id){
        $result = Self::find($id);
        if($result->status == 1){
        $result->update(['status' => 0]);
        }else{
            $result->update(['status' => 1]);
        }
    }

}
