<?php

namespace App\Http\Controllers;

use App\Teacher;
use App\Course;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\App;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $teachers = Teacher::orderBy('id', 'desc')->paginate(10);
        return view('backend.teachers.index', compact('teachers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.teachers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'name'              => 'required|string|max:255',
            'gender'            => 'required|string',
            'section'            => 'required|string',
        ]);

        $user = Teacher::create([
            'name'      => $request->name,
            'gender'     => $request->gender,
            'phone'  => $request->phone,
            'section'  => $request->section,

        ]);

        return redirect()->route('teacher.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function show(Teacher $teacher)
    {
         $courses = Course::where('teacher_id' , $teacher->id)->orderBy('id', 'desc')->paginate(25);
         return view('backend.teachers.show' , compact ('courses', 'teacher'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function edit(Teacher $teacher)
    {
        $teacher = Teacher::findOrFail($teacher->id);

        return view('backend.teachers.edit', compact('teacher'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Teacher $teacher)
    {
        $request->validate([
            'name'              => 'required|string|max:255',
            'gender'            => 'required|string',
            'section'            => 'required|string',
        ]);


        $teacher->update([
            'name'      => $request->name,
            'gender'     => $request->gender,
            'phone'  => $request->phone,
            'section'  => $request->section,

        ]);


        return redirect()->route('teacher.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function destroy(Teacher $teacher)
    {
        $teacher = Teacher::findOrFail($teacher->id);

        $teacher->delete();

        return back();
    }

}
