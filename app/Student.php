<?php

namespace App;

use App\Course;
use App\PaymentPay;
use App\PaymentDetails;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{


    protected $fillable = [
        'first_name'            ,
            'father_name'        ,
            'grandfather_name'    ,
            'fullname' ,
            'mother'          ,
            'phone1'             ,
            'phone2'             ,
            'gender'          ,
            'dateofbirth'      ,
            'placeofbirth'     ,
            'current_address'  ,
            'course_id'          ,
            'branch'       ,
            'statue' ,
            'source' ,
            'fees' ,
            'paid',
            'note'
    ];

public function newestPaymentPay()
{
    return $this->hasOne(PaymentPay::class)->latest();
}
    public function course()
    {
        return $this->belongsTo(Course::class, 'course_id');
    }
    public function payment_details()
    {
        return $this->hasMany(PaymentDetails::class);
    }
public function paymentPays()
    {
        return $this->hasMany(PaymentPay::class, 'student_id', 'id')->latest('date');
    }

}
