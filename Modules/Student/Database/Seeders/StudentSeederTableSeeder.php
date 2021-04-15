<?php

namespace Modules\Student\Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Modules\Student\Entities\Student;

class StudentSeederTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user_id=User::where('email','ahmed.nabil65@gmail.com')->first();

        Student::create([
            'gender' => 'male',
            'father_contact_mobile'=>'01156500000',
            'father_contact_telephone'=>'0233822686',
            'father_contact_email_official'=>'nabil.ali65@gmail.com',
            'father_birth_date'=>'',
            'father_occupation'=>'Accounting',
            'mother_contact_mobile'=>'01006019340',
            'mother_contact_email_official'=>'amal.fathy@gmail.com',
            'official_email'=>'ahmed.nabil65@gmail.com',
            'mother_birth_date'=>'',
            'mother_occupation'=>'doctor',
            'division_id'=>1,
            'grade_id'=>2,
            'school_id'=>1,
            'birth_date'=>'',
            'code'=>34,
            'section_id'=>2,
            'user_id'=>$user_id->id,

            'en' => [
                'first_name' => 'Ahmed',
                'middle_name'=>'Nabil',
                'gender'=>'male',
                'religion'=>'muslim',
                'nationality'=>'egyption',
                'father_first_name'=>'Nabil',
                'father_middle_name'=>'Ali',
                'father_last_name'=>'khalil',
                'father_religion'=>'muslim',
                'father_nationality'=>'egyption',
                'father_address'=>'fasel',
                'mother_first_name'=>'Amal',
                'mother_middle_name'=>'Fathy',
                'mother_last_name'=>'Ragheb',
                'mother_religion'=>'muslim',
                'mother_nationality'=>'Egyption',
                

            ]
        ]);
        $user_id=User::where('email','omar.nabil65@gmail.com')->first();

        Student::create([
            'gender' => 'male',
            'father_contact_mobile'=>'01156500000',
            'father_contact_telephone'=>'0233822686',
            'father_contact_email_official'=>'nabil.ali65@gmail.com',
            'father_birth_date'=>'',
            'father_occupation'=>'Accounting',
            'mother_contact_mobile'=>'01006019340',
            'mother_contact_email_official'=>'amal.fathy@gmail.com',
            'official_email'=>'omar.nabil65@gmail.com',
            'mother_birth_date'=>'',
            'mother_occupation'=>'doctor',
            'division_id'=>1,
            'grade_id'=>1,
            'school_id'=>1,
            'birth_date'=>'',
            'code'=>35,
            'section_id'=>1,
            'user_id'=>$user_id->id,

            'en' => [
                'first_name' => 'Omar',
                'middle_name'=>'Nabil',
                'gender'=>'male',
                'religion'=>'muslim',
                'nationality'=>'egyption',
                'father_first_name'=>'Nabil',
                'father_middle_name'=>'Ali',
                'father_last_name'=>'khalil',
                'father_religion'=>'muslim',
                'father_nationality'=>'egyption',
                'father_address'=>'fasel',
                'mother_first_name'=>'Amal',
                'mother_middle_name'=>'Fathy',
                'mother_last_name'=>'Ragheb',
                'mother_religion'=>'muslim',
                'mother_nationality'=>'Egyption',
                

            ]
        ]);
      
    }
}
