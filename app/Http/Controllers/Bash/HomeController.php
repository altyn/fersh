<?php

namespace App\Http\Controllers\Bash;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Home\ModelName as Home;

use App\Models\UserDetails\ModelName as UserDetails;

class HomeController extends Controller
{

    public function index()
    {
        // $users = Home::select('active_users')->get();

        $freelancers = UserDetails::where('freelancer',1)->get();
        return view('bashkaruu.home.index', compact('freelancers'));
    }

    public function create()
    {
        $row = Home::first();
        return redirect()->route('home.show', $row);
    }

    public function store(Request $request)
    {
        $row = Home::first();
        return redirect()->route('home.show', $row);
    }


    public function show()
    {
        $row = Home::first();
        return redirect()->route('home.show', $row);
    }

    public function edit()
    {
        $row = Home::first();
        $freelancers = UserDetails::where('freelancer',1)->get();
        return view('bashkaruu.home.edit', compact('row', 'freelancers'));
    }

    public function update(Request $request)
    {

        Home::create($request->all());
 
        return redirect()->route('home.index', $row);
    }

    public function destroy()
    {
        //
    }
}
