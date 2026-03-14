<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\Student;

class StudentSeeder extends Seeder
{
    public function run(): void
    {
        $firstNames = ['Charles','Jecob','Art','Willge','Carlos','Rosa','Miguel','Luz','Ramon','Elena',
                       'Antonio','Carmen','Luis','Isabel','Pedro','Gloria','Roberto','Patricia',
                       'Eduardo','Maricel','Angelo','Kristine','Mark','Jessa','Ryan','Lovely',
                       'Christian','Hazel','John','Grace','Kevin','Princess','James','Jasmine'];
        $lastNames  = ['Caccam','Demelino','Siojo','Mahinay','Ocampo','Garcia','Mendoza','Torres',
                       'Tomas','Andres','Ramos','Aquino','Villanueva','Fernandez','Lopez','Dela Cruz',
                       'Gonzales','Flores','Rivera','Navarro','Castillo','Morales','Gomez','Ramirez'];
        $municipalities = ['Manila','Quezon City','Makati','Pasig','Taguig','Caloocan',
                           'Cebu City','Davao City','Iloilo','Bacolod','Zamboanga','Cagayan de Oro'];
        $courseCodes = ['BSCS','BSIT','BSCE','BSEE','BSME','BSBA','BSACT','BSMKT',
                        'BSHM','BSTM','BSED','BEED','BSN','BSPT','BSPSY','BSSW',
                        'ABCOM','BSARCH','BSCRIM','BSPHRM'];
        $genders = ['Male','Female'];

        for ($i = 1; $i <= 500; $i++) {
            $firstName = $firstNames[array_rand($firstNames)];
            $lastName  = $lastNames[array_rand($lastNames)];
            $year = rand(2022, 2025);
            $month = rand(6, 11);
            $day = rand(1, 28);

            $studentId = 'STU-' . str_pad($i, 4, '0', STR_PAD_LEFT);
            Student::firstOrCreate(
                ['student_id' => $studentId],
                [
                    'first_name'      => $firstName,
                    'last_name'       => $lastName,
                    'gender'          => $genders[array_rand($genders)],
                    'email'           => strtolower($firstName . '.' . $lastName . $i) . '@school.edu.ph',
                    'course_code'     => $courseCodes[array_rand($courseCodes)],
                    'year_level'      => rand(1, 4),
                    'municipality'    => $municipalities[array_rand($municipalities)],
                    'enrollment_date' => "$year-" . str_pad($month, 2, '0', STR_PAD_LEFT) . "-$day",
                ]
            );
        }
    }
}