<?php

namespace App\Http\Controllers;

use App\Course;
use App\Student;
use App\PaymentDetail;
use App\PaymentPay;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students = Student::orderby('id' , 'desc')->paginate(10);
        $courses = Course::all();
        return view('backend.students.index', compact('students' , 'courses'));
    }
    public function indexld()
    {
        $students = Student::where( 'branch' , 'lawaan_diploma' )->orderby('id' , 'desc')->paginate(10);
        $courses = Course::all();

        return view('backend.students.indexld', compact('students' , 'courses'));
    }
    public function indexlv()
    {
        $students = Student::where( 'branch' , 'lawan_vocational' )->paginate(10);
        $courses = Course::all();
        return view('backend.students.indexlv', compact('students' , 'courses'));
    }
    public function indexb()
    {
        $students = Student::where( 'branch' , 'brayati' )->orderby('id' , 'desc')->paginate(10);
        $courses = Course::all();
                $pstd = Student::where( 'branch' , 'brayati' )->where('statue' , 'active')->where('fees' , '==' , 'paid')->get();
                //dd($pstd);
        return view('backend.students.indexb', compact('students' , 'courses'));
    }

    public function showcancel()
    {
        $students = Student::where( 'statue' , 'cancel' )->paginate(10);
        return view('backend.students.showcancel', compact('students'));
    }
    public function search(Request $request , $branch)
    {
        $courses = Course::all();
        if($branch == 'a'){
            $students = Student::where('fullname','like' , '%'.$request->search.'%')
            ->paginate(25);
            return view('backend.students.index', compact('students' , 'courses'));
        }
        elseif($branch == 'b'){
            $students = Student::where('branch' , 'brayati')
            ->where('fullname','like' , '%'.$request->search.'%')
            ->paginate(25);
            return view('backend.students.indexb', compact('students' , 'courses'));
        }
        else{
            $students = Student::where('branch' , 'lawaan_diploma')
            ->where('fullname','like' , '%'.$request->search.'%')
            ->paginate(25);
            return view('backend.students.indexld', compact('students' , 'courses'));

        }


    }


public function getStudentsWithOutstandingPayments()
{
    $unpaidPayments = DB::table('payments_details')
    ->leftJoin('students', 'payments_details.student_id', '=', 'students.id')
    ->where('payments_details.date', '<=', now())
    ->whereRaw('payments_details.amount > payments_details.paid')
    ->where('students.branch', 'lawaan_diploma')
    ->where('students.statue', 'active')
    ->select(
        'payments_details.student_id',
        'students.fullname',
        'students.note',
        'payments_details.payment_number',
        'payments_details.amount',
        'payments_details.paid',
        'payments_details.date'
    )    
    ->addSelect(DB::raw('(SELECT MAX(date) FROM payments_pays WHERE payments_pays.student_id = students.id) AS last_payment_date'))
    ->get();
    return view('backend.students.paymentscollect', compact('unpaidPayments'));
}

public function firstpayment()
{
    $students = DB::table('payments_details')
    ->leftJoin('students', 'payments_details.student_id', '=', 'students.id')
    ->where('payments_details.date', '<=', now())
    ->where('payments_details.date', '>=', '2023-12-01')
    ->where('payments_details.payment_number', '=', '1')
    ->whereRaw('payments_details.amount > payments_details.paid')
    ->where('students.branch', 'brayati')
    ->where('students.statue', 'active')
    ->select(
        'payments_details.student_id',
        'students.fullname',
        'students.phone1',
        'students.fees',
        'students.paid',
        'students.note',
        'payments_details.amount',
        'payments_details.date'
    ) 
            ->orderBy('payments_details.date', 'desc') // Add this line to order by last_payment_date in descending order

    ->get();
    return view('backend.students.firstpayment', compact('students'));
}
public function lawanbrayati()
{
$students = Student::where('branch', 'lawaan_diploma')
    ->whereHas('course', function ($query) {
        $query->where('branch', 'brayati');
    })
    ->select(
        'students.*',
        DB::raw('(SELECT MAX(date) FROM payments_pays WHERE payments_pays.student_id = students.id) AS last_payment_date')
    )
    ->orderBy(DB::raw('last_payment_date'), 'asc')
    ->get();
    return view('backend.students.lawanbrayati', compact('students'));
}
public function paymentscollectdate()
{
    $students = DB::table('payments_details')
    ->leftJoin('students', 'payments_details.student_id', '=', 'students.id')
    ->where('payments_details.date', '<=', now()->addDays(3))
    ->whereRaw('payments_details.amount > payments_details.paid')
    ->where('students.branch', 'brayati')
    ->where('students.statue', 'active')
    ->select(
        'payments_details.student_id',
        'students.fullname',
        'students.phone1',
        'students.fees',
        'students.paid',
        'students.note',
        'payments_details.payment_number',
        'payments_details.amount',
        'payments_details.date'
    )    
    ->addSelect(DB::raw('(SELECT MAX(date) FROM payments_pays WHERE payments_pays.student_id = students.id) AS last_payment_date'))
        ->orderBy('last_payment_date', 'desc') // Add this line to order by last_payment_date in descending order

    ->get();
    return view('backend.students.paymentscollectdate', compact('students'));
}

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $ldcourses = Course::where('branch' , 'lawan_diploma')->get();
        $bcourses = Course::where('branch' , 'brayati')->get();
        return view('backend.students.create', compact('ldcourses' , 'bcourses'));
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
            'first_name'              => 'required|string|max:255',
            'father_name'              => 'required|string|max:255',
            'grandfather_name'              => 'string|max:255',
            'mother'             => 'string|max:255',
            'phone1'             => 'required|string|max:255',
            'gender'            => 'required',
            'dateofbirth'       => 'required|date',
            'placeofbirth'       => 'required|string',
            'current_address'   => 'required|string|max:255',
            'course_id' => 'required',
            'branch'          => 'required',
            'statue'          => 'required',
            'source'          => 'required',
            'fees'          => 'required',
        ]);
        if($request->course_id[0] != null){
            $course_id = $request->course_id[0] ;
        }
        else{
            $course_id = $request->course_id[1] ;
        }
        $fullname = $request->first_name.' '. $request->father_name.' '.$request->grandfather_name ;
        $student = Student::create([
            'first_name'              => $request->first_name,
            'father_name'              => $request->father_name,
            'grandfather_name'              => $request->grandfather_name,
            'fullname' => $fullname ,
            'mother'              => $request->mother,
            'phone1'              => $request->phone1,
            'phone2'              => $request->phone2,
            'gender'              => $request->gender,
            'dateofbirth'              => $request->dateofbirth,
            'placeofbirth'              => $request->placeofbirth,
            'current_address'              => $request->current_address,
            'course_id'              => $course_id,
            'fees'             => $request->fees,
            'paid'             => 0,
            'branch'              => $request->branch,
            'statue'             => $request->statue,
            'source'             => $request->source,
            'note'             => $request->note
        ]);
        $payments = PaymentDetail::where('student_id' , $student->id)->get();
        $total = 0 ;
        return view('backend.payments_details.index', compact('student' , 'payments' , 'total'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student)
    {
        $paymentpays = PaymentPay::where('student_id' , $student->id)->get();
        $paymentdetails = PaymentDetail::where('student_id' , $student->id)->get();
        $course = Course::findorfail($student->course_id);
        return view('backend.students.show', compact('course','student' , 'paymentdetails' , 'paymentpays'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit(Student $student)
    {
        $courses = Course::all();
        $ldcourses = Course::where('branch' , 'lawan_diploma')->get();
        $bcourses = Course::where('branch' , 'brayati')->get();
        return view('backend.students.edit', compact('courses','student' , 'bcourses' , 'ldcourses'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Student $student)
    {
        $request->validate([
            'first_name'              => 'required|string|max:255',
            'father_name'              => 'required|string|max:255',
            'grandfather_name'              => 'string|max:255',
            'mother'             => 'string|max:255',
            'phone1'             => 'required|string|max:255',
            'gender'            => 'required',
            'dateofbirth'       => 'required',
            'placeofbirth'       => 'required|string',
            'current_address'   => 'required|string|max:255',
            'course_id' => 'required',
            'branch'          => 'required',
            'statue'          => 'required',
            'source'          => 'required',
            'fees'          => 'required',
        ]);
$fullname = $request->first_name.' '. $request->father_name.' '.$request->grandfather_name ;
        $student->update([
            'first_name'              => $request->first_name,
            'father_name'              => $request->father_name,
            'grandfather_name'              => $request->grandfather_name,
            'fullname' => $fullname ,
            'mother'              => $request->mother,
            'phone1'              => $request->phone1,
            'phone2'              => $request->phone2,
            'gender'              => $request->gender,
            'dateofbirth'              => $request->dateofbirth,
            'placeofbirth'              => $request->placeofbirth,
            'current_address'              => $request->current_address,
            'course_id'              => $request->course_id,
            'fees'             => $request->fees,
            'paid'             => $student->paid,
            'branch'              => $request->branch,
            'statue'             => $request->statue,
            'source'             => $request->source,
            'note'             => $request->note

        ]);
        if($request->branch == 'brayati')
        {
            return redirect()->route('student.b');
        }
        else{
            return redirect()->route('student.ld');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student)
    {
        $student = Student::findOrFail($student->id);
        $student->delete();
        return redirect()->route('student.b');
    }
}
