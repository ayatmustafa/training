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
        'logo'=>'IB',
        'en' => [
            'name' => "IB"
        ]
    ]);
    Division::create([
        'school_id' => 1,
        'logo'=>'American',
        'en' => [
            'name' => "American"
        ]
    ]);
    Division::create([
        'school_id' => 2,
        'logo'=>'American',
        'en' => [
            'name' => "American"
        ]
    ]);
}
}