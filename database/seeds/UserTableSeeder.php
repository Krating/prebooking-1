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
             'role_id' => 1], 
            [
             'id' => 2,
             'username' => 'Customer',
             'password' => bcrypt('123123'),
             'email' => 'customer@example.com',
             'role_id' => 11],
             [
             'id' => 3,
             'username' => 'Krating',
             'password' => bcrypt('123123'),
             'email' => 'krating.dev@gmail.com',
             'role_id' => 11]
        ];
     }
}
