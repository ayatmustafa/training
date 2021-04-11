<?php

namespace Modules\ConfigModule\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Modules\ConfigModule\Entities\Grade;

class GradeSeederTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Grade::create([
            'name'=>'PYP1',
            'division_id'=>1,
            'section_id'=>1,
        ]);
        Grade::create([
            'name'=>'PYP2',
            'division_id'=>1,
            'section_id'=>1,
        ]);
        Grade::create([
            'name'=>'PYP3',
            'division_id'=>1,
            'section_id'=>1,
        ]);
        Grade::create([
            'name'=>'PYP4',
            'division_id'=>1,
            'section_id'=>1,
        ]);
        Grade::create([
            'name'=>'PYP5',
            'division_id'=>1,
            'section_id'=>1,
        ]);
        Grade::create([
            'name'=>'PYP6',
            'division_id'=>1,
            'section_id'=>1,
        ]);
        Grade::create([
            'name'=>'PYP7',
            'division_id'=>1,
            'section_id'=>1,
        ]);
        Grade::create([
            'name'=>'MYP1',
            'division_id'=>1,
            'section_id'=>1,
        ]);
        Grade::create([
            'name'=>'MYP1',
            'division_id'=>1,
            'section_id'=>2,
        ]); Grade::create([
            'name'=>'MYP2',
            'division_id'=>1,
            'section_id'=>2,
        ]); Grade::create([
            'name'=>'MYP3',
            'division_id'=>1,
            'section_id'=>2,
        ]); Grade::create([
            'name'=>'MYP4',
            'division_id'=>1,
            'section_id'=>2,
        ]);
        Grade::create([
            'name'=>'MYP5',
            'division_id'=>1,
            'section_id'=>2,
        ]);
        Grade::create([
            'name'=>'DP1',
            'division_id'=>1,
            'section_id'=>3,
        ]);
        Grade::create([
            'name'=>'DP2',
            'division_id'=>1,
            'section_id'=>3,
        ]);
        Grade::create([
            'name'=>'G9',
            'division_id'=>2,
            'section_id'=>4,
        ]);
        Grade::create([
            'name'=>'G10',
            'division_id'=>2,
            'section_id'=>4,
        ]);
        Grade::create([
            'name'=>'G11',
            'division_id'=>2,
            'section_id'=>4,
        ]);
        Grade::create([
            'name'=>'G12',
            'division_id'=>2,
            'section_id'=>4,
        ]);
        // $this->call("OthersTableSeeder");
    }
}
