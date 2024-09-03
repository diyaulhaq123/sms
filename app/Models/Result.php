<?php

namespace App\Models;

use App\Models\Scopes\SchoolScope;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Result extends Model
{
    use HasFactory;
    protected $fillable = [
        'session_id', 'term_id', 'class_id', 'status'
    ];

    protected static function booted()
    {
        static::addGlobalScope(new SchoolScope);
    }

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
