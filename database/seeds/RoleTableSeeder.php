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
        $role_student = new Role();
        $role_student->name = 'Student';
        $role_student->save();

        $role_lecturer = new Role();
        $role_lecturer->name = 'Lecturer';
        $role_lecturer->save();

        $role_admin = new Role();
        $role_admin->name = 'School Admin';
        $role_admin->save();

        $role_system = new Role();
        $role_system->name = 'System Admin';
        $role_system->save();
    }
}
