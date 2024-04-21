<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Student;
use App\Models\Course;
use App\Models\CourseStudent;
use App\Models\Admin;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Admin::factory(10)->create();

        Admin::create([
            'name' => 'Juan Carlos',
            'last_name' => 'Torres del castillo',
            'email' => 'jctorresdelcastillo@gmail.com',
            'password' => '123456789'
        ]);

        $rootStudent = Student::create([
            'name' => 'student name',
            'last_name' => 'student last name',
            'age' => 18,
            'card' => '12345678912',
            'email' => 'student@test.com'
        ]);

        $students = collect([$rootStudent]);

        for ($i=0; $i < 20; $i++) { 
            $name = fake()->word;
            $last_name = fake()->word;
            $age = 18;
            $card = substr(md5(time()),0,11);
            $email = fake()->word .rand(1, 100) .substr(md5(time()),0,4) .'@gmail.com';

            $student = Student::create([
                'name' => $name,
                'last_name' => $last_name,
                'age' => $age,
                'card' => $card,
                'email' => $email
            ]);

            $students->push($student); // Agregar los nuevos estudiantes a la colección para futuras iteraciones
        }

        $rootCourse = Course::create([
            'name' => 'Curso name',
            'schedule' => 'Mañana',
            'date_ini' => '2024-04-21',
            'date_end' => '2024-05-21',
            'type' => 'Virtual'
        ]);

        $courses = collect([$rootCourse]);

        for ($i=0; $i < 10; $i++) { 
            $name = fake()->word .substr(md5(time()),0,3);
            $schedule = 'Mañana';
            $date_ini = '2024-04-21';
            $date_end = '2024-04-21';
            $type = 'Virtual';

            $course = Course::create([
                'name' => $name,
                'schedule' => $schedule,
                'date_ini' => $date_ini,
                'date_end' => $date_end,
                'type' => $type
            ]);

            $courses->push($course); // Agregar los nuevos cursos a la colección para futuras iteraciones
        }

        $rootCourseStudent = CourseStudent::create([
            'status' => true,
            'course_id' => 1,
            'student_id' => 1
        ]);

        $course_students = collect([$rootCourseStudent]);

        for ($i=0; $i < 20; $i++) { 
            $status = true;
            $course_id = rand(1, 11);
            $student_id = rand(1, 21);

            $course_student = CourseStudent::create([
                'status' => $status,
                'course_id' => $course_id,
                'student_id' => $student_id
            ]);

            $course_students->push($course_student); // Agregar las nuevas asignaciones a la colección para futuras iteraciones
        }
    }
}
