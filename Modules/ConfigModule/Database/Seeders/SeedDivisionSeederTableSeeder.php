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
        'logo'=>'ib',
        'en' => [
            'name' => "IB"
        ]
    ]);
    Division::create([
        'school_id' => 2,
        'logo'=>'ib',
        'en' => [
            'name' => "IB"
        ]
    ]);
    Division::create([
        'school_id' => 1,
        'logo'=>'amirican',
        'en' => [
            'name' => "Amirican"
        ]
    ]);
    Division::create([
        'school_id' => 2,
        'logo'=>'amirican',
        'en' => [
            'name' => "Amirican"
        ]
    ]);
}
}