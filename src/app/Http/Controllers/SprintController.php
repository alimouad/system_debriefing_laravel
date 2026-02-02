<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SprintController extends Controller
{
    //
      public function sprintsHome()
    {
        return view('pages.admin.sprints.index');
    }
}
