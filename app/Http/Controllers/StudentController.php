<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $student = Student::all();
        return $student;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required|max:100',
                'last_name' => 'required|max:100',
                'age' => 'required|min:18',
                'card' => 'required|max:11',
                'email' => 'required|unique:students',
            ]);

            $student = new Student();
            $student->name = $request->name;
            $student->last_name = $request->last_name;
            $student->age = $request->age;
            $student->card = $request->card;
            $student->email = $request->email;
            $student->courses = $request->courses;

            $student->save();
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
        
    }

    /**
     * Display the specified resource.
     */
    public function show(Student $student)
    {
        $student_request = Student::findOrFail($student->id);
        return $student_request;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Student $student)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Student $student)
    {
        $student_request = Student::findOrFail($student->id);
        try {
            $request->validate([
                'name' => 'required|max:100',
                'last_name' => 'required|max:100',
                'age' => 'required|min:18',
                'card' => 'required|max:11',
                'email' => 'required|unique:students',
            ]);

            $student_request->name = $request->name;
            $student_request->last_name = $request->last_name;
            $student_request->age = $request->age;
            $student_request->card = $request->card;
            $student_request->email = $request->email;
            $student_request->courses = $request->courses;

            $student_request->save();

            return $student_request;
        } catch (\Throwable $th) {
            return $th->getMessage();
        }        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student)
    {
        $student_request = Student::destroy($student->id);
        return $student_request;
    }

    /**
     * Mostrar top 3 de los cursos con mas estudiantes en los ultimos 6 meses.
     */
    public function top3()
    {
        
    }
     
}
