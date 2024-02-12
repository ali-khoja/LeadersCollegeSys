@extends('layouts.app')

@section('content')
    <button onclick="window.print()" class="bg-green-500 text-white text-sm uppercase py-2 px-4 flex items-center rounded">
        <svg class="w-3 h-3 fill-current" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="plus" class="svg-inline--fa fa-plus fa-w-14" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="currentColor" d="M416 208H272V64c0-17.67-14.33-32-32-32h-32c-17.67 0-32 14.33-32 32v144H32c-17.67 0-32 14.33-32 32v32c0 17.67 14.33 32 32 32h144v144c0 17.67 14.33 32 32 32h32c17.67 0 32-14.33 32-32V304h144c17.67 0 32-14.33 32-32v-32c0-17.67-14.33-32-32-32z"></path></svg>
        <span class="ml-2 text-xs font-semibold">Print This Page</span>
    </button>

<table class="table table-bordered border border-dark border-2 text-center" >
    <tr style="text-align:center">
        <th>#</th>
        <th>الاسم</th>
        <th>ملاحظات</th>
        <th>رقم الهاتف</th>
        <th>القسط الكامل</th>
                <th>الدفعة الاولى</th>
        <th>المدفوع</th>
        <th>تاريخ التسجيل</th>
        <th>تعديل</th>
    </tr>
        @php
            $i=1;
        @endphp
@foreach($students as $unp)
        <tr class="border border-dark border-1" style="text-align:center;font-size:15px; line-height: 12px; padding:5px!important; ">
            <td class="border border-dark border-1">{{ $i}}</td>
            <td class="border border-dark border-1">
                <a href="{{ route('student.show', $unp->student_id) }}" style="color: #df0000">
                    {{ $unp->fullname }}
                </a>
            </td >
                   <td class="border border-dark border-1">
                       @if($unp->note != null)
                       {{ $unp->note }}
                       @endif</td>
            <td class="border border-dark border-1">{{ $unp->phone1 }}</td>
            <td class="border border-dark border-1">{{ $unp->fees }}</td>
                        <td class="border border-dark border-1">{{ $unp->amount }}</td>

            <td class="border border-dark border-1">{{ $unp->paid }}</td>
            <td class="border border-dark border-1">{{ $unp->date }}</td>
            <td class="border border-dark border-1">
                <a href="{{ route('student.edit', $unp->student_id) }}" style="float:left;" title="Edit">
                    <svg class="h-4 w-4 fill-current text-green-600" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="pen-square" class="svg-inline--fa fa-pen-square fa-w-14" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="currentColor" d="M400 480H48c-26.5 0-48-21.5-48-48V80c0-26.5 21.5-48 48-48h352c26.5 0 48 21.5 48 48v352c0 26.5-21.5 48-48 48zM238.1 177.9L102.4 313.6l-6.3 57.1c-.8 7.6 5.6 14.1 13.3 13.3l57.1-6.3L302.2 242c2.3-2.3 2.3-6.1 0-8.5L246.7 178c-2.5-2.4-6.3-2.4-8.6-.1zM345 165.1L314.9 135c-9.4-9.4-24.6-9.4-33.9 0l-23.1 23.1c-2.3 2.3-2.3 6.1 0 8.5l55.5 55.5c2.3 2.3 6.1 2.3 8.5 0L345 199c9.3-9.3 9.3-24.5 0-33.9z"></path></svg>
                </a>
            </td>
        </tr>
        @php
            $i++;
        @endphp
@endforeach
</table>
@endsection