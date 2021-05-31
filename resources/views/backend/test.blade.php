<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>

{{-- <div class="container">
  <h2>Bordered Table</h2>
  <p>The .table-bordered class adds borders on all sides of the table and the cells:</p>            
  <table class="table table-bordered">
    <thead>
        <tr>
          <th>User</th>
          <th>Course</th>
          <th>Class Link</th>
          <th>Day</th>
          <th>Start Time</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($user_course as $course)
        <tr>
          <td>
            <ul>
                @foreach ($course->users as $item )
                  <li>{{ $item->fullname }}</li>
                  <li>{{ $item->number }}</li>
                @endforeach
            </ul>
          </td>
            <td>{{ $course->user_course_name }}</td>
            <td>{{ $course->class_link }}</td>
            <td>{{ $course->day }}</td>
            <td>{{ $course->start_time }}</td>
           
        </tr>
        @endforeach
      <tr>
      </tr>
    </tbody>
  </table>
</div> --}}



<div class="container">
  <h2>Bordered Table</h2>
  <p>The .table-bordered class adds borders on all sides of the table and the cells:</p>            
  <table class="table table-bordered">
    <thead>
        <tr>
          <th>User</th>
          <th>Course</th>
          <th>Class Link</th>
          <th>Day</th>
          <th>Start Time</th>
        </tr>
    </thead>
    <tbody>
      @foreach ($users as $user)
      <tr>
        <td>{{ $user->fullname }}</td>
        <td>{{ $user->userCourse->class_link }}</td>
        <td>{{ $user->number }}</td>
      </tr>
        @endforeach
    </tbody>
  </table>
</div>

</body>
</html>
