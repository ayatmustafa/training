<?php

namespace Modules\ConfigModule\Database\Seeders;
use Modules\ConfigModule\Database\Seeders\SeedDivisionSeederTableSeeder;
use Modules\ConfigModule\Database\Seeders\SeedSchoolsSeederTableSeeder;
use Modules\ConfigModule\Database\Seeders\SeedSectionsSeederTableSeeder;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Modules\ConfigModule\Entities\Division;

class ConfigModuleDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //  $this->call(SeedSchoolsSeederTableSeeder::class);
        // $this->call(SeedDivisionSeederTableSeeder::class);
        $this->call(SeedSectionsSeederTableSeeder::class);
    }
}
