<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RemunerationCategory extends Model
{
    use HasFactory;
    public function category() 
    {
        return $this->belongsTo(RemunerationCategory::class, 'category_id');
    }
}
