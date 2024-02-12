@extends('layouts.app')

@section('content')
        <div class="roles-permissions">
            <div class="flex items-center justify-center mb-6">
                <div style="margin:10px" class="flex flex-wrap items-center">
                    <div class="flex flex-wrap items-center">
                    <form action="{{route('search' , 'a')}}" method="POST" role="search">
                        {{ csrf_field() }}
                        <div class="input-group">
                            <input type="text" class="form-control" name="search" placeholder="ادخل اسم الطالب ">
                            <span class="input-group-btn" style="margin :0 10px " > 
                                <button type="submit" class="btn btn-success">
                                    <span class="glyphicon glyphicon-search">ابحث</span>
                                </button>
                            </span>
                        </div>
                    </form>
                    </div>
                </div>
                <div style="margin:10px">
                    <h2 class="text-gray-700 uppercase font-bold "> : تقرير دفعات بحسب اسم الطالب     </h2>
                </div>
            </div>
            <hr>
            <div class="flex items-center justify-center mb-6">
                <div style="margin:10px" class="flex flex-wrap items-center">
                    <div class="flex flex-wrap items-center">
                    <form action="{{route('paymentpays.returnreport')}}" method="POST" role="search">
                        {{ csrf_field() }}
                        <div class="relative">
                            <div class="md:flex md:items-center mb-6">
                                <div class="md:w-1/3">
                                    <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4">
                                        From
                                    </label>
                                </div>
                                <div class="md:w-2/3">
                                    <input name="stdate"  value="<?php echo date('2024-01-01'); ?>"  class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-blue-500" type="date"  }}">
                                    @error('stdate')
                                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="md:flex md:items-center mb-6">
                                <div class="md:w-1/3">
                                    <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4">
                                        To
                                    </label>
                                </div>
                                <div class="md:w-2/3">
                                    <input name="enddate" class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-blue-500" type="date"  value="<?php echo date('Y-m-d'); ?>">
                                    @error('enddate')
                                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <select name="branch" style="float:left; text-align:center" class="block appearance-none w-2/3 bg-gray-200 border border-gray-200 text-gray-700 py-2 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-state">
                                @if($id=='all')
                                <option value="all">الفرعين</option>
                                <option value="brayati">برايتي فقط</option>
                                <option value="lawaan_diploma">لاوان فقط</option>
                                @elseif($id=='b')
                                <option value="brayati">برايتي فقط</option>
                                @else
                                <option value="lawaan_diploma">لاوان فقط</option>
                                @endif
                            </select>
                            <span class="input-group-btn" class="block appearance-none w-1/3 " style="float:left; margin :0 10px " > 
                                <button type="submit" class="btn btn-success">
                                    <span class="glyphicon glyphicon-search">ابحث</span>
                                </button>
                            </span>
                         </div>
                    </form>
                    </div>
                </div>
                <div style="margin:10px">
                    <h2 class="text-gray-700 uppercase font-bold "> : تقرير دفعات حسب  التاريخ     </h2>
                </div>
            </div>
            <hr>
            <!--
            <div class="flex items-center justify-center mb-6">
                <div style="margin:10px" class="flex flex-wrap items-center">
                    <div class="flex flex-wrap items-center">
                    <form action="{{route('paymentpays.sectionreport')}}" method="POST" role="search">
                        {{ csrf_field() }}
                        <div class="relative">
                            <div class="md:flex md:items-center mb-6">
                                <div class="md:w-1/3">
                                    <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4">
                                        From
                                    </label>
                                </div>
                                <div class="md:w-2/3">
                                    <input name="stdate"  value="<?php echo date('2024-01-01'); ?>"  class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-blue-500" type="date"  }}">
                                    @error('stdate')
                                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="md:flex md:items-center mb-6">
                                <div class="md:w-1/3">
                                    <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4">
                                        To
                                    </label>
                                </div>
                                <div class="md:w-2/3">
                                    <input name="enddate" class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-blue-500" type="date"  value="<?php echo date('Y-m-d'); ?>">
                                    @error('enddate')
                                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <select name="section" style="float:left" class="block appearance-none w-2/3 bg-gray-200 border border-gray-200 text-gray-700 py-2 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-state">
                                <option value="" style="text-align: center">--اختر القسم--</option>
                                    @foreach($sections as $section)
                                    <option value="{{$section->name}}">{{$section->name}}</option>
                                    @endforeach
                            </select>
                            <span class="input-group-btn" class="block appearance-none w-1/3 " style="float:left; margin :0 10px " > 
                                <button type="submit" class="btn btn-success">
                                    <span class="glyphicon glyphicon-search">ابحث</span>
                                </button>
                            </span>
                         </div>
                    </form>
                    </div>
                </div>
                <div style="margin:10px">
                    <h2 class="text-gray-700 uppercase font-bold "> : تقرير دفعات حسب اقسام الدورات     </h2>
                </div>
            </div>-->
            <hr>
            <div class="flex items-center justify-center mb-6">
                <div style="margin:10px" class="flex flex-wrap items-center">
                    <div class="flex flex-wrap items-center">
                    <form action="{{route('paymentpays.coursereport')}}" method="POST" role="search">
                        {{ csrf_field() }}
                        <div class="relative">
                            <div class="md:flex w-2/3 md:items-center mb-6">
                                <div class="md:w-1/6">
                                </div>
                                <div class="md:w-2/6">
                                    <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4">
                                        From
                                    </label>
                                </div>
                                <div class="md:w-3/6">
                                    <input name="stdate"  value="<?php echo date('2023-01-01'); ?>"  class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-blue-500" type="date"  }}">
                                    @error('stdate')
                                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="w-2/3 md:flex md:items-center mb-6">
                            <div class="md:w-1/6">
                                </div>
                                <div class="md:w-2/6">
                                    <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4">
                                        To
                                    </label>
                                </div>
                                <div class="md:w-3/6">
                                    <input name="enddate" class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-blue-500" type="date"  value="<?php echo date('Y-m-d'); ?>">
                                    @error('enddate')
                                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            @if($id=='all')
                            <select name="course[]" style="float:left" class="block appearance-none w-2/3 bg-gray-200 border border-gray-200 text-gray-700 py-2 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-state">
                                <option value="" style="text-align: center">Brayati Courses</option>
                                    @foreach($bcourses as $course)
                                        <option value="{{$course->id}}">{{$course->name}}-{{$course->code}}-{{$course->description}}/  time :{{$course->time}}</option>
                                    @endforeach
                            </select>
                            <select name="course[]" style="float:left" class="block appearance-none w-2/3 bg-gray-200 border border-gray-200 text-gray-700 py-2 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-state">
                                <option value="" style="text-align: center">Lawan Courses</option>
                                    @foreach($lcourses as $course)
                                        <option value="{{$course->id}}">{{$course->name}}-{{$course->code}}-{{$course->description}}/  time :{{$course->time}}</option>
                                    @endforeach
                            </select>
                            @elseif($id=='b')
                            <select name="course[]" style="float:left" class="block appearance-none w-2/3 bg-gray-200 border border-gray-200 text-gray-700 py-2 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-state">
                                <option value="" style="text-align: center">Brayati Courses</option>
                                    @foreach($bcourses as $course)
                                        <option value="{{$course->id}}">{{$course->name}}-{{$course->code}}-{{$course->description}}/  time :{{$course->time}}</option>
                                    @endforeach
                            </select>
                            @else
                            <select name="course[]" style="float:left" class="block appearance-none w-2/3 bg-gray-200 border border-gray-200 text-gray-700 py-2 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-state">
                                <option value="" style="text-align: center">Lawan Courses</option>
                                    @foreach($lcourses as $course)
                                        <option value="{{$course->id}}">{{$course->name}}-{{$course->code}}-{{$course->description}}/  time :{{$course->time}}</option>
                                    @endforeach
                            </select>
                            @endif
                            <span class="input-group-btn" class="block appearance-none w-1/3 " style="float:left; margin :0 10px " > 
                                <button type="submit" class="btn btn-success">
                                    <span class="glyphicon glyphicon-search">ابحث</span>
                                </button>
                            </span>
                         </div>
                    </form>
                    </div>
                </div>
                <div style="margin:10px" class="w-1/3">
                    <h2 class="text-gray-700 uppercase font-bold "> : تقرير الدفعات حسب الدورات     </h2>
                </div>
            </div>
            
            

    </div>
@endsection


