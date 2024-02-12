@extends('layouts.app')

@section('content')
    <div class="roles-permissions">
        <div class="flex items-center justify-between mb-6">
            <div>
                <h2 class="text-gray-700 uppercase font-bold"> {{$course->name }} - {{$course->code}}</h2>
            </div>
            <a href="{{ route('course.show2',$course->id) }}"  target="_blank" style="float:left ; font-size: 10px; color : white" title="Payments Paid">
                <button class="bg-green-500 text-white text-sm uppercase py-2 px-4 flex items-center rounded">
                    <span class="ml-2 text-xs font-semibold">جدول الحضور</span>
                </button>
            </a>
            <button onclick="window.print()" class="bg-green-500 text-white text-sm uppercase py-2 px-4 flex items-center rounded">
<svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 fill-current"  fill="currentColor" class="bi bi-printer" viewBox="0 0 16 16"> <path d="M2.5 8a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1z"/> <path d="M5 1a2 2 0 0 0-2 2v2H2a2 2 0 0 0-2 2v3a2 2 0 0 0 2 2h1v1a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2v-1h1a2 2 0 0 0 2-2V7a2 2 0 0 0-2-2h-1V3a2 2 0 0 0-2-2H5zM4 3a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1v2H4V3zm1 5a2 2 0 0 0-2 2v1H2a1 1 0 0 1-1-1V7a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1h-1v-1a2 2 0 0 0-2-2H5zm7 2v3a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1v-3a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1z"/> </svg>
                <span class="ml-2 text-xs font-semibold">Print This Page</span>
            </button>
            <div class="flex flex-wrap items-center">
                <a href="{{ route('student.create') }}" class="bg-green-500 text-white text-sm uppercase py-2 px-4 flex items-center rounded">
                    <svg class="w-3 h-3 fill-current" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="plus" class="svg-inline--fa fa-plus fa-w-14" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="currentColor" d="M416 208H272V64c0-17.67-14.33-32-32-32h-32c-17.67 0-32 14.33-32 32v144H32c-17.67 0-32 14.33-32 32v32c0 17.67 14.33 32 32 32h144v144c0 17.67 14.33 32 32 32h32c17.67 0 32-14.33 32-32V304h144c17.67 0 32-14.33 32-32v-32c0-17.67-14.33-32-32-32z"></path></svg>
                    <span class="ml-2 text-xs font-semibold">إضافة طالب</span>
                </a>
            </div>
        </div>
        <!-- Log on to codeastro.com for more projects -->
        <table id="myTable" class="display table" style="text-align: center" >
            <thead>
                <tr>
                    <th>الاسم</th>
                    <th>اسم الام</th>
                    <th>المواليد</th>
                    <th>الهاتف</th>
                    <th>القسط</th>
                    <th>المدفوع</th>
                    <th>اخر دفعة</th>
                    <th>خيارات</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($students as $student)
                <tr>
                    <td>
                        <a href="{{ route('student.show',$student->id) }}" style="color: #df0000">
                            {{ $student->first_name }} {{$student->father_name}} {{$student->grandfather_name}}
                        </a>
                        @if($student->note != Null)
                            <span class="badge badge-warning">{{$student->note}}</span>
                        @endif
                    </td>
                    <td>{{ $student->mother }}</td>
                    <td>{{ $student->dateofbirth }}-{{ $student->placeofbirth }}</td>
                    <td>{{ $student->phone1}}</td>
                    <td>{{ $student->fees }} </td>
                                        <td>{{ $student->paid }} </td>
                    <td>@if ($student->paymentPays->isNotEmpty())
{{ $student->paymentPays->first()->date }}
    @else
        No payments yet.
    @endif</td>

                    <td>
                        <a href="{{ route('paymentdetails.create1',$student->id) }}" style=" float:left ; font-size: 10px; color : white"  title="Payments Agreement">
                            <svg class="h-6 w-6 fill-current text-red-600" xmlns="http://www.w3.org/2000/svg"  fill="currentColor" class="bi bi-currency-dollar" viewBox="0 0 16 16"> <path d="M4 10.781c.148 1.667 1.513 2.85 3.591 3.003V15h1.043v-1.216c2.27-.179 3.678-1.438 3.678-3.3 0-1.59-.947-2.51-2.956-3.028l-.722-.187V3.467c1.122.11 1.879.714 2.07 1.616h1.47c-.166-1.6-1.54-2.748-3.54-2.875V1H7.591v1.233c-1.939.23-3.27 1.472-3.27 3.156 0 1.454.966 2.483 2.661 2.917l.61.162v4.031c-1.149-.17-1.94-.8-2.131-1.718H4zm3.391-3.836c-1.043-.263-1.6-.825-1.6-1.616 0-.944.704-1.641 1.8-1.828v3.495l-.2-.05zm1.591 1.872c1.287.323 1.852.859 1.852 1.769 0 1.097-.826 1.828-2.2 1.939V8.73l.348.086z"/> </svg>
                        </a>
                        <a href="{{ route('student.edit',$student->id) }}" style="float:left ;" title="Edit">
                            <svg class="h-6 w-6 fill-current text-green-600" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="pen-square" class="svg-inline--fa fa-pen-square fa-w-14" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="currentColor" d="M400 480H48c-26.5 0-48-21.5-48-48V80c0-26.5 21.5-48 48-48h352c26.5 0 48 21.5 48 48v352c0 26.5-21.5 48-48 48zM238.1 177.9L102.4 313.6l-6.3 57.1c-.8 7.6 5.6 14.1 13.3 13.3l57.1-6.3L302.2 242c2.3-2.3 2.3-6.1 0-8.5L246.7 178c-2.5-2.4-6.3-2.4-8.6-.1zM345 165.1L314.9 135c-9.4-9.4-24.6-9.4-33.9 0l-23.1 23.1c-2.3 2.3-2.3 6.1 0 8.5l55.5 55.5c2.3 2.3 6.1 2.3 8.5 0L345 199c9.3-9.3 9.3-24.5 0-33.9z"></path></svg>
                        </a>
                    </td>
                </tr>
                @endforeach
                <tr class="table-success">
                    <td colspan="4" style="text-align: right;  color:red"> <b>Total</b></td>
                    <td style="color: red"><b>{{$total}}</b></td>
                    <td style="color: green"><b>{{$totalpaid}}</b></td>
                    <td></td>
                </tr>
            </tbody>
        </table>

    </div>
@endsection

@push('scripts')
<script>
    $(function() {
        $( ".deletestudent" ).on( "click", function(event) {
            event.preventDefault();
            $( "#deletemodal" ).toggleClass( "hidden" );
            var url = $(this).attr('data-url');
            $(".remove-record").attr("action", url);
        })

        $( "#deletemodelclose" ).on( "click", function(event) {
            event.preventDefault();
            $( "#deletemodal" ).toggleClass( "hidden" );
        })
    })
</script>
@endpush
