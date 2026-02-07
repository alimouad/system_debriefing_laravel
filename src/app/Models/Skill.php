<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    protected $fillable = [
        'label',
        'code'
    ];

    public function briefs(){
        return $this->belongsToMany(Brief::class);
    }

    public function evaluations(){
        return $this->belongsToMany(Evaluation::class);
    }
}
