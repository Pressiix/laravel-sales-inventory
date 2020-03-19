<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Hash;

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

    public function test()
    {
        return User::findUserById('162')->getPermissionsViaRoles();
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
            $role_name= User::getUserRoleById($value['id']);
            $items[$key]['role'][0] = (!empty($role_name) ? $role_name : '');
        }
        
        return view('backend.user',[
            'items' => $items,
            'user' => $user,
            'role' => 'dev',
            'role_dropdown'=>$role_dropdown
        ]);
     }

     //Show role lists on table
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

     //Show permission lists on table
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

     /*
     *
     * if system doesn't have a dev,It will created a dev
     * 
     * assign a dev role to user if user has username = dev
     * 
     **/
     public function genDev()
     {
         $dev_user = User::where('username', 'like', 'dev%')->first();
         $role = Role::where('name', 'like', 'dev%')->first();
         
         if($dev_user)
         {
            return $dev_user->assignRole($role->name);
         }
         else  //if you not have dev in database, system will create dev
         {
            User::create([
                'username' => 'dev',
                'firstname' => 'Watcharaphon',
                'lastname' => 'Piamphuetna',
                'email' => 'watcharapon.piam2@gmail.com',
                'password' => Hash::make('bkpdev'),
                'status' => 'ACTIVE'
            ]);

            return User::where('username', 'like', 'dev%')->first()->assignRole($role->name);
         }
     }

    /**
     * Generate or Regenerate all necessary backend data
     *
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
        Role::create(['name'=>'dev']);
        Role::create(['name'=>'general']);
        Role::create(['name'=>'marketing']);
        Role::create(['name'=>'ad-operation']);
        Role::create(['name'=>'sale']);
        Role::create(['name'=>'sale-management']);
        Role::create(['name'=>'management']);
        //create permission
        Permission::create(['name'=>'create request']);
        Permission::create(['name'=>'edit request']);
        Permission::create(['name'=>'manage user']);
        
        //assign permission to role
        Role::where('name', '=', 'dev')->first()->givePermissionTo(Permission::where('name', '=', 'manage user')->first());
        Role::where('name', '=', 'dev')->first()->givePermissionTo(Permission::where('name', '=', 'create request')->first());
        Role::where('name', '=', 'dev')->first()->givePermissionTo(Permission::where('name', '=', 'edit request')->first());

        Role::where('name', '=', 'sale')->first()->givePermissionTo(Permission::where('name', '=', 'create request')->first());
        Role::where('name', '=', 'sale')->first()->givePermissionTo(Permission::where('name', '=', 'edit request')->first());

        Role::where('name', '=', 'sale-management')->first()->givePermissionTo(Permission::where('name', '=', 'create request')->first());
        Role::where('name', '=', 'sale-management')->first()->givePermissionTo(Permission::where('name', '=', 'edit request')->first());
     
        $this->genDev();
        return redirect('backend/users-display');
    }

     public function showRole(Request $request, $id)
     {
        return User::getUserRoleById($id);
     }

     /*public function showPermission(Request $request, $id)
     {
        return $this->findUserById($id)->getAllPermissions();
     }*/

     public function assignRoleToUser(Request $request)
     {
        $user =User::findUserById($request->user_id);
        if($request->old_role){
            $user->removeRole($request->old_role);
        }
        
        $user->assignRole($request->role_name);

        $permission_array = json_decode($user->getPermissionsViaRoles(),true);
        if(count($permission_array) !== 0)
        {
            foreach($permission_array as $permission)
            {
                $user->givePermissionTo($permission['name']);
            }
        }
        
        return redirect('backend/users-display');
     }

     public function removeRoleFromUser(Request $request, $id, $role)
     {
        User::findUserById($id)->removeRole($role);
        return redirect('backend/users-display');
     }

     public function findUserById($id)
     {
        return User::where('id','=',$id)->first();
     }

     

    
}
