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
        
        //assign permission to role
        Role::where('name', '=', 'dev')->first()->givePermissionTo(Permission::where('name', '=', 'create request')->first());
        Role::where('name', '=', 'dev')->first()->givePermissionTo(Permission::where('name', '=', 'edit request')->first());
        Role::where('name', '=', 'sale')->first()->givePermissionTo(Permission::where('name', '=', 'create request')->first());
        Role::where('name', '=', 'sale')->first()->givePermissionTo(Permission::where('name', '=', 'edit request')->first());
        Role::where('name', '=', 'sale-management')->first()->givePermissionTo(Permission::where('name', '=', 'create request')->first());
        Role::where('name', '=', 'sale-management')->first()->givePermissionTo(Permission::where('name', '=', 'edit request')->first());
     }

     public function showRole()
     {

     }

     public function showPermission()
     {
         
     }

    
}
