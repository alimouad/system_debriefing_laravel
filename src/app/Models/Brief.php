<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Brief extends Model
{
    protected $fillable = [
        'title',
        'estimated_duration',
        'description',
        'brief_type',
        'teacher_id',
        'sprint_id'
    ];

    public function sprint(){
        return $this->belongsTo(Sprint::class);
    }

    public function submissions(){
        return $this->hasMany(Submission::class);
    }

    public function skills(){
        return $this->belongsToMany(Skill::class);
    }

    public function evaluations(){
        return $this->hasMany(Evaluation::class);
    }


    public function instructor()
    {
        return $this->belongsTo(User::class, 'instructor_id');
    }
}
