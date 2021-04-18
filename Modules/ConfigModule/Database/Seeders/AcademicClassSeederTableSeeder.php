<?php

namespace Modules\ConfigModule\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Modules\ConfigModule\Entities\AcademicClass;

class AcademicClassSeederTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        AcademicClass::create([
            'division_id'=>1,
            'grade_id'=>2,
            'name'=>'MYP2a',
            'user_id'=>1,


        ]);
        AcademicClass::create([
            
            'division_id'=>1,
            'grade_id'=>1,
            'name'=>'pyp1a',
            'user_id'=>1,
        ]);
    }
}
