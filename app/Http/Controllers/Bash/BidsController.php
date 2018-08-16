<?php

namespace App\Http\Controllers\Bash;

use App\Http\Controllers\Controller;
use App\Models\Bids\ModelName as Bids;

class BidsController extends Controller
{

    /**
     * BidsController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $rows = Bids::all();
        return view('bashkaruu.bids.index', compact('rows'));
    }

    public function show($id)
    {
        $row = Bids::find($id);
        return view('bashkaruu.bids.show', compact('row'));
    }

    public function create(){}
    public function store(){}
    public function edit(){}
    public function update(){}
    public function destroy(){}

}