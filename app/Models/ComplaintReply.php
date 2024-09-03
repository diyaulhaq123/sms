<?php

namespace App\Models;

use App\Models\Scopes\SchoolScope;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ComplaintReply extends Model
{
    use HasFactory;
    protected $table = 'complaint_replies';

    protected $fillable = ['guardian_id', 'message', 'subject' ];

    protected static function booted()
    {
        static::addGlobalScope(new SchoolScope);
    }


}
