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
    } // en of run
} // end of seeder
