<?php

namespace App\Http\Controllers\Bash;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BashController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index () 
    {
    	return view('bashkaruu.index');
    }
}
