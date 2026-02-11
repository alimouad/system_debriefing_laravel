<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Evaluation extends Model
{
    protected $fillable = [
        'comment',
        'teacher_id',
        'student_id',
        'brief_id',
        'mastery_level'
    ];

    public function brief(){
        return $this->belongsTo(Brief::class);
    }

    public function skills(){
        return $this->belongsToMany(Skill::class, 'evaluation_skill');
    }

    public function teacher()
    {
        return $this->belongsTo(User::class, 'teacher_id');
    }

    public function student()
    {
        return $this->belongsTo(User::class, 'student_id');
    }
}
