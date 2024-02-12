@extends('layouts.app')

@section('content')
    <div class="roles-permissions">
        <div class="flex items-center justify-between mb-6" style="justify-content: center">
            <div>
                <h2 class="text-gray-700 uppercase font-bold" >Payments From {{$request->stdate}} Until {{$request->enddate}} (   Branch : {{ $request->branch }}   ) </h2>
                <br>
                <table class="table">
                    <thead>
                        <tr>
                            <th>الاجمالي</th>
                            <th>اجمالي التسجيلات</th>
                            <th>اجمالي الاقساط</th>
                            <th>عدد التسجيلات</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td  style="font-size:18px ; color : green; text-align:center">{{$total}} $</td>
                            <td  style="font-size:18px ; color : green; text-align:center">{{$new}} $</td>
                            <td  style="font-size:18px ; color : green; text-align:center">{{$payment}} $ </td>
                            <td  style="font-size:18px ; color : green; text-align:center">{{$newcount}}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <!-- Log on to codeastro.com for more projects -->
@foreach($groupedPayments as $date => $payments)
    
    <div style="text-align: -webkit-center;">
        <b><h2 style="text-align:-webkit-center;font-size:18px; color:white ; width:25%; padding-top:10px; background-color:#2b6cb0">{{ $date }}</h2></b>
    </div>
    <table class="table">
        <thead>
            <tr>
                <th style="text-align:center;">Payment Amount</th>
                <th style="text-align:center;">Student Name</th>
                        <td style="text-align:center;">Course</td>

                <th style="text-align:center;">Status</th>
                <th style="text-align:center;">Payment Method</th>
            </tr>
        </thead>
        <tbody>
            @php
                $totalPayments = [];
                $totaldatePayments = 0;
            @endphp
            @foreach($payments as $payment)
                @php
                    $studentName = $payment->student->fullname;
                    $totalPayments[$studentName] = ($totalPayments[$studentName] ?? 0) + $payment->amount;
                    $totaldatePayments += $payment->amount;
                @endphp
            @endforeach
            @foreach($totalPayments as $studentName => $totalAmount)
                            @php
                    $firstPayment = $payments->where('student.fullname', $studentName)->first();
                            $student = $firstPayment->student; // Fetch the student associated with the payment

                @endphp
                <tr>
                    <td style="text-align:center; color:green">{{ $totalAmount }} $
                    </td>
                    <td style="text-align:center;">{{ $studentName }}</td>
                            <td style="text-align:center;">{{ $student->course->name }}</td>

                    <td style="text-align:center;">
                        @if ($firstPayment->isFirstPayment())
                            New
                        @else
                            Payment
                        @endif
                    </td>
                    <td style="text-align:center;">{{ $firstPayment->payment_way}}</td>
                </tr>
            @endforeach
            <tr> 
                <td colspan="3" style="text-align:center; color:green;font-size:18px">{{$totaldatePayments}} $</td>
            </tr>
        </tbody>
    </table>
@endforeach
    </div>
    <div>
    </div>
    <button onclick="window.print()" class="bg-green-500 text-white text-sm uppercase py-2 px-4 flex items-center rounded">
        <svg class="w-3 h-3 fill-current" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="plus" class="svg-inline--fa fa-plus fa-w-14" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="currentColor" d="M416 208H272V64c0-17.67-14.33-32-32-32h-32c-17.67 0-32 14.33-32 32v144H32c-17.67 0-32 14.33-32 32v32c0 17.67 14.33 32 32 32h144v144c0 17.67 14.33 32 32 32h32c17.67 0 32-14.33 32-32V304h144c17.67 0 32-14.33 32-32v-32c0-17.67-14.33-32-32-32z"></path></svg>
        <span class="ml-2 text-xs font-semibold">Print This Page</span>
    </button>
@endsection

