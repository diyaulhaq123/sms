<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ClassCategory extends Model
{
    protected $table = 'class_categories';
    use HasFactory;

    public function allocation(): BelongsTo
    {
        return $this->belongsTo(SubjectAllocation::class, 'id', 'class_category_id');
    }
}
