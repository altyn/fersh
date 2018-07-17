<?php

namespace App\Http\Controllers\Bash;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User\ModelName as User;
use Spatie\Permission\Models\Role as Role;
use App\Models\UserDetails\ModelName as UserDetails;

class UserController extends Controller
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
        $users = User::all()->paginate();
        return view('bashkaruu.users.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::all()->except('guard_name', 'created_at', 'updated_at');
        $user =  new User;
        return view('bashkaruu.users.create', compact('roles', 'user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'login' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|same:confirm-password',
        ]);

        $input = $request->all();
        $input['password'] = Hash::make($input['password']);

        $user = User::create($input);
        $user->assignRole($request->input('roles'));


        return redirect()->route('users.index')
            ->with('success','User created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::findOrFail($id);
        
        return view('bashkaruu.users.show',compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);
        $roles = Role::get();
        return view('bashkaruu.users.edit',compact('user', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
        // dd($request);
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email,'.$id,
            'password' => 'same:confirm-password',
        ]);

        $input = $request->all();
        if(!empty($input['password'])){
            $input['password'] = Hash::make($input['password']);
        }else{
            $input = array_except($input,array('password'));
        }

        $user = User::findOrFail($id);
        $user->update($input);
        DB::table('model_has_roles')->where('model_id',$id)->delete();

        $user->assignRole($request->input('roles'));

        return redirect()->route('users.index')
            ->with('success','User updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::findOrFail($id)->delete();
        return redirect()->route('users.index')->with('success',
            'User successfully deleted.');
    }

    public function usersjs(Request $request)
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
                $profile = UserDetails::where('user_id', $user->id)->first();

                $nestedData['activated'] = $isactive;
                
                if(!empty($profile)){
                    $nestedData['links'] = "&emsp;<a href='/ru/freelancer/".$user->id."' target='_blank' class='item_edit btn btn-outline-primary btn-sm'>Профиль</a>
                                            &emsp;<a href='/ru/freelancer/".$user->id."/portfolio' target='_blank' class='item_edit btn btn-outline-success btn-sm'>Портфолио</a>";
                }else{
                    $nestedData['links'] = "-";

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