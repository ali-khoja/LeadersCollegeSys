@extends('layouts.app')

@section('content')
@role("Admin")
    <div class="roles-permissions">
        <div class="flex items-center justify-between mb-6">
            <div>
                <h2 class="text-gray-700 uppercase font-bold">الدورات</h2>
            </div>
            <div class="flex flex-wrap items-center">
                <form action="{{route('searchc' , 'a')}}" method="POST" role="search">
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
            <div class="flex flex-wrap items-center">
                <a href="{{ route('course.create') }}" class="bg-green-500 text-white text-sm uppercase py-2 px-4 flex items-center rounded">
                    <svg class="w-3 h-3 fill-current" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="plus" class="svg-inline--fa fa-plus fa-w-14" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="currentColor" d="M416 208H272V64c0-17.67-14.33-32-32-32h-32c-17.67 0-32 14.33-32 32v144H32c-17.67 0-32 14.33-32 32v32c0 17.67 14.33 32 32 32h144v144c0 17.67 14.33 32 32 32h32c17.67 0 32-14.33 32-32V304h144c17.67 0 32-14.33 32-32v-32c0-17.67-14.33-32-32-32z"></path></svg>
                    <span class="ml-2 text-xs font-semibold">فتح صف جديد</span>
                </a>
            </div>
        </div><!-- Log on to codeastro.com for more projects -->
        <div class="mt-8 bg-white rounded border-b-4 border-gray-300" style="text-align: center">
            <div class="flex flex-wrap items-center uppercase text-sm font-semibold bg-gray-600 text-white rounded-tl rounded-tr">
                <div class="w-2/12 px-4 py-3">اسم الصف</div>
                <div class="w-2/12 px-4 py-3">الوصف</div>
                <div class="w-1/12 px-4 py-3">تاريخ البدء</div>
                <div class="w-1/12 px-4 py-3 text-center">الساعات</div>
                <div class="w-2/12 px-4 py-3">الايام</div>
                <div class="w-2/12 px-4 py-3">الفرع</div>
                <div class="w-1/12 px-4 py-3">الاستاذ</div>
                <div class="w-1/12 px-4 py-3 text-right">خيارات</div>
            </div>
            @foreach ($courses as $course)
                <div class="flex flex-wrap items-center text-gray-700 border-t-2 border-l-4 border-r-4 border-gray-300" style="text-align: center">
                    <div class="w-2/12 px-4 py-3 text-sm font-semibold text-gray-600 tracking-tight">{{ $course->name }}-{{ $course->code }}</div>
                    <div class="w-2/12 px-4 py-3 text-sm font-semibold text-gray-600 tracking-tight">{{ $course->description }}</div>
                    <div class="w-1/12 px-4 py-3 text-sm font-semibold text-gray-600 tracking-tight">{{ $course->stdate }}</div>
                    <div class="w-1/12 px-4 py-3 text-sm font-semibold text-gray-600 tracking-tight">{{ $course->time  }}</div>
                    <div class="w-2/12 px-4 py-3 text-sm font-semibold text-gray-600 tracking-tight">{{ $course->days  }}</div>
                    <div class="w-2/12 px-4 py-3 text-sm font-semibold text-gray-600 tracking-tight">{{ $course->branch  }}</div>
                    <div class="w-1/12 px-4 py-3 text-sm font-semibold text-gray-600 tracking-tight">
                        @if ($course->teacher_id == Null)
                        NA
                        @else
                            @foreach ($teachers as $teacher)
                                @if ($teacher->id == $course->teacher_id )
                                    {{ $teacher->name }}
                                @endif
                            @endforeach
                        @endif
                       </div>
                    <div class="w-1/12 flex items-center justify-end px-3">
                        <a href="{{ route('course.show',$course->id) }}" title="show">
                            <svg class="h-6 w-6 fill-current text-green-600" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16"> <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z"/> <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z"/> </svg>
                        </a>
                        <a href="{{ route('course.edit',$course->id) }}" title="Edit">
                            <svg class="h-6 w-6 fill-current text-green-600" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="pen-square" class="svg-inline--fa fa-pen-square fa-w-14" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="currentColor" d="M400 480H48c-26.5 0-48-21.5-48-48V80c0-26.5 21.5-48 48-48h352c26.5 0 48 21.5 48 48v352c0 26.5-21.5 48-48 48zM238.1 177.9L102.4 313.6l-6.3 57.1c-.8 7.6 5.6 14.1 13.3 13.3l57.1-6.3L302.2 242c2.3-2.3 2.3-6.1 0-8.5L246.7 178c-2.5-2.4-6.3-2.4-8.6-.1zM345 165.1L314.9 135c-9.4-9.4-24.6-9.4-33.9 0l-23.1 23.1c-2.3 2.3-2.3 6.1 0 8.5l55.5 55.5c2.3 2.3 6.1 2.3 8.5 0L345 199c9.3-9.3 9.3-24.5 0-33.9z"></path></svg>
                        </a>
                        <form action="{{ route('course.destroy',$course->id) }}" method="POST" class="inline-flex ml-1">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-600 block p-1 border border-red-600 rounded-sm" title="Delete">
                                <svg class="h-3 w-3 fill-current text-gray-100" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="trash" class="svg-inline--fa fa-trash fa-w-14" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="currentColor" d="M432 32H312l-9.4-18.7A24 24 0 0 0 281.1 0H166.8a23.72 23.72 0 0 0-21.4 13.3L136 32H16A16 16 0 0 0 0 48v32a16 16 0 0 0 16 16h416a16 16 0 0 0 16-16V48a16 16 0 0 0-16-16zM53.2 467a48 48 0 0 0 47.9 45h245.8a48 48 0 0 0 47.9-45L416 128H32z"></path></svg>
                            </button>
                        </form>

                    </div>
                </div>
            @endforeach
        </div><!-- Log on to codeastro.com for more projects -->
        <div class="mt-8">
            {{ $courses->links() }}
        </div>
    </div>
@endrole
@endsection
