<?php

namespace Modules\ConfigModule\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Modules\ConfigModule\Entities\Section;

class SeedSectionsSeederTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Section::create([
            'status'=>'active',
            'division_id'=>1,
            'en' => [
                'name' => "pyp"
            ]
        ]);
        Section::create([
            'status'=>'active',
            'division_id'=>1,
            'en' => [
                'name' => "myp"
            ]
        ]);
        Section::create([
            'status'=>'active',
            'division_id'=>1,
            'en' => [
                'name' => "DP"
            ]
        ]);
        Section::create([
            'status'=>'active',
            'division_id'=>2,
            'en' => [
                'name' => "Amirican"
            ]
        ]);
        
    }
}
