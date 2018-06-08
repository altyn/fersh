<?php

namespace App\Http\Controllers\Bash;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;

use App\Models\User\ModelName as User;

class UserController extends Controller
{
    public function index()
    {
        $result = User::all();

        return view('bashkaruu.users.index',[
            'result' => $result
        ]);
    }
    public function create()
    {
        return view('bashkaruu.users.create', [
            'row' => new User
        ]);
    }
    public function store(Request $request)
    {
        // dd($request);
        $user = User::create($request->except('passwordConfirm'));
        $user->password = bcrypt($request->password);
        $user->save();
    }
    public function show($id)
    {
        $row = User::findOrFail($id);
        return view('bashkaruu.users.show',[
            'row' => $row
        ]);
    }
    public function edit($id)
    {
        $row = User::findOrFail($id);
        return view('bashkaruu.users.edit',[
            'row' => $row
        ]);
    }
    public function update(Request $request, User $row)
    {
        $row->update($request->except('passwordConfirm'));
        return redirect()->route('users.show', $row);
    }
    public function destroy(User $row)
    {
        $row->delete();
        return redirect()->route('users.index');
    }
}
