@extends('layouts.app')

@section('content')
    <div class="roles">

        <div class="flex items-center justify-between mb-6">
            <div>
                <h2 class="text-gray-700 uppercase font-bold">Student Details</h2>
            </div>
            <div class="flex flex-wrap items-center">
                <a href="{{ url()->previous() }}" class="bg-gray-700 text-white text-sm uppercase py-2 px-4 flex items-center rounded">
                    <svg class="w-3 h-3 fill-current" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="long-arrow-alt-left" class="svg-inline--fa fa-long-arrow-alt-left fa-w-14" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="currentColor" d="M134.059 296H436c6.627 0 12-5.373 12-12v-56c0-6.627-5.373-12-12-12H134.059v-46.059c0-21.382-25.851-32.09-40.971-16.971L7.029 239.029c-9.373 9.373-9.373 24.569 0 33.941l86.059 86.059c15.119 15.119 40.971 4.411 40.971-16.971V296z"></path></svg>
                    <span class="ml-2 text-xs font-semibold">Back</span>
                </a>
            </div>
        </div>
        <!-- Log on to codeastro.com for more projects -->



        <div class="mt-8 bg-white rounded">
           <div class="flex flex-wrap sm:flex-no-wrap justify-between">
            <div class="w-full  mr-2 mb-6" >
                <div class="md:flex w-1/3 md:items-center mb-6" style="float:left">
                    <div class="md:w-1/3">
                        <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4">
                            Name : 
                        </label>
                    </div>
                    <div class="md:w-2/3">
                        <span class="block text-gray-600 font-bold">{{ $student->fullname }}</span>
                    </div>
                </div>
                <div class="md:flex w-1/3 md:items-center mb-6" style="float:left">
                    <div class="md:w-1/3">
                        <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4">
                            Phone :
                        </label>
                    </div>
                    <div class="md:w-2/3">
                        <span class="text-gray-600 font-bold">{{ $student->phone1 }}</span>
                    </div>
                </div>
                <div class="md:flex w-1/3 md:items-center mb-6" style="float:left">
                    <div class="md:w-1/3">
                        <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4">
                            Gender :
                        </label>
                    </div>
                    <div class="md:w-2/3">
                        <span class="text-gray-600 font-bold">{{ $student->gender }}</span>
                    </div>
                </div>
                <div class="md:flex w-1/3 md:items-center mb-6" style="float:left">
                    <div class="md:w-1/3">
                        <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4">
                             Birth :
                        </label>
                    </div>
                    <div class="md:w-2/3">
                        <span class="text-gray-600 font-bold">{{ $student->dateofbirth }} - {{ $student->placeofbirth }}</span>
                    </div>
                </div>
                <div class="md:flex w-1/3 md:items-center mb-6" style="float:left">
                    <div class="md:w-1/3">
                        <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4">
                             Address :
                        </label>
                    </div>
                    <div class="md:w-2/3">
                        <span class="text-gray-600 font-bold">{{ $student->current_address }}</span>
                    </div>
                </div>
                <div class="md:flex w-1/3 md:items-center mb-6" style="float:left">
                    <div class="md:w-1/3">
                        <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4">
                            Class :
                        </label>
                    </div>
                    <div class="md:w-2/3 block text-gray-600 font-bold">
                        <span class="text-gray-600 font-bold">{{ $course->name }}-{{$course->code}}</span>
                    </div>
                </div>
            </div>
            
                        

            <div class="w-full  mr-2 mb-6" >
                    <div class="w-1/2" style="float:left; text-align:center">
                        <h1 style="text-align:center; color:green; font-size:24px;">
                        <a href="{{ route('paymentpays.create1',$student->id) }}" style="float:left ; font-size: 10px; color : white" title="Payments Paid">
                            <svg class="h-6 w-6 fill-current text-green-600" xmlns="http://www.w3.org/2000/svg"  fill="currentColor" class="bi bi-currency-dollar" viewBox="0 0 16 16"> <path d="M4 10.781c.148 1.667 1.513 2.85 3.591 3.003V15h1.043v-1.216c2.27-.179 3.678-1.438 3.678-3.3 0-1.59-.947-2.51-2.956-3.028l-.722-.187V3.467c1.122.11 1.879.714 2.07 1.616h1.47c-.166-1.6-1.54-2.748-3.54-2.875V1H7.591v1.233c-1.939.23-3.27 1.472-3.27 3.156 0 1.454.966 2.483 2.661 2.917l.61.162v4.031c-1.149-.17-1.94-.8-2.131-1.718H4zm3.391-3.836c-1.043-.263-1.6-.825-1.6-1.616 0-.944.704-1.641 1.8-1.828v3.495l-.2-.05zm1.591 1.872c1.287.323 1.852.859 1.852 1.769 0 1.097-.826 1.828-2.2 1.939V8.73l.348.086z"/> </svg>
                        </a>
                        الدفعات المدفوعة</h1>
                        <table class="table table-dark" >
                            <thead>
                                <tr>
                                    <th>Amount</th>
                                    <th>Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($paymentpays as $p)
                                    <tr>
                                        <td>{{$p->amount}} $</td>
                                        <td>{{$p->date}}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="w-1/2" style="float:left ;text-align:center">
                        <h1 style="text-align:center; color:red; font-size:24px;">الدفعات المتفق عليها
                        <a href="{{ route('paymentdetails.create1',$student->id) }}" style=" float:left ; font-size: 10px; color : white"  title="Payments Agreement">
                            <svg class="h-6 w-6 fill-current text-red-600" xmlns="http://www.w3.org/2000/svg"  fill="currentColor" class="bi bi-currency-dollar" viewBox="0 0 16 16"> <path d="M4 10.781c.148 1.667 1.513 2.85 3.591 3.003V15h1.043v-1.216c2.27-.179 3.678-1.438 3.678-3.3 0-1.59-.947-2.51-2.956-3.028l-.722-.187V3.467c1.122.11 1.879.714 2.07 1.616h1.47c-.166-1.6-1.54-2.748-3.54-2.875V1H7.591v1.233c-1.939.23-3.27 1.472-3.27 3.156 0 1.454.966 2.483 2.661 2.917l.61.162v4.031c-1.149-.17-1.94-.8-2.131-1.718H4zm3.391-3.836c-1.043-.263-1.6-.825-1.6-1.616 0-.944.704-1.641 1.8-1.828v3.495l-.2-.05zm1.591 1.872c1.287.323 1.852.859 1.852 1.769 0 1.097-.826 1.828-2.2 1.939V8.73l.348.086z"/> </svg>
                        </a></h1>
                        <table class="table" >
                            <thead>
                                <tr>
                                    <th>Amount</th>
                                    <th>Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                @foreach($paymentdetails as $p)
                                    <tr>
                                        <td>{{$p->amount}} $</td>
                                        <td>{{$p->date}}</td>
                                    </tr>
                                @endforeach
                                </tr>
                            </tbody>
                        </table>
                    </div>
            </div>
        </div>
    </div>
@endsection