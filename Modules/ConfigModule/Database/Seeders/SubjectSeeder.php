<?php

namespace Modules\ConfigModule\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\ConfigModule\Entities\Subject;
use Illuminate\Database\Eloquent\Model;

class SubjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
{
        Subject::firstOrCreate(["name" => "Arabic"]);
        Subject::firstOrCreate(["name" => "English"]);
        Subject::firstOrCreate(["name" => "French"]);
        Subject::firstOrCreate(["name" => "German"]);
        Subject::firstOrCreate(["name" => "Science"]);
        Subject::firstOrCreate(["name" => "Math"]);
        Subject::firstOrCreate(["name" => "Economics"]);
    }
}
