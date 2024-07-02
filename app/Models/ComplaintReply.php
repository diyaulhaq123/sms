<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ComplaintReply extends Model
{
    use HasFactory;
    protected $table = 'complaint_replies';

    protected $fillable = ['guardian_id', 'message', 'subject' ];
}
