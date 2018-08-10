<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Spec\ModelName as Spec;
use App\Http\Requests\BidsRequests;
use App\Models\Bids\ModelName as Bids;

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
