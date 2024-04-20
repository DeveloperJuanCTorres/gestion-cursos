<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $course = Course::all();
        return $course;
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
                'date_ini' => 'required',
                'date_end' => 'required',
                'type' => 'required',
            ]);

            $course = new Course();
            $course->name = $request->name;
            $course->schedule = $request->schedule;
            $course->date_ini = $request->date_ini;
            $course->date_end = $request->date_end;
            $course->type = $request->type;

            $course->save();
        } catch (\Throwable $th) {
            return $th->getMessage();
        }        
    }

    /**
     * Display the specified resource.
     */
    public function show(Course $course)
    {
        $course = Course::findOrFail($course->id);
        return $course;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Course $course)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Course $course)
    {
        $course_request = Course::findOrFail($course->id);

        try {
            $request->validate([
                'name' => 'required|max:100',
                'date_ini' => 'required',
                'date_end' => 'required',
                'type' => 'required',
            ]);

            $course_request->name = $request->name;
            $course_request->schedule = $request->schedule;
            $course_request->date_ini = $request->date_ini;
            $course_request->date_end = $request->date_end;
            $course_request->type = $request->type;

            $course_request->save();

            return $course_request;
        } catch (\Throwable $th) {
            return $th->getMessage();
        }        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Course $course)
    {
        $course_request = Course::destroy($course->id);
        return $course_request;
    }

    /**
     * Total de cursos.
     */
    public function TotalCourses()
    {
        $total = Course::all()->count();
        return $total;
    }
}
