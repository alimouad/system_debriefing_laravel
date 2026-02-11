<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Classroom extends Model
{
    protected $fillable = [
        'name',
        'promotion_year'
    ];

    public function students(){
        return $this->hasMany(User::class);
    }

    public function teachers(){
        return $this->belongsToMany(User::class, 'classroom_teacher', 'classroom_id', 'teacher_id');
    }

    public function sprints(){
        return $this->hasMany(Sprint::class);
    }
}
