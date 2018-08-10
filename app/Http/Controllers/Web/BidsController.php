<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Spec\ModelName as Spec;

class BidsController extends Controller
{
    public function __construct()
    {
        $this->middleware('web');
    }

    public function new(){
        $specs = Spec::select('id', 'title')->orderBy('id','asc')->get();
        return view('web.bid.new', compact('specs'));
    }
}
