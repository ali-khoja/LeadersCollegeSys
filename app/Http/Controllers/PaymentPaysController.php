<?php

namespace App\Http\Controllers;

use App\Student;
use App\Course;
use App\ClassSection;
use App\PaymentPay;
use App\PaymentDetail;
use Illuminate\Http\Request;

class PaymentPaysController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }
    public function createreport($id)
    {
        $bcourses = Course::where('branch' , 'brayati')->get();
        $lcourses = Course::where('branch' , 'lawan_diploma')->get();
        $sections = ClassSection::all();
        return view('createreport' ,compact('sections' , 'bcourses' , 'lcourses' , 'id'));
    }
    public function returnreport(Request $request)
{
    $branch = $request->branch;
    $students = Student::where('branch', $branch)->get();

    if ($request->branch == null || $request->branch == 'all') {
        $payments = PaymentPay::whereBetween('date', array($request->stdate, $request->enddate))->get();
    } else {
        $payments = PaymentPay::whereHas('student', function ($query) use ($branch) {
            $query->where('branch', $branch);
        })->whereBetween('date', array($request->stdate, $request->enddate))->orderby('date' , 'asc')->get();
    }

    $groupedPayments = $payments->groupBy(function ($payment) {
        return $payment->date;
    });
    $students->load('course');
    
    $new = 0;
    $newcount = 0;
    $payment = 0 ;
    foreach($groupedPayments as $date => $payments){
            foreach($payments as $p){
                if ($p->isFirstPayment()){
                    $new += $p->amount;
                $newcount++ ;
                }
                else{
                    $payment += $p->amount;
                }
            
    }
    }

    $total = 0;
    foreach ($groupedPayments as $date => $payments) {
        $total += $payments->sum('amount');
    }
    
    return view('backend.payments_pays.report', compact('groupedPayments', 'request', 'total', 'students' , 'new' , 'payment' , 'newcount'));
}

    public function report2(Request $request)
    {
        $stdate = $request->stdate ; 
        $enddate = $request->enddate ; 
        $section = $request->section ;
        $courses = Course::where('name', $section)->get();
        $paymentsByCourse = [];
        $total = 0 ; 
        foreach ($courses as $course) {
            $students = $course->students;
            foreach ($students as $student) {
                $payments = PaymentPay::where('student_id', $student->id)->whereBetween('date', array($request->stdate ,  $request->enddate))->get();
                    foreach ($payments as $payment) {
                        $paymentsByCourse[] = [
                            'student_name' => $student->fullname, 
                            'amount' => $payment->amount,
                             'date' => $payment->date,
                        ];
                        $total += $payment->amount ;
                }
            }
        }
        return view('backend.payments_pays.report2' , compact('paymentsByCourse' , 'section' , 'total' , 'stdate' , 'enddate'));
    }
    public function report3(Request $request)
    {
        $stdate = $request->stdate ; 
        $enddate = $request->enddate ; 
        if($request->course[0] != null){
            $courseid = $request->course[0] ;
        }
        else{
            $courseid = $request->course[1] ;
        }
        $course = Course::findorfail($courseid);
        $paymentsByCourse = [];
        $total = 0 ; 
        $students = $course->students;
        
        foreach ($students as $student) {
            $payments = PaymentPay::where('student_id', $student->id)->whereBetween('date', array($request->stdate ,  $request->enddate))->get();
            foreach ($payments as $payment) {
                $paymentsByCourse[] = [
                    'student_name' => $student->fullname, 
                    'amount' => $payment->amount,
                     'date' => $payment->date,
                ];
                $total += $payment->amount ;
            }
        }
        
        return view('backend.payments_pays.report3' , compact('paymentsByCourse' , 'course' , 'total' , 'stdate' , 'enddate'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create( $id)
    {
        
        $payments = PaymentDetail::findorfail($id);
        return view('backend.payments_pays.create', compact('payments'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request ,  $id)
    {
        $payment_detail = PaymentDetail::findorfail($id);
        $student = Student::findorfail($payment_detail->student_id);
        $request->validate([
            'amount'              => 'required',
            'date'              => 'required',
            'payment_way'              => 'required',
        ]);
        $rest = $payment_detail->amount -  $payment_detail->paid ;
        if($rest < $request->amount){
            return redirect()->route('paymentdetails.create1',[$student->id])->withErrors(['msg' => 'لا يمكن ان تكون الدفعة اكبر من المستحق']);
        }
        $payment_pay = PaymentPay::create([
            'student_id'              => $student->id,
            'payment_detail_id'              => $payment_detail->id,
            'amount'              => $request->amount,
            'date'              => $request->date,
            'payment_way'              => $request->payment_way,
            
        ]);
        $paid2 = $payment_detail->paid + $request->amount ;
        $oldpaid = $student->paid ;
        $paid = $payment_pay->amount + $oldpaid;
        $student->update([
            'paid' => $paid,
        ]);
        $payment_detail->update([
            'paid' => $paid2,
        ]);
        return redirect()->route('paymentdetails.create1',[$student->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $payment_pays= PaymentPay::findOrFail($id);
        $student = Student::findorfail($payment_pays->student_id);
        $payment_detail = PaymentDetail::findorfail($payment_pays->payment_detail_id);
        $minis1 = $student->paid -  $payment_pays->amount;
        $minis2 = $payment_detail->paid -  $payment_pays->amount;
        $student->update([
            'paid' => $minis1
        ]);
        $payment_detail->update([
            'paid' => $minis2
        ]);
        $payment_pays->delete();
        return back();
    }
}
