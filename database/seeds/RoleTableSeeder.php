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
        $role_admin = new Role();
        $role_admin->name = 'Admin';
        $role_admin->description = 'Master User';
        $role_admin->save();

        $role_educator = new Role();
        $role_educator->name = 'Educator';
        $role_educator->description = 'School Principal/Admin Or Teacher';
        $role_educator->save();

        $role_business = new Role();
        $role_business->name = 'Business';
        $role_business->description = 'Business Owner';
        $role_business->save();

    }
}
