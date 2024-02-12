<?php

namespace App\Http\Controllers;

use App\Student;
use App\PaymentDetail;
use App\PaymentPay;
use Illuminate\Http\Request;
use Carbon\Carbon;

class PaymentDetailsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create( $id)
    {
        $student = Student::findorfail($id);
        $total = 0 ;
        $payments = PaymentDetail::where('student_id' , $id)->with('payment_pays')->get();
        foreach($payments as $payment){
            $total += $payment->amount ; 

        }
        return view('backend.payments_details.index', compact('student' , 'payments' , 'total'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request ,  $id)
    {
        $request->validate([
            'amount'              => 'required',
            'date'              => 'required',
        ]);

        $payment_detail = PaymentDetail::create([
            'student_id'              => $id,
            'amount'              => $request->amount,
            'date'              => $request->date,
            'payment_number'              => 1 ,
        ]);
        $student = Student::findorfail($id);
        $rest = $student->fees - $request->amount ;
        if($request->other!=0){
            $rest = $rest/$request->other ; 
        }
        $carbonDate = $request->date ; 
        for($i=0 ; $i<$request->other ; $i++){
            $carbonDate = Carbon::parse($carbonDate);
            $carbonDate = $carbonDate->addMonth();
            $carbonDate = $carbonDate->toDateString();
            $payment_detail = PaymentDetail::create([
            'student_id'              => $id,
            'amount'              => $rest,
            'date'              => $carbonDate,
            'payment_number'              => $i+2 ,
        ]);
        }
        $total = 0 ;
        $payments = PaymentDetail::where('student_id' , $id)->get();
        foreach($payments as $payment){
            $total += $payment->amount ; 
        }
        return redirect()->route('paymentdetails.create1',[$id]);
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
        $payment_detail = PaymentDetail::findOrFail($id);
        $payment_detail->delete();
        return back();
    }
    public function destroy2($id)
    {
        $payment_detail = PaymentDetail::where('student_id' , $id)->get();
        $student = Student::findorfail($id);
                $student->update([
            'paid' => 0
        ]);
        foreach ($payment_detail as $p){
            $payment_pays = PaymentPay::where('payment_detail_id' , $p->id)->get();
            foreach($payment_pays as $pp){
                $pp->delete();
            }
            $p->delete();
        }

        $total = 0 ;
        return redirect()->route('paymentdetails.create1',[$id] );
    }
}
