<?php

use Illuminate\Database\Seeder;
use App\Role;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $role_admin = new Role();
        // $role_admin->name = 'Admin';
        // $role_admin->save();

        // $role_customer = new Role();
        // $role_customer->name = 'Customer';
        // $role_customer->save();

        DB::table('roles')->insert($this->getRoles());
    }

    private function getRoles(){
        return 
        [
            [
             'id' => 1,
             'name' => 'admin'],  
            [
             'id' => 11,
             'name' => 'customer']
        ];
    }
}
