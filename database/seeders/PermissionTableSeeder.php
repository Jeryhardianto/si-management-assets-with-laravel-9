<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $authorities = config('permission.authorities');
        // dd($authorities);
        $listPermissions = []; 
        $superAdminPermissions = []; 
        $adminPermissions = []; 
        $editorPermissions = [];

        foreach($authorities as $label => $permissions){
            foreach($permissions as $permission){
                $listPermissions[] = [
                    'name' => $permission,
                    'guard_name' => 'web',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s')
                ];
          

            // Super Admin
            $superAdminPermissions[] = $permission;
            // Admin
            if(in_array($label, ['manage_assets', 'manage_categories', 'manage_golongans','manage_satuans'])){
                $adminPermissions[] = $permission;
            }
            // Editor
            // if(in_array($label, ['manage_posts'])){
            //     $editorPermissions[] = $permission;
            // }
         }
        }
        // dd('Admin',$adminPermissions);
        // dd('Editor',$editor);
        // Insert permissions
        Permission::insert($listPermissions);
        // Insert Role
        // Super Admin
        $superAdmin = Role::create([      
        'name' => 'SuperAdmin',
        'guard_name' => 'web',
        'created_at' => date('Y-m-d H:i:s'),
        'updated_at' => date('Y-m-d H:i:s')]);

         // Admin
         $admin = Role::create([      
            'name' => 'Admin',
            'guard_name' => 'web',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')]);
        //  Editor
        // $editor = Role::create([      
        //     'name' => 'Editor',
        //     'guard_name' => 'web',
        //     'created_at' => date('Y-m-d H:i:s'),
        //     'updated_at' => date('Y-m-d H:i:s')]);

            // Role -> permissions / Memberikan permissions
            $superAdmin->givePermissionTo($superAdminPermissions);
            $admin->givePermissionTo($adminPermissions);
            // $editor->givePermissionTo($editorPermissions);
            
            // Insert user Super Admin
            $userSuperAdmin = User::find(1)->assignRole('SuperAdmin');

    }
}
