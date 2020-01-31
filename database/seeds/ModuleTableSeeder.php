<?php

use Illuminate\Database\Seeder;
use App\Module;

class ModuleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $module = new Module();
        $module->name = 'UX';
        $module->moduleCode = '41002';
        $module->save();

        $module = new Module();
        $module->name = 'Cyber Security';
        $module->moduleCode = '31004';
        $module->save();

        $module = new Module();
        $module->name = 'Agile Software Development';
        $module->moduleCode = '41001';
        $module->save();

    }
}
