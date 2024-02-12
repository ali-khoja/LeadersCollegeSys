@extends('layouts.app')

@section('content')

    <div class="roles-permissions">
        <div class="flex items-center justify-between mb-6">
            <div>
                <h2 class="text-gray-700 uppercase font-bold"> Teacher Courses</h2>
            </div>
            <div class="flex flex-wrap items-center">
                <form action="{{route('searchc' , 'b')}}" method="POST" role="search">
                    {{ csrf_field() }}
                    <div class="input-group">
                        <input type="text" class="form-control" name="search"
                            placeholder="Search Courses"> <span class="input-group-btn">
                            <button type="submit" class="btn btn-default">
                                <span class="glyphicon glyphicon-search"></span>
                            </button>
                        </span>
                    </div>
                </form>
            </div>
        </div><!-- Log on to codeastro.com for more projects -->
        <table id="myTable" class="table table-striped table-bordered " style="text-align: center" >
            <thead class="thead-dark">
                <tr class="bg-primary">
                    <th>اسم الصف</th>
                    <th> الوصف</th>
                    <th>تاريخ البدء</th>
                    <th>الساعات</th>
                    <th>الايام</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($courses as $course)
                <tr>
                    <td>{{ $course->name }}-{{ $course->code }}  <span style="color:#48bb78; background-color:white ">#{{$course->students_count}}</span></td>
                    <td>{{ $course->description }}</td>
                    <td>{{ $course->stdate }}</td>
                    <td>{{ $course->time  }}</td>
                    <td>{{ $course->days  }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    <div class="mt-8">
    {{ $courses->links() }}
    </div>
</div>
@endsection
