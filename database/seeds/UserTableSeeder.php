<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Role;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        // $role_customer = Role::where('name', 'Customer')->first();
        // $role_admin = Role::where('name', 'Admin')->first();

        // $customer = new User();
        // $customer->username = 'Customer';
        // $customer->first_name = 'customer01';
        // $customer->last_name = 'test';
        // $customer->gender = 'Female';
        // $customer->birthday = '1993-02-02';
        // $customer->password = bcrypt('123123');
        // $customer->email = 'customer@example.com';
        // $customer->address = 'cnx';
        // $customer->save();
        // $customer->roles()->attach($role_customer);

        // $admin = new User();
        // $admin->username = 'Admin';
        // $admin->first_name = 'admin01';
        // $admin->last_name = 'test';
        // $admin->gender = 'Male';
        // $admin->birthday = '1993-01-01';
        // $admin->password = bcrypt('123123');
        // $admin->email = 'admin@example.com';
        // $admin->address = 'cnx';
        // $admin->save();
        // $admin->roles()->attach($role_admin);

         DB::table('users')->insert($this->getUsers());
    }

    private function getUsers(){
        return 
        [
            [
             'id' => 1,
             'username' => 'Admin',
             'password' => bcrypt('123123'),
             'email' => 'admin@example.com',
             'first_name' => 'admin01',
             'last_name' => 'test',
             'gender' => 'Male',
             'birthday' => '1993-01-01',
             'address' => 'cnx',
             'role_id' => 1], 
            [
             'id' => 11,
             'username' => 'Customer',
             'password' => bcrypt('123123'),
             'email' => 'customer@example.com',
             'first_name' => 'customer01',
             'last_name' => 'test',
             'gender' => 'Female',
             'birthday' => '1993-02-02',
             'address' => 'cnx',
             'role_id' => 11]
        ];
     }
}
