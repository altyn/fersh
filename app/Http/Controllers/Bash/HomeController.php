<?php

namespace App\Http\Controllers\Bash;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Home\ModelName as Home;

use App\Models\UserDetails\ModelName as UserDetails;

class HomeController extends Controller
{

       public function edit()
    {
        $row =  Home::where('id', 1)->first();
        if($row->active_users) {
            $row->active_users = implode(",", $this->getUsersName($row->active_users));
        }

        $freelancers = UserDetails::where('freelancer',1)->get();
        // $freelancers = UserDetails::first()->getFio();
        return view('bashkaruu.home.edit', compact('row', 'freelancers'));
    }

    public function update(Request $request)
    {
        $row = Home::where('id', 1)->first();

        $row->update($request->except('active_users'));

        $usersList = $request->input('active_users');
        // dd($usersList);

        if($usersList != null) {
            $row->active_users = $this->getUsersId($usersList);
            $row->save();
        }else {
            $row->active_users = '';
            $row->save();
        }


        $row->save();
 
        return redirect()->route('home.edit');
    }

    private function getUsersId(String $data){
        $users = explode(',', $data);

        // dd($users);
        foreach ($users as $key => $fio)
        {
            if(!is_numeric($fio) && !empty($fio))
            {
                $frees = UserDetails::where('freelancer', 1)->get();
                foreach ($frees as $free) {
                    if($free->getFio() == $fio){
                        $users[$key] = $free->user_id;
                    }
                }
            }
        }
        return json_encode($users);
    }

    private function getUsersName(String $data){
        $dataList = [];
        if($data){
            foreach (json_decode($data) as $value => $id)
            {
                if(is_numeric($id) && !empty($id))
                {
                    $user = UserDetails::where('user_id', $id)->first();
                    $dataList[$value] = $user->getFio();
                }
            }
        }
        return $dataList;
    }
}
