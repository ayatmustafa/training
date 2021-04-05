<?php

namespace Modules\ConfigModule\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Modules\Config\Entities\School;

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
            'name' => 'CBC',
            'address' => 'Hatay2 ElAhram',
            'logo' =>'',
            'user_id'=>1,
            'en' => [
                'long_name' => "centeral",
                'short_name'=>'NVIS',
                'branch_name'=>'shekhzayed'
            ]
            
        ]);
        School::create([
            'name' => 'NVIS',
            'address' => 'October',
            'logo' =>'',
            'user_id'=>1,
            'en' => [
                'long_name' => "New Vision International School",
                'short_name'=>'NVIS',
                'branch_name'=>'shekhzayed'
            ]
        ]);

        // $this->call("OthersTableSeeder");
    }
}
