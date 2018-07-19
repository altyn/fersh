<?php

namespace App\Http\Controllers\Bash;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User\ModelName as User;
use Spatie\Permission\Models\Role as Role;
use App\Models\UserVerify\ModelName as VerifyUsers;
use App\Models\UserDetails\ModelName as UserDetails;
use App\Models\UserPortfolio\ModelName as UserPortfolio;

use Illuminate\Support\Facades\Mail;
use App\Mail\WelcomeInfoMail;

use DB;

class FreelancerController extends Controller
{

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(){
        $freelancers = UserDetails::where('freelancer',1)->paginate();
        return view('bashkaruu.freelancer.index', compact('freelancers'));
    }

    /**
     *
     */
    public function create(){}

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($id){
        $freelancer = UserDetails::findOrFail($id);
        return view('bashkaruu.freelancer.show',compact('freelancer'));
    }

    /**
     *
     */
    public function edit(){}

    /**
     *
     */
    public function destroy(){}

    public function freelancersjs(Request $request)
    {
        $columns = array( 
                        0 => 'id', 
                        1 => 'login',
                        2 => 'email',
                        3 => 'activated'
                    );
  
        $totalData = User::count();
            
        $totalFiltered = $totalData; 

        $limit = $request->input('length');
        $start = $request->input('start');
        $order = $columns[$request->input('order.0.column')];
        $dir = $request->input('order.0.dir');
            
        if(empty($request->input('search.value')))
        {            
            $users = User::offset($start)
                        ->limit($limit)
                        ->orderBy($order,$dir)
                        ->get();
        }else {
            $search = $request->input('search.value'); 

            $users =  User::where('id','LIKE',"%{$search}%")
                            ->orWhere('login', 'LIKE',"%{$search}%")
                            ->offset($start)
                            ->limit($limit)
                            ->orderBy($order,$dir)
                            ->get();

            $totalFiltered = User::where('id','LIKE',"%{$search}%")
                             ->orWhere('login', 'LIKE',"%{$search}%")
                             ->count();
        }

        $data = array();
        if(!empty($users))
        {
            foreach ($users as $user)
            {
                $show =  route('freelancers.show',$user->id);
                $edit =  route('freelancers.edit',$user->id);

                $nestedData['id'] = $user->id;
                // $login = substr(strip_tags($user->login),0,1)."...";
                $nestedData['login'] = '<span>'.$user->login.'</span>';

                // $nestedData['email'] = substr(strip_tags($user->email),0,50)."...";
                $nestedData['email'] = $user->email;

                if($user->activated == 0){
                    $isactive = "-";
                }else{
                    $isactive = "<span class='item_edit'><i class='os-icon os-icon-ui-02'></i></span>";
                }
                $nestedData['activated'] = $isactive;

                $profile = UserDetails::where('user_id', $user->id)->first();
                $portfolio = UserPortfolio::where('user_id', $user->id)->first();

                $isprofile = "&emsp;<a href='/ru/freelancer/".$user->id."' target='_blank' class='item_edit btn btn-outline-primary btn-sm'>Профиль</a>";
                $isportfolio = "&emsp;<a href='/ru/freelancer/".$user->id."/portfolio' target='_blank' class='item_edit btn btn-outline-success btn-sm'>Портфолио</a>";
                
                if(!empty($profile)){
                    $nestedData['profile'] = $isprofile;
                }else{
                    $nestedData['profile'] = "";

                }
                
                if(!empty($portfolio)){
                    $nestedData['portfolio'] = $isportfolio;
                }else{
                    $nestedData['portfolio'] = "";

                }
                $nestedData['options'] = "&emsp;<a href='{$show}' login='SHOW' class='item_edit'><i class='os-icon os-icon-mail-18'></i></a>
                                          &emsp;<a href='{$edit}' login='EDIT' class='item_edit'><i class='os-icon os-icon-ui-49'></i></a>";
                $data[] = $nestedData;

            }
        }
          
        $json_data = array(
                        "draw"            => intval($request->input('draw')),  
                        "recordsTotal"    => intval($totalData),  
                        "recordsFiltered" => intval($totalFiltered), 
                        "data"            => $data   
                    );
            
        echo json_encode($json_data); 
        
    }

}
