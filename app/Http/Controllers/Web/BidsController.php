<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BidsController extends Controller
{
    public function __construct()
    {
        $this->middleware('web');
    }

    public function index(){}

}
