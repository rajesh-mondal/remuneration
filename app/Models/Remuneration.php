<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Remuneration extends Model
{
    use HasFactory;

    public $timestamps = true;


    public function exam()
    {
        return $this->belongsTo('App\Models\Exam', 'exam_id');
    }

    public function category()
    {
        return $this->belongsTo('App\Models\RemunerationCategory', 'category_id');
    }

    public function rate()
    {
        return $this->belongsTo('App\Models\RemunerationRate', 'rate_id');
    }

    public function type()
    {
        return $this->belongsTo('App\Models\Type', 'type_id');
    }
}
