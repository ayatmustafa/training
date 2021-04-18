<?php

use App\Models\Role;
use Illuminate\Database\Seeder;
use Modules\Teacher\Entities\SectionCoordinator;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $superAdmin = Role::firstOrCreate([
            'name' => 'SMD',
            'display_name' => 'SMD',
            'description' => 'can do anything in the project',
        ]);
        $teacher = Role::firstOrCreate([
            'name' => 'TEACHER',
            'display_name' => 'teacher',
            'description' => 'create online classes',
        ]);   
         Role::firstOrCreate([
            'name' => 'Student',
            'display_name' => 'Student',
            'description' => 'entires student side',
        ]);
        $Section_Coordinator = Role::firstOrCreate([
            'name' => 'SectionCoordinator',
            'display_name' => 'SectionCoordinator',
            'description' => 'create Agenta to section',
        ]);   
    }
}
