<?php

namespace App\Http\Controllers;

use App\Course;
use App\Student;
use App\ClassSection;
use App\PaymentPay;
use App\Teacher;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

use Illuminate\Http\Request;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {$teachers = Teacher::all();
        $courses = Course::whereIn('statue', ['active', 'notstarted'])->orderBy('id', 'desc')->paginate(10);
        return view('backend.courses.index', compact('courses' , 'teachers'));
    }

    public function indexld()
    {$teachers = Teacher::all();
        $courses = Course::whereIn('statue', ['active', 'notstarted'])->where('branch' , 'lawan_diploma')->orderBy('stdate', 'desc')->withCount(['students' => function ($query) {
        $query->where('statue', 'active');}])->paginate(10);
        return view('backend.courses.indexld', compact('courses' , 'teachers'));
    }
    public function indexb()
    {$teachers = Teacher::all();
        $courses = Course::whereIn('statue', ['active', 'notstarted'])->where('branch' , 'brayati')->orderBy('stdate', 'desc')->withCount('students')->paginate(10);
        return view('backend.courses.indexb', compact('courses' , 'teachers'));
    }
    public function showfinished()
    {
        $courses = Course::where( 'statue' , 'finished' )->paginate(10);
        
        return view('backend.students.showfinished', compact('courses'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $teachers = Teacher::all();
        $sections = ClassSection::all();
        return view('backend.courses.create' , compact('teachers' , 'sections'));
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
            'stdate'            => 'required',
            'time'            => 'required|string',
            'days'            => 'required|string',
            'branch'            => 'required|string',

        ]);

        $user = Course::create([
            'name'      => $request->name,
            'code'      => $request->code,
            'description'=> $request->description,
            'stdate'     => $request->stdate,
            'time'  => $request->time,
            'days'  => $request->days,
            'branch'  => $request->branch,
            'teacher_id'  => $request->teacher_id,

        ]);

        return redirect()->route('course.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $course = Course::findorfail($id);
$students = Student::where('course_id', $id)
    ->where('statue', 'active')
    ->orderby('created_at', 'desc')
    ->get();
foreach ($students as $student) {
    $lastPayment = PaymentPay::where('student_id', $student->id)
        ->orderBy('date', 'desc')
        ->first();

    $firstPayment = PaymentPay::where('student_id', $student->id)
        ->orderBy('date', 'asc') // Use 'asc' for oldest/first payment
        ->first();
        if($course->statue == 'notstarted'){
        	$carbonDate = $firstPayment->date ;
        	$carbonDate = Carbon::parse($carbonDate);
            $carbonDate = $carbonDate->addDays('27'); 
            if($carbonDate < now()){
        		$student->update([
        		'note' => 'يجب أن يبدأ'
        		]);
		    }
        }
        $student->lastPayment = $lastPayment;
        $student->firstPayment = $firstPayment;
    }
   

        $total = 0 ;
        $totalpaid = 0 ;
        foreach ( $students as $student ){
            $total += $student->fees ;
            $totalpaid += $student->paid ;
        }
        return view('backend.courses.show' , compact('students' , 'course' , 'total' , 'totalpaid'));
    }
    public function show2($id)
    {
        $course = Course::findorfail($id);
        $students = Student::where('course_id' , $id)->get();
        return view('backend.courses.show2' , compact('students' , 'course' ));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Course $course)
    {
        $course = Course::findOrFail($course->id);
        $teachers = Teacher::all();
        $sections = ClassSection::all();
        return view('backend.courses.edit', compact('course' , 'teachers' , 'sections'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Course $course)
    {
        $request->validate([
            'name'              => 'required|string|max:255',
            'stdate'            => 'required',
            'time'            => 'required|string',
            'days'            => 'required|string',
            'branch'            => 'required|string',

        ]);
        if($course->statue == 'notstarted' && $request->statue == "active"){
            $students = Student::where('course_id', $course->id)->get();
            foreach($students as $s){
                if ($s->note ==  'يجب أن يبدأ'){
                    $s->update([
                        'note' => ''
                    ]);
                }
            }
        }
        $course->update([
            'name'      => $request->name,
            'code'      => $request->code,
            'description'  => $request->description,
            'stdate'     => $request->stdate,
            'time'  => $request->time,
            'days'  => $request->days,
            'branch'  => $request->branch,
            'teacher_id'  => $request->teacher_id,
            'statue'  => $request->statue,

        ]);
        if($request->branch == 'brayati')
        {
            return redirect()->route('course.b');
        }
        else{
            return redirect()->route('course.ld');
        }
    }
    public function search(Request $request , $branch)
    {
        $teachers = Teacher::all();
        if($branch == 'a'){
            $courses = Course::where('name','like' , '%'.$request->search.'%')
            ->paginate(25);
            return view('backend.courses.index', compact( 'courses' , 'teachers'));
        }
        elseif($branch == 'b'){
            $courses = Course::where('branch' , 'brayati')->where('name','like' , '%'.$request->search.'%')
            ->paginate(25);
            return view('backend.courses.indexb',  compact( 'courses' , 'teachers'));
        }
        else{
            $courses = Course::where('branch' , 'lawan_diploma')->where('name','like' , '%'.$request->search.'%')
            ->paginate(25);
            return view('backend.courses.indexld',  compact( 'courses' , 'teachers'));

        }
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Course $course)
    {
        $course = Course::findOrFail($course->id);
        $student =  Student::where(  'course_id' , $course->id)->get();
        if($course->branch=='brayati'){
          foreach($student as $s)
          {
               $s->update([
            'course_id'      => '6',
                ]);
          }
        }
        else{
           foreach($student as $s)
          {
               $s->update([
            'course_id'      => '7',
                ]);
          }
        }
        $course->delete();

        return back();
    }
}
