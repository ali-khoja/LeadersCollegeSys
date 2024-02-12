@extends('layouts.app')

@section('content')
<table class="table text-center" >
    <tr style="text-align:center">
        <th>الاسم</th>
        <th>الدفعة المستحقة </th>
        <th>الدفعة المدفوعة </th>
        <th>الدفعة المسحقة </th>
        <th>تاريخ الاستحقاق</th>
        <th>تاريخ اخر دفعة</th>
        <th>تعديل</th>
    </tr>
    @php
    $displayedNames = [];
@endphp
    @foreach($unpaidPayments as $unp)
    @if(!in_array($unp->fullname, $displayedNames))
    <tr style="text-align:center">
        <td><a href="{{ route('student.show',$unp->student_id) }}" style="color: #df0000">
        {{$unp->fullname}}
                        </a>@if($unp->note != Null)
                            <span class="badge badge-warning">{{$unp->note}}</span>
                        @endif</td>
        <td>{{ $unp->amount }}</td>
        <td>{{ $unp->paid }}</td>
        <td>{{$unp->amount - $unp->paid }}</td>
        <td>{{$unp->date}}</td>
        <td>{{$unp->last_payment_date}}</td>
        <td>                        <a href="{{ route('student.edit',$unp->student_id) }}" style="float:left ;" title="Edit">
                            <svg class="h-6 w-6 fill-current text-green-600" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="pen-square" class="svg-inline--fa fa-pen-square fa-w-14" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="currentColor" d="M400 480H48c-26.5 0-48-21.5-48-48V80c0-26.5 21.5-48 48-48h352c26.5 0 48 21.5 48 48v352c0 26.5-21.5 48-48 48zM238.1 177.9L102.4 313.6l-6.3 57.1c-.8 7.6 5.6 14.1 13.3 13.3l57.1-6.3L302.2 242c2.3-2.3 2.3-6.1 0-8.5L246.7 178c-2.5-2.4-6.3-2.4-8.6-.1zM345 165.1L314.9 135c-9.4-9.4-24.6-9.4-33.9 0l-23.1 23.1c-2.3 2.3-2.3 6.1 0 8.5l55.5 55.5c2.3 2.3 6.1 2.3 8.5 0L345 199c9.3-9.3 9.3-24.5 0-33.9z"></path></svg>
                        </a></td>
    </tr>
            @php
            $displayedNames[] = $unp->fullname;
        @endphp
    @endif
    @endforeach
</table>
@endsection