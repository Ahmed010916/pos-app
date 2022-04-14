<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class user_rolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $user_id = User::insertGetId([
            'name' =>    'Ahmed',
            'email' =>   'Ahmed@gmail.com',
            "password"=> Hash::make('123456'),
        ]);

        $role = Role::create(['name'=>'admin']);

        $cruds = ['create','read','update','delete'];


        $prem = [
            'users','products'
        ];

        foreach ($prem as $pre) {
           foreach ($cruds as $crud) {
                Permission::create([
                    'name'=> $crud.'_'.$pre
                ]);
           }
        }

       $Permission=Permission::all();
       $role->attachPermissions($Permission);
       $user = User::find($user_id);
       $user->attachPermissions($Permission);
       $user->attachRole($role);
    }
}
