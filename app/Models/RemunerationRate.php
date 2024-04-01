<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RemunerationRate extends Model
{
    use HasFactory;

    public function rate() 
    {
        return $this->belongsTo('App\Models\RemunerationRate', 'category_id');
    }
}
