@extends('layouts.app')

@section('content')
    <div class="roles">
        <div class="flex items-center justify-between mb-6" style="text-align:center">
            <div>
                <h2 class="text-gray-700 uppercase font-bold">اضافة دفعة جديدة</h2>
            </div>
            <div>
                <h2 class="text-gray-700 uppercase font-bold">رقم الدفعة : {{$payments->payment_number}}</h2>
                <h2 class="text-gray-700 uppercase font-bold">قيمة الدفعة : {{$payments->amount}}</h2>
                <h2 class="text-gray-700 uppercase font-bold">المدفوع منها : {{$payments->paid}}</h2>
                <h2 class="text-gray-700 uppercase font-bold">تاريخ استحقاقها : {{$payments->date}}</h2>
                <h2 class="text-gray-700 uppercase font-bold">المتبقي منها ( لا يجب ان تتجاوز قيمة الدفعة هذا الرقم )  : {{$payments->amount - $payments->paid}}</h2>

            </div>
        </div>
        <!-- Log on to codeastro.com for more projects -->
        <div class="table w-full mt-8 bg-white rounded">
            <form action="{{ route('paymentpays.store1' , $payments->id) }}" method="POST" class="w-full max-w-xl px-6 py-12">
                @csrf
                <div class="md:flex md:items-center mb-6">
                    <div class="md:w-1/3">
                        <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4">
                            المبلغ $ :
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
                           طريقة الدفع
                        </label>
                    </div>
                    <div class="md:w-2/3 block text-gray-600 font-bold">
                        <div class="relative">
                            <select name="payment_way" class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-state">
                                <option value="-">--------</option>
                                <option value="زين كاش"> زين كاش </option>
                                                                <option value="حوالة">حوالة</option>
                                                                <option value="نقدي">نقدي</option>
                                                                <option value="fib">FIB</option>

                            </select>
                            <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                            </div>
                        </div>
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
