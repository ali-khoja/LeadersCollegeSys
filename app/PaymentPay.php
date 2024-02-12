<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PaymentPay extends Model
{
    protected $table = 'payments_pays';
    protected $fillable = [
        'student_id'            ,
            'amount'    ,
            'date' ,
            'payment_way' ,
            'payment_detail_id'

    ];


    public function isFirstPayment()
    {
        // Check if there are any earlier payments for the same student
        $earlierPaymentsCount = PaymentPay::where('student_id', $this->student_id)
            ->where('date', '<', $this->date)
            ->count();

        return $earlierPaymentsCount === 0;
    }
    public function student()
    {
        return $this->belongsTo(Student::class, 'student_id');
    }
    public function payment_detail()
    {
        return $this->belongsTo(PaymentDetail::class, 'payment_detail_id');
    }
}
