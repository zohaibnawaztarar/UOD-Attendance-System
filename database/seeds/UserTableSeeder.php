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
        $role_student = Role::where('name', 'Student')->first();
        $role_lecturer = Role::where('name', 'Lecturer')->first();
        $role_admin = Role::where('name', 'School Admin')->first();
        $role_system = Role::where('name', 'System Admin')->first();

        $student = new User();
        $student->first_name = 'student';
        $student->last_name = 'Visitor';
        $student->email = 'student@example.com';
        $student->password = bcrypt('admin');
        $student->save();
        $student->roles()->attach($role_student);
        $admin = new User();
        $admin->first_name = 'school admin';
        $admin->last_name = 'alex';
        $admin->email = 'admin@example.com';
        $admin->password = bcrypt('admin');
        $admin->save();
        $admin->roles()->attach($role_admin);
        $lecturer = new User();
        $lecturer->first_name = 'lecturer';
        $lecturer->last_name = 'andy';
        $lecturer->email = 'lecturer@example.com';
        $lecturer->password = bcrypt('admin');
        $lecturer->save();
        $lecturer->roles()->attach($role_lecturer);
        $system = new User();
        $system->first_name = 'sys admin';
        $system->last_name = 'Jack';
        $system->email = 'system@example.com';
        $system->password = bcrypt('admin');
        $system->save();
        $system->roles()->attach($role_system);
    }
}
