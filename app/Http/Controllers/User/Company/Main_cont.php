<?php

namespace App\Http\Controllers\User\Company;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Main_cont extends Controller
{
    public function postJob(){

        return view('User.postJob');
    }
}
