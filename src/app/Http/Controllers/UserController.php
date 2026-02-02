<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    //
      public function usersHome()
    {
        return view('pages.admin.users.index');
    }
}
