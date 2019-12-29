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
        $student->first_name = 'Victor';
        $student->last_name = 'Visitor';
        $student->email = 'student@example.com';
        $student->password = bcrypt('student');
        $student->save();
        $student->roles()->attach($role_student);
        $admin = new User();
        $admin->first_name = 'Alex';
        $admin->last_name = 'Admin';
        $admin->email = 'admin@example.com';
        $admin->password = bcrypt('admin');
        $admin->save();
        $admin->roles()->attach($role_admin);
        $lecturer = new User();
        $lecturer->first_name = 'Andy';
        $lecturer->last_name = 'Author';
        $lecturer->email = 'lecturer@example.com';
        $lecturer->password = bcrypt('lecturer');
        $lecturer->save();
        $lecturer->roles()->attach($role_lecturer);
        $system = new User();
        $system->first_name = 'Andy';
        $system->last_name = 'Author';
        $system->email = 'system@example.com';
        $system->password = bcrypt('system');
        $system->save();
        $system->roles()->attach($role_system);
    }
}
