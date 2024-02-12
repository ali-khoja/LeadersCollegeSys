@extends('layouts.app')

@section('content')
    <div class="roles-permissions">
        <div class="flex items-center justify-between mb-6" style="justify-content: center">
            <div>
                <h2 class="text-gray-700 uppercase font-bold" >الملف المالي  للطالب : {{$student->first_name}} {{$student->father_name}} |  ومبلغه الاجمالي هو {{$student->fees}}</h2>
            </div>
           
        </div>
        <div >
                @if($errors->any())
                     <h1 style="font-size:18px; text-align:center" class="text-danger"><b>{{$errors->first()}}</b></h1>
                @endif
            </div>
        <table id="myTable" class="table table-striped table-bordered" style="text-align: center" >
            <thead class="thead-dark">
                <tr class="bg-primary">
                    <th>رقم الدفعة</th>
                    <th> المبلغ</th>
                    <th> المدفوع</th>
                    <th>التاريخ المستحق  </th>
                    <th> الدفعات</th>
                    <th>خيارات</th>
                </tr>
            </thead>
            <tbody>
                
            @foreach ($payments as $payment)
                <tr>
                    <td>{{ $payment->payment_number }} </td>
                    <td>{{ $payment->amount }}</td>
                    @if($payment->amount > $payment->paid && now() > $payment->date) 
                    <td class="text-danger">
                        {{ $payment->paid }}<br> الدفعة مستحقة ولم تستكمل بعد
                    </td>
                    @else
                    <td>{{ $payment->paid }}</td>
                    @endif
                    <td>{{ $payment->date }}</td>
                    <td>
                    <!--<?php $pays = $payment->payment_pays; $totalpays=0?>-->
                        @foreach($pays as $pay)
                           <span style="color:green"> <b>{{ $pay->amount }} $ </b></span> - {{ $pay->date }}
                           <form action="{{ route('paymentpays.destroy',$pay->id) }}" method="POST" class="inline-flex ml-1">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-600 block p-1 border border-red-600 rounded-sm" title="Delete">
                                <svg class="h-3 w-3 fill-current text-gray-100" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="trash" class="svg-inline--fa fa-trash fa-w-14" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="currentColor" d="M432 32H312l-9.4-18.7A24 24 0 0 0 281.1 0H166.8a23.72 23.72 0 0 0-21.4 13.3L136 32H16A16 16 0 0 0 0 48v32a16 16 0 0 0 16 16h416a16 16 0 0 0 16-16V48a16 16 0 0 0-16-16zM53.2 467a48 48 0 0 0 47.9 45h245.8a48 48 0 0 0 47.9-45L416 128H32z"></path></svg>
                            </button>
                        </form>
                           <!--<?php  $totalpays+= $pay->amount?>-->
                           <br>
                        @endforeach()
                    </td>
                    <td style="    text-align: -webkit-center;">
                    @if( $totalpays < $payment->amount )
                        <a href="{{ route('paymentpays.create1' , $payment->id) }}"
                         class="bg-green-500 text-white text-sm uppercase py-1 px-2 flex items-center rounded" style="justify-content: center ;width:50%">
                            <svg class="w-3 h-3 fill-current" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="plus" class="svg-inline--fa fa-plus fa-w-14" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="currentColor" d="M416 208H272V64c0-17.67-14.33-32-32-32h-32c-17.67 0-32 14.33-32 32v144H32c-17.67 0-32 14.33-32 32v32c0 17.67 14.33 32 32 32h144v144c0 17.67 14.33 32 32 32h32c17.67 0 32-14.33 32-32V304h144c17.67 0 32-14.33 32-32v-32c0-17.67-14.33-32-32-32z"></path></svg>
                            <span class="ml-2 text-xs font-semibold">اضافة دفعة جديدة</span>
                        </a>
                    @endif
                    </td>
                </tr>
                @endforeach
                <tr>
                    <td></td>
                    <td>Total : {{ $total }} $</td>
                    <td></td>
                    <td>                    
                        <form action="{{ route('paymentdetails.destroy2', $student->id) }}" method="POST">
                        @csrf
                        @method('delete')
                            <button type="submit" class="btn btn-outline-danger">Delete All</button>
                        </form>
                    </td>
                </tr>
            </tbody>
        </table>

        @include('backend.modals.delete',['name' => 'teacher'])
    </div>
    @if(! ($total >= $student->fees))
    <div class="roles">
        <div class="table w-full mt-8 bg-white rounded">
            <form action="{{ route('paymentdetails.store1' , $student->id) }}" method="POST" class="w-full max-w-xl px-6 py-12">
                @csrf
                <div class="md:flex md:items-center mb-6">
                    <div class="md:w-1/3">
                        <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4">
                            قيمة الدفعة الاولى $ 
                        </label>
                    </div>
                    <div class="md:w-2/3">
                        <input name="amount" class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-blue-500" type="number" value="{{ old('amount') }}">
                        @error('amount')
                            <p class="text-red-500 text-xs italic">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div class="md:flex md:items-center mb-6">
                    <div class="md:w-1/3">
                        <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4">
                            التاريخ :
                        </label>
                    </div>
                    <div class="md:w-2/3">
                        <input name="date" id="datepicker-sc" autocomplete="off" class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-blue-500" type="date" value="{{ old('date') }}">
                        @error('date')
                            <p class="text-red-500 text-xs italic">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div class="md:flex md:items-center mb-6">
                    <div class="md:w-1/3">
                        <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4">
                                عدد الدفعات الاخرى :
                        </label>
                    </div>
                    <div class="md:w-2/3">
                        <input name="other" class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-blue-500" type="number" value="{{ old('other') }}">
                        @error('other')
                            <p class="text-red-500 text-xs italic">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div class="md:flex md:items-center">
                    <div class="md:w-1/3"></div>
                    <div class="md:w-2/3">
                        <button class="shadow bg-blue-500 hover:bg-blue-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded" type="submit">
                            إضافة
                        </button>
                    </div>
                </div>
            </form>
        </div>
        <!-- Log on to codeastro.com for more projects -->
    </div>
    @endif
@endsection

@push('scripts')
<script>
    $(function() {
        $( ".deletebtn" ).on( "click", function(event) {
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
