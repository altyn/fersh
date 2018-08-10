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
        if($bids){
            $status = "Спасибо что оставили заявку, в скором времени ваше письмо дойдет до исполнителей";
        } else {
            $status = "К сожалению создать заявку не удалосьб пожалуйста попробуйте еще раз!";
        }
        return back()->with('status', $status);
    }
    
}
