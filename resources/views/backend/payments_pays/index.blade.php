@extends('layouts.app')

@section('content')
    <div class="roles-permissions">
        <div class="flex items-center justify-between mb-6" style="justify-content: center">
            <div>
                <h2 class="text-gray-700 uppercase font-bold" >الدفعات التي دفعها الطالب : {{$student->first_name}} {{$student->father_name}} |  ومبلغه الاجمالي هو {{$student->fees}}</h2>
            </div>
        </div>
        <!-- Log on to codeastro.com for more projects -->
        <div class="mt-8 bg-white rounded border-b-4 border-gray-300" style="text-align: center">
            <div class="flex flex-wrap items-center uppercase text-sm font-semibold bg-gray-600 text-white rounded-tl rounded-tr">
                <div class="w-4/12 px-4 py-3">المبلغ</div>
                <div class="w-4/12 px-4 py-3">التاريخ</div>
                <div class="w-4/12 px-4 py-3">خيارات</div>
            </div>
            @foreach ($payments as $payment)
                <div class="flex flex-wrap items-center text-gray-700 border-t-2 border-l-4 border-r-4 border-gray-300" style="text-align: center " >
                    <div class="w-4/12 px-4 py-3 text-sm font-semibold text-gray-600 tracking-tight">{{ $payment->amount }}</div>
                    <div class="w-4/12 px-4 py-3 text-sm font-semibold text-gray-600 tracking-tight">{{ $payment->date }}</div>
                    <div class="w-4/12 flex items-center justify-center px-3">

                        <a href="{{ route('paymentpays.edit',$payment->id) }}">
                            <svg class="h-6 w-6 fill-current text-green-600" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="pen-square" class="svg-inline--fa fa-pen-square fa-w-14" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="currentColor" d="M400 480H48c-26.5 0-48-21.5-48-48V80c0-26.5 21.5-48 48-48h352c26.5 0 48 21.5 48 48v352c0 26.5-21.5 48-48 48zM238.1 177.9L102.4 313.6l-6.3 57.1c-.8 7.6 5.6 14.1 13.3 13.3l57.1-6.3L302.2 242c2.3-2.3 2.3-6.1 0-8.5L246.7 178c-2.5-2.4-6.3-2.4-8.6-.1zM345 165.1L314.9 135c-9.4-9.4-24.6-9.4-33.9 0l-23.1 23.1c-2.3 2.3-2.3 6.1 0 8.5l55.5 55.5c2.3 2.3 6.1 2.3 8.5 0L345 199c9.3-9.3 9.3-24.5 0-33.9z"></path></svg>
                        </a>
                        <a href="{{ route('paymentpays.destroy', $payment->id) }}" data-url="{{ route('paymentpays.destroy', $payment->id) }}" class="deletebtn ml-1 bg-red-600 block p-1 border border-red-600 rounded-sm">
                            <svg class="h-3 w-3 fill-current text-gray-100" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="trash" class="svg-inline--fa fa-trash fa-w-14" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="currentColor" d="M432 32H312l-9.4-18.7A24 24 0 0 0 281.1 0H166.8a23.72 23.72 0 0 0-21.4 13.3L136 32H16A16 16 0 0 0 0 48v32a16 16 0 0 0 16 16h416a16 16 0 0 0 16-16V48a16 16 0 0 0-16-16zM53.2 467a48 48 0 0 0 47.9 45h245.8a48 48 0 0 0 47.9-45L416 128H32z"></path></svg>
                        </a>
                    </div>
                </div>
            @endforeach
            <div class="flex flex-wrap items-center text-gray-700 border-t-2 border-l-4 border-r-4 border-gray-300" style="text-align: center; color:black " >
                <div class="w-4/12 px-4 py-3 text-sm font-semibold text-gray-600 tracking-tight" style="color: black;border: 2px solid black;background-color: rgb(148, 42, 42);">القسط : {{$student->fees}} $</div>
                <div class="w-4/12 px-4 py-3 text-sm font-semibold text-gray-600 tracking-tight" style="color: black;border: 2px solid black;background-color: rgb(66, 167, 66);">المدفوع : {{$student->paid}} $</div>
                <div class="w-4/12 px-4 py-3 text-sm font-semibold text-gray-600 tracking-tight" style="color: black;border: 2px solid black;background-color: rgb(40, 40, 112);">المتبقي :  {{$student->fees - $student->paid}} $ </div>
            </div>
        </div>

        @include('backend.modals.delete',['name' => 'teacher'])
    </div>
    <div class="roles">
        <div class="flex items-center justify-between mb-6">
            <div>
                <h2 class="text-gray-700 uppercase font-bold">اضافة دفعات جديدة</h2>
            </div>
        </div>
        <!-- Log on to codeastro.com for more projects -->
        <div class="table w-full mt-8 bg-white rounded">
            <form action="{{ route('paymentpays.store1' , $student->id) }}" method="POST" class="w-full max-w-xl px-6 py-12">
                @csrf
                <div class="md:flex md:items-center mb-6">
                    <div class="md:w-1/3">
                        <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4">
                             رقم الدفعة ( 1 اذا هي دفعة تسجيل ) :
                        </label>
                    </div>
                    <div class="md:w-2/3">
                        <input name="recipt_number" class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-blue-500" type="number" value="{{ old('recipt_number') }}">
                        @error('recipt_number')
                            <p class="text-red-500 text-xs italic">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
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
