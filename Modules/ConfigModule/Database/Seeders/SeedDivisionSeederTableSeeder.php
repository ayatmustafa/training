<?php

namespace Modules\ConfigModule\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Modules\ConfigModule\Entities\Division;


class SeedDivisionSeederTableSeeder extends Seeder
{ 
    public function run()
    {
    Division::create([
        'school_id' => 1,
        'logo'=>'',
        'en' => [
            'name' => "IB"
        ]
    ]);
    Division::firstOrCreate([
        'school_id' => 2,
        'logo'=>'',
        'en' => [
            'name' => "IB"
        ]
    ]);
    Division::firstOrCreate([
        'school_id' => 1,
        'logo'=>'',
        'en' => [
            'name' => "Amirican"
        ]
    ]);
    Division::firstOrCreate([
        'school_id' => 2,
        'logo'=>'',
        'en' => [
            'name' => "Amirican"
        ]
    ]);
}
}