<?php

use App\Models\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $smd = User::create([
            'name' => 'SMD',
            'email' => 'SMD@app.com',
            'password' => bcrypt('12345678'),
        ]);
        $smd->attachRole('SMD');
        $teacher = User::create([
            'name' => 'Teacher',
            'email' => 'teacher@app.com',
            'password' => bcrypt('12345678'),
        ]);
        $teacher->attachRole('TEACHER');
    } // en of run
} // end of seeder
