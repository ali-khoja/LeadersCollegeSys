@extends('layouts.app')

@section('content')
    <div class="roles-permissions">
        <div class="flex items-center justify-between mb-6" style="justify-content: center">
            <div>
                <h2 class="text-gray-700 uppercase font-bold" >الدورات المنتهية </h2>
            </div>
        </div>
        <table id="myTable" class="display table" style="text-align: center" >
            <thead>
                <tr>
                    <th>الاسم </th>
                    <th>تاريخ البداية</th>
                    <th> الاستاذ</th>
                    <th>الفرع</th>
                    <th>خيارات</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($courses as $course)
                <tr>
                    <td>
                        <a href="{{ route('course.show',$course->id) }}" style="color: #df0000">{{ $course->name }}-{{ $course->code }}</a>
                    </td>
                    <td>{{ $course->stdate }}</td>
                    <td>{{ $course->teacher_id }}</td>
                    <td>
                        @if($course->branch=='brayati')
                            Brayati
                        @else
                            Lawan
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('course.edit',$course->id) }}" style="float:left ;" title="Edit">
                            <svg class="h-6 w-6 fill-current text-green-600" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="pen-square" class="svg-inline--fa fa-pen-square fa-w-14" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="currentColor" d="M400 480H48c-26.5 0-48-21.5-48-48V80c0-26.5 21.5-48 48-48h352c26.5 0 48 21.5 48 48v352c0 26.5-21.5 48-48 48zM238.1 177.9L102.4 313.6l-6.3 57.1c-.8 7.6 5.6 14.1 13.3 13.3l57.1-6.3L302.2 242c2.3-2.3 2.3-6.1 0-8.5L246.7 178c-2.5-2.4-6.3-2.4-8.6-.1zM345 165.1L314.9 135c-9.4-9.4-24.6-9.4-33.9 0l-23.1 23.1c-2.3 2.3-2.3 6.1 0 8.5l55.5 55.5c2.3 2.3 6.1 2.3 8.5 0L345 199c9.3-9.3 9.3-24.5 0-33.9z"></path></svg>
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="mt-8">
        {{ $courses->links() }}
        </div>
    @include('backend.modals.delete',['name' => 'student'])
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

