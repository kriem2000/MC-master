<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Speciality;

class SpecialitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Speciality::create([
            "name" => "Weight loss specialty",
            "description" => "يهتم طب التخسيس بعلاج جميع الأمراض التي تصيب الوزن" ,
            "Speciality_img"=>"http://127.0.0.1:8000/img/casos-clinicos-768x465.png",


        ]);

        Speciality::create([
            "name" => "Beauty and care specialty",
            "description" => "يهتم هذا التخصص بالعناية والتجميل ",
            "Speciality_img" => "http://127.0.0.1:8000/img/WhatsApp Image 2022-08-18 at 9.29.42 AM.jpeg",

        ]);

        Speciality::create([
            "name" => "Ophthalmology  specialty",
            "description" => "يهتم طب العيون بعلاج جميع الأمراض التي تصيب العين",
            "Speciality_img"=>"http://127.0.0.1:8000/img/OIP.jpg",

        ]);

        Speciality::create([
            "name" => "Dermatology specialty",
            "description" => "يهتم طب الجلدية بعلاج جميع الأمراض التي تصيب الجلد",
            "Speciality_img"=>"http://127.0.0.1:8000/img/Image 2022-08-18 at 9.29.25 AM.jpeg",

        ]);
    }
}
