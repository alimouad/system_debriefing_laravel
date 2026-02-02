<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SkillController extends Controller
{
    //
    public function skillsHome()
    {
        return view('pages.admin.skills.index');
    }
}
