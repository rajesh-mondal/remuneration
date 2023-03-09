<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exam extends Model
{
    public function year()
    {
        return $this->belongsTo('App\Models\Year', 'year_id');
    }

    public function term()
    {
        return $this->belongsTo('App\Models\term', 'term_id');
    }
}
