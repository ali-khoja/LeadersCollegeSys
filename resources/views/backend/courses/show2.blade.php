<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Attendence</title>
</head>
<style>
    @media print {
  .print-button {
    display: none;
  }
}
</style>
<body>
    <h2 style="text-align:center">قائمة حضور وغياب  {{$course->name}}-{{$course->code}} - Time : {{$course->time}} - Days : {{$course->days}}</h2>
<table class="table w-auto table-bordered" style="text-align:center">
  <thead>
    <tr>
      <th scope="col">اسم الطالب</th>
      <th scope="col">01</th>
      <th scope="col">02</th>
      <th scope="col">03</th>
      <th scope="col">04</th>
      <th scope="col">05</th>
      <th scope="col">06</th>
      <th scope="col">07</th>
      <th scope="col">08</th>
      <th scope="col">09</th>
      <th scope="col">10</th>
      <th scope="col">11</th>
      <th scope="col">12</th>
      <th scope="col">13</th>
      <th scope="col">14</th>
      <th scope="col">15</th>
      <th scope="col">16</th>
      <th scope="col">17</th>
      <th scope="col">18</th>
      <th scope="col">19</th>
      <th scope="col">20</th>
      <th scope="col">21</th>
      <th scope="col">22</th>
      <th scope="col">23</th>
      <th scope="col">24</th>
      <th scope="col">25</th>
      <th scope="col">26</th>
      <th scope="col">27</th>
      <th scope="col">28</th>
      <th scope="col">29</th>
      <th scope="col">30</th>
      <th scope="col">31</th>
    </tr>
  </thead>
  <tbody>
    @foreach($students as $student )
    <tr>
      <td>{{$student->fullname}}-{{$student->phone1}}</td>
      <td scope="col"></td>
      <td scope="col"></td>
      <td scope="col"></td>
      <td scope="col"></td>
      <td scope="col"></td>
      <td scope="col"></td>
      <td scope="col"></td>
      <td scope="col"></td>
      <td scope="col"></td>
      <td scope="col"></td>
      <td scope="col"></td>
      <td scope="col"></td>
      <td scope="col"></td>
      <td scope="col"></td>
      <td scope="col"></td>
      <td scope="col"></td>
      <td scope="col"></td>
      <td scope="col"></td>
      <td scope="col"></td>
      <td scope="col"></td>
      <td scope="col"></td>
      <td scope="col"></td>
      <td scope="col"></td>
      <td scope="col"></td>
      <td scope="col"></td>
      <td scope="col"></td>
      <td scope="col"></td>
      <td scope="col"></td>
      <td scope="col"></td>
      <td scope="col"></td>
      <td scope="col"></td>
    </tr>
    @endforeach
  </tbody>
</table>
<button onclick="window.print()" class="print-button bg-green-500 text-white text-sm uppercase py-2 px-4 flex items-center rounded">
<svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 fill-current"  fill="currentColor" class="bi bi-printer" viewBox="0 0 16 16"> <path d="M2.5 8a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1z"/> <path d="M5 1a2 2 0 0 0-2 2v2H2a2 2 0 0 0-2 2v3a2 2 0 0 0 2 2h1v1a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2v-1h1a2 2 0 0 0 2-2V7a2 2 0 0 0-2-2h-1V3a2 2 0 0 0-2-2H5zM4 3a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1v2H4V3zm1 5a2 2 0 0 0-2 2v1H2a1 1 0 0 1-1-1V7a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1h-1v-1a2 2 0 0 0-2-2H5zm7 2v3a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1v-3a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1z"/> </svg>
                <span class="ml-2 text-xs font-semibold">Print This Page</span>
            </button>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</html>

