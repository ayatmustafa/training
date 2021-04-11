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
    {   

        $user = User::firstOrCreate([
            'email' => 'SMD@app.com'
        ],
            ['name' => 'SMD',
            
            'password' => bcrypt('12345678'),
        ]);
        $user->roles()->sync([]);
        $user->syncRoles(["SMD"]);
        //$user->attachRole('SMD');

        $student=User::firstOrCreate([
            'email'=>'hebamohey172@gmail.com',
        ],[
            'name'=>'heba',
            
            'password'=>bcrypt('12345678')
        ]);
        $student->roles()->sync([]);
        $student->syncRoles(["Student"]);




       $student1= User::firstOrCreate([
            'email'=>'ahmed.nabil65@gmail.com',
            
        ],[
            'name'=>'Ahmed',
            
            'password'=>bcrypt('12345678')
        ]);
        $student1->roles()->sync([]);
        $student1->syncRoles(["Student"]);




       $student2= User::firstOrCreate([
            'email'=>'omar.nabil65@gmail.com',
        ],[
            'name'=>'Omar',
            
            'password'=>bcrypt('12345678')
        ]);
        $student2->roles()->sync([]);
        $student2->syncRoles(["Student"]);

    } // en of run
} // end of seeder
}