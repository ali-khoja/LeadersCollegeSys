<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PaymentDetail extends Model
{
    //
    protected $table = 'payments_details';
    protected $fillable = [
        'student_id'            ,
            'payment_number'        ,
            'amount'    ,
            'paid'    ,
            'date'

    ];


    public function student()
    {
        return $this->belongsTo(Student::class, 'student_id');
    }
    public function payment_pays()
    {
        return $this->hasMany(PaymentPay::class);
    }
}
