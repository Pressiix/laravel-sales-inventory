<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class DevController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        //
    }

    /** 
    /*Display all user data
    */
    public function showAllUser()
     {
        $user = Auth::user();
        $role_dropdown = array_column(json_decode(json_encode(DB::connection('mysql')->table('roles')->get()), True),'name','id');
        $items = DB::connection('mysql')->table('users')->get()->toArray();
        $items = json_decode(json_encode($items), true);
        foreach($items as $key => $value)
        {
            //add role column to array
            $role_name= (!empty($this->findUserById($value['id'])->getRoleNames()[0]) ? $this->findUserById($value['id'])->getRoleNames()[0] : '');
            $items[$key]['role'][0] = ($role_name !== '' ? $role_name: '');
            
        }
        
       // echo "<pre/>"; print_r($items);
        return view('backend.user',[
            'items' => $items,
            'user' => $user,
            'role' => 'dev',
            'role_dropdown'=>$role_dropdown
        ]);
     }

     public function showAllRole()
     {
        $user = Auth::user();
        $items = array_column(json_decode(json_encode(DB::connection('mysql')->table('roles')->get()), True),'name','id');
        
        return view('backend.role',[
            'items' => $items,
            'user' => $user,
            'role' => 'dev',
        ]);
     }

     public function showAllPermission()
     {
        $user = Auth::user();
        $items = array_column(json_decode(json_encode(DB::connection('mysql')->table('permissions')->get()), True),'name','id');
        
        return view('backend.permission',[
            'items' => $items,
            'user' => $user,
            'role' => 'dev',
        ]);
     }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function createRoleAndPermission()
    {
        //Clear old data before init
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('role_has_permissions')->truncate();
        DB::table('model_has_permissions')->truncate();
        DB::table('model_has_roles')->truncate();
        DB::table('permissions')->truncate();
        DB::table('roles')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        
        //create role
        $role = [
            'dev',
            'general',
            'marketing',
            'ad-operation',
            'sale',
            'sale-management',
            'management'
            ];
        Role::create(['name'=>$role]);

        //create permission
        Permission::create(['name'=>'create request']);
        Permission::create(['name'=>'edit request']);
        Permission::create(['name'=>'manage user']);
        
        //assign permission to role
        Role::where('name', '=', 'dev')->first()->givePermissionTo(Permission::where('name', '=', 'manage user')->first());
        Role::where('name', '=', 'sale')->first()->givePermissionTo(Permission::where('name', '=', 'create request')->first());
        Role::where('name', '=', 'sale')->first()->givePermissionTo(Permission::where('name', '=', 'edit request')->first());
        Role::where('name', '=', 'sale-management')->first()->givePermissionTo(Permission::where('name', '=', 'create request')->first());
        Role::where('name', '=', 'sale-management')->first()->givePermissionTo(Permission::where('name', '=', 'edit request')->first());
     }

     public function showRole(Request $request, $id)
     {
        return $this->findUserById($id)->getRoleNames();
     }

     /*public function showPermission(Request $request, $id)
     {
        return $this->findUserById($id)->getAllPermissions();
     }*/

     public function assignRoleToUser(Request $request)
     {
        if($request->old_role){
            $this->findUserById($request->user_id)->removeRole($request->old_role);
        }
        
        $this->findUserById($request->user_id)->assignRole($request->role_name);
        return $this->showAllUser();
     }

     public function removeRoleFromUser(Request $request, $id, $role)
     {
         $this->findUserById($id)->removeRole($role);
         return $this->showAllUser();
     }

     private function findUserById($id)
     {
        return User::where('id','=',$id)->get()[0];
     }

     public function destroyUserById($id)
     {
        $users = Auth::user($id);
        $users->delete();

        return $this->showAllUser();
     }

    
}
