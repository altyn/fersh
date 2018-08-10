<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\BidsRequests;
use App\Models\Bids\ModelName as Bids;

class BidsController extends Controller
{
    public function __construct()
    {
        $this->middleware('web');
    }

    public function new(){
        return view('web.bid.new');
    }

    public function store(BidsRequests $requests)
    {
        $validated = $requests->validated();

        $bids = Bids::create($validated);

        dd($bids);

    }
    
}
