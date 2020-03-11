<?php
use Illuminate\Database\Seeder;
use App\User;
use App\Role;
class StudentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_student = Role::where('name', 'Student')->first();

        for ($i=10; $i<500; $i++)
        $student = new User();
        $student->first_name = 'student'.$i;
        $student->last_name = 'Visitor'.$i;
        $student->email = 'student'.$i.'@example.com';
        $student->password = bcrypt('admin');
        $student->save();
        $student->roles()->attach($role_student);

    }
}
