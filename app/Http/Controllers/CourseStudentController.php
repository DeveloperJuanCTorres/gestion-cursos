<?php

namespace App\Http\Controllers;

use App\Models\CourseStudent;
use App\Models\course;
use App\Models\Student;
use Illuminate\Http\Request;

class CourseStudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $course_student = CourseStudent::all();
        return $course_student;
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
            for ($i=0; $i < count($request->all()); $i++) { 
                $course_student = new CourseStudent();
                $course_student->status = true;
                $course_student->course_id = $request[$i]['course_id'];
                $course_student->student_id = $request[$i]['student_id'];

                $course_student->save();
            }
            return response()->json(['status' => true, 'msg' => "La Asignacion se registro correctamente"]);
        } catch (\Throwable $th) {
            return response()->json(['status' => false, 'msg' => $th->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {
        $course_student = CourseStudent::where('student_id', $request->id)->get();
        return $course_student;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CourseStudent $courseStudent)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, CourseStudent $courseStudent)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        try {
            $id = $request->input('id');
            $course_student = CourseStudent::destroy($id);
            return response()->json(['status' => true, 'msg' => "La Asignacion se eliminó correctamente"]);
        } catch (\Throwable $th) {
            return response()->json(['status' => true, 'msg' => $th->getMessage()]);
        }
    }

    public function getCoursesForStudent(Request $request)
    {
        $courses = CourseStudent::where('student_id', $request->id)
            ->with('course')
            ->get();

        return response()->json($courses->pluck('course'));
    }

    public function getStatistics()
    {
        $topStudents = Student::select('students.id', 'students.name', 'students.last_name', \DB::raw('COUNT(course_students.course_id) as courses_count'))
            ->join('course_students', 'students.id', '=', 'course_students.student_id')
            ->groupBy('students.id', 'students.name', 'students.last_name')
            ->orderByRaw('courses_count DESC')
            ->take(3)
            ->get();

        $topCourses = CourseStudent::select('courses.id', 'courses.name', \DB::raw('COUNT(course_students.student_id) as students_count'))
            ->join('courses', 'course_students.course_id', '=', 'courses.id')
            ->groupBy('courses.id', 'courses.name')
            ->orderByRaw('students_count DESC')
            ->take(3)
            ->get();

        $totalCourses = Course::count();
        $totalStudents = Student::count();

        return response()->json([
            'topStudents' => $topStudents,
            'topCourses' => $topCourses,
            'totalCourses' => $totalCourses,
            'totalStudents' => $totalStudents,
        ]);
    }
}
