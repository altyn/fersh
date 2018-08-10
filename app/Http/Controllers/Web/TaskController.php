<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\DB;

use App\Models\Spec\ModelName as Spec;
use App\Models\UserDetails\ModelName as UserDetails;
use App\Models\Home\ModelName as Home;
use App\Models\Blog\ModelName as Blog;

class WebController extends Controller
{
    public function new() 
    {
        return view('web.task.new');
    }
}
