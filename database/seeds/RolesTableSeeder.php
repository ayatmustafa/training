<?php

use App\Models\Role;
use Illuminate\Database\Seeder;

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
    }
}
