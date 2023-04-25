<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RemunerationRate extends Model
{
    use HasFactory;

    public function remunerationCategory()
    {
        return $this->belongsTo('App\Models\RemunerationCategory', 'category_id');
    }
}
