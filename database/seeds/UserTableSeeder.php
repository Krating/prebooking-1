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
             'role_id' => 11],
             [
             'id' => 21,
             'username' => 'Krating',
             'password' => bcrypt('123123'),
             'email' => 'krating.dev@gmail.com',
             'first_name' => 'Krating',
             'last_name' => 'Cotanon',
             'gender' => 'Female',
             'birthday' => '1993-02-02',
             'address' => 'cr',
             'role_id' => 11]
        ];
     }
}
