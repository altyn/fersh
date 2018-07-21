<?php

namespace App\Http\Controllers\Bash;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User\ModelName as User;
use Spatie\Permission\Models\Role as Role;
use App\Models\UserDetails\ModelName as UserDetails;
use App\Models\UserView\ModelName as UserView;
use App\Models\UserPortfolio\ModelName as UserPortfolio;

class UserViewController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('bashkaruu.userview.index');
    }

    public function show($id)
    {
        $user = UserView::findOrFail($id);
        
        return view('bashkaruu.userview.show',compact('user'));
    }

    public function userviewsjs(Request $request)
    {

        $columns = array( 
                        0 => 'user_id', 
                        1 => 'auth_id',
                        2 => 'profile',
                        3 => 'profile_email',
                        4 => 'profile_phone',
                        5 => 'created_at',
                    );
  
        $totalData = UserView::count();

            
        $totalFiltered = $totalData; 

        $limit = $request->input('length');
        $start = $request->input('start');
        $order = $columns[$request->input('order.0.column')];
        $dir = $request->input('order.5.dir');
            
        if(empty($request->input('search.value')))
        {            
            $userviews = UserView::offset($start)
                         ->limit($limit)
                         ->orderBy($order,$dir)
                         ->get();
        }else {
            $search = $request->input('search.value'); 

            $userviews =  UserView::where('user_id','LIKE',"%{$search}%")
                            ->orWhere('auth_id', 'LIKE',"%{$search}%")
                            ->offset($start)
                            ->limit($limit)
                            ->orderBy($order,$dir)
                            ->get();

            $totalFiltered = UserView::where('user_id','LIKE',"%{$search}%")
                             ->orWhere('auth_id', 'LIKE',"%{$search}%")
                             ->count();
        }

        $data = array();
        if(!empty($userviews))
        {
            foreach ($userviews as $view)
            {               
                if($view->profile == 1){
                    $page = 'Профиль';
                }else if($view->profile_email == 1){
                    $page = 'Email';
                }else if($view->profile_phone == 1){
                    $page = 'Телефон';
                }else if($view->portfolio == 1){
                    $page = 'Портфолио';
                }else if($view->portfolio_project == 1){
                    $page = 'Проект портфолио';
                }else{
                    $page = 'Error';
                }

                $user_name = UserDetails::where('user_id', '=', $view->user_id)->firstOrFail();

                if(!$user_name){
                    $userName = 'Null';
                }else{
                    $userName = $user_name->first_name.' '.$user_name->last_name;
                }


                $fullDate = $view->created_at;
                $date = date('d-m-Y h:i:s', strtotime($fullDate));

                $nestedData['user_name'] = $userName;
                $nestedData['who_is'] = $userName;
                $nestedData['page'] = $page;
                $nestedData['ip'] = $view->ip_address;
                $nestedData['date'] = $date;

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