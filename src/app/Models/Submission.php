<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Submission extends Model
{
    protected $fillable = [
        'student_id',
        'brief_id',
        'repository_url',
        'description'
    ];

    public function brief(){
        return $this->belongsTo(Brief::class);
    }

    public function skills(){
        return $this->belongsToMany(Skill::class, 'evaluation_skill');
    }


    public function student()
    {
        return $this->belongsTo(User::class, 'student_id');
    }
}
