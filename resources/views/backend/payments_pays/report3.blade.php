@extends('layouts.app')

@section('content')
    <div class="roles-permissions">
        <div class="flex items-center justify-between mb-6" style="justify-content: center">
            <div>
                <h2 class="text-gray-700 uppercase font-bold" >Payments for {{$course->name}}-{{$course->code}}-{{$course->description}} From {{$stdate}}  To {{$enddate}}</h2>
            </div>
        </div>
        <!-- Log on to codeastro.com for more projects -->
        <div class="mt-8 bg-white rounded border-b-4 border-gray-300" style="text-align: center">
            <div class="flex flex-wrap items-center uppercase text-sm font-semibold bg-gray-600 text-white rounded-tl rounded-tr">
                <div class="w-4/12 px-4 py-3">student name</div>
                <div class="w-4/12 px-4 py-3">amount</div>
                <div class="w-4/12 px-4 py-3">date</div>
            </div>
            @foreach ($paymentsByCourse as $payment)
                <div class="flex flex-wrap items-center text-gray-700 border-t-2 border-l-4 border-r-4 border-gray-300" style="text-align: center " >
                    @if (isset($payment['student_name']))
                        <div class="w-4/12 px-4 py-3 text-sm font-semibold text-gray-600 tracking-tight">{{ $payment['student_name'] }}</div>
                    @else
                        <div class="w-4/12 px-4 py-3 text-sm font-semibold text-gray-600 tracking-tight">N/A</div>
                    @endif
            
                    @if (isset($payment['amount']))
                        <div class="w-4/12 px-4 py-3 text-sm font-semibold text-gray-600 tracking-tight">{{ $payment['amount'] }}</div>
                    @else
                        <div class="w-4/12 px-4 py-3 text-sm font-semibold text-gray-600 tracking-tight">N/A</div>
                    @endif
            
                    @if (isset($payment['date']))
                        <div class="w-4/12 px-4 py-3 text-sm font-semibold text-gray-600 tracking-tight">{{ $payment['date'] }}</div>
                    @else
                        <div class="w-4/12 px-4 py-3 text-sm font-semibold text-gray-600 tracking-tight">N/A</div>
                    @endif
                            </div>
            @endforeach
            <div class="flex flex-wrap items-center text-gray-700 border-t-2 border-l-4 border-r-4 border-gray-300" style="text-align: center; color:black " >
                <div class="w-full px-4 py-3 text-sm font-semibold text-gray-600 tracking-tight" style="color: black;border: 2px solid black;background-color: rgb(148, 42, 42);">Total : {{$total}} $</div>
            </div>
        </div>
    </div>
    <button onclick="window.print()" class="bg-green-500 text-white text-sm uppercase py-2 px-4 flex items-center rounded">
        <svg class="w-3 h-3 fill-current" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="plus" class="svg-inline--fa fa-plus fa-w-14" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="currentColor" d="M416 208H272V64c0-17.67-14.33-32-32-32h-32c-17.67 0-32 14.33-32 32v144H32c-17.67 0-32 14.33-32 32v32c0 17.67 14.33 32 32 32h144v144c0 17.67 14.33 32 32 32h32c17.67 0 32-14.33 32-32V304h144c17.67 0 32-14.33 32-32v-32c0-17.67-14.33-32-32-32z"></path></svg>
        <span class="ml-2 text-xs font-semibold">Print This Page</span>
    </button>
@endsection

