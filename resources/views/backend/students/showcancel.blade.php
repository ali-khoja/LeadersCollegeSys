@extends('layouts.app')

@section('content')
    <div class="roles-permissions">
        <div class="flex items-center justify-between mb-6" style="justify-content: center">
            <div>
                <h2 class="text-gray-700 uppercase font-bold" >الطلاب الذين انسحبوا من الدبلوم</h2>
            </div>
        </div>
        <table id="myTable" class="display table" style="text-align: center" >
            <thead>
                <tr>
                    <th>اسم الطالب</th>
                    <th> المدفوع</th>
                    <th>الدورة</th>
                    <th>الفرع</th>
                    <th>خيارات</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($students as $student)
                <tr>
                    <td>
                        <a href="{{ route('student.show',$student->id) }}" style="color: #df0000">{{ $student->fullname }} - {{$student->note}}</a>
                    </td>
                    <td>{{ $student->paid }}</td>
                    <td>{{ $student->course->name }}-{{ $student->course->code }} </td>
                    <td>
                        @if($student->branch=='brayati')
                            Brayati
                        @else
                            Lawan
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('student.edit',$student->id) }}" style="float:left ;" title="Edit">
                            <svg class="h-6 w-6 fill-current text-green-600" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="pen-square" class="svg-inline--fa fa-pen-square fa-w-14" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="currentColor" d="M400 480H48c-26.5 0-48-21.5-48-48V80c0-26.5 21.5-48 48-48h352c26.5 0 48 21.5 48 48v352c0 26.5-21.5 48-48 48zM238.1 177.9L102.4 313.6l-6.3 57.1c-.8 7.6 5.6 14.1 13.3 13.3l57.1-6.3L302.2 242c2.3-2.3 2.3-6.1 0-8.5L246.7 178c-2.5-2.4-6.3-2.4-8.6-.1zM345 165.1L314.9 135c-9.4-9.4-24.6-9.4-33.9 0l-23.1 23.1c-2.3 2.3-2.3 6.1 0 8.5l55.5 55.5c2.3 2.3 6.1 2.3 8.5 0L345 199c9.3-9.3 9.3-24.5 0-33.9z"></path></svg>
                        </a>
                        <a href="{{ route('student.destroy', $student->id) }}" data-url="{!! URL::route('student.destroy', $student->id) !!}"  style=" float:left ; font-size: 10px; color : white" class="deletestudent " title="Delete">
                            <svg class="h-5 w-5 fill-current text-red-600" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="trash" class="svg-inline--fa fa-trash fa-w-14" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="currentColor" d="M432 32H312l-9.4-18.7A24 24 0 0 0 281.1 0H166.8a23.72 23.72 0 0 0-21.4 13.3L136 32H16A16 16 0 0 0 0 48v32a16 16 0 0 0 16 16h416a16 16 0 0 0 16-16V48a16 16 0 0 0-16-16zM53.2 467a48 48 0 0 0 47.9 45h245.8a48 48 0 0 0 47.9-45L416 128H32z"></path></svg>
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="mt-8">
        {{ $students->links() }}
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

