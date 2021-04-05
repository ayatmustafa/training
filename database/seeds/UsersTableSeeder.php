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
        $user = User::create([
            'name' => 'SMD',
            'email' => 'SMD@app.com',
            'password' => bcrypt('12345678'),
        ]);
        $user->attachRole('SMD');
    } // en of run
} // end of seeder
