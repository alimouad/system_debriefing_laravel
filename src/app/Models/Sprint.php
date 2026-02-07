<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sprint extends Model
{
    protected $fillable = [
        'title',
        'description',
        'start_date',
        'end_date',
        'classroom_id',


    ];

    public function briefs()
    {
        return $this->hasMany(Brief::class);
    }

    public function classrooms()
    {
        return $this->belongsToMany(Classroom::class);
    }
}
