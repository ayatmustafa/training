<?php

namespace Modules\ConfigModule\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Modules\ConfigModule\Entities\School;

class SeedSchoolsSeederTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        School::create([
            'user_id' =>1,
            'lat'=>'2654.2584',
            'lng'=>'125.588565454698',
            'contacts'=>['mobile'=>'011145826558',
            'fax'=>'852077415'],
            'en' => [
                'long_name' => "centeral",
                'short_name'=>'NVIS',
                'branch_name'=>'shekhzayed',
                'address'=>'shekhzayed',
            ]
            
        ]);
        School::create([
        'user_id' =>1,
        'lat'=>'256.55889564',
        'lng'=>'852.28774',
        'contacts'=>['mobile'=>'46524854',
        'fax'=>'854321048'],
        'en' => [
            'long_name' => "centrlaization ",
            'short_name'=>'CBC',
            'branch_name'=>'hadyk elahram',
            'address'=>'hadyk elahram',
        ]
            ]);
        // $this->call("OthersTableSeeder");
    }
}
