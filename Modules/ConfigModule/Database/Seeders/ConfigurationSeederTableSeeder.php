<?php

namespace Modules\ConfigModule\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\ConfigModule\Entities\Configuration;

class ConfigurationSeederTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Configuration::firstOrCreate([
            'key' => 'locales',
            'value' => config('defines.locales')
        ]);
    }
}
