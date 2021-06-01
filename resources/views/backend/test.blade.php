<!DOCTYPE html>
<html lang="en">
<head>
  <title>Pivot Table Data Show</title>
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
  <h2>User</h2>            
  <table class="table table-bordered">
    <thead>
        <tr>
          <th>User Name</th>
          <th>User Email</th>
          <th>Course</th>
          <th>Class Link</th>
          <th>Day</th>
          <th>Start Time</th>
        </tr>
    </thead>
    <tbody>
      <tr>
        <td>{{ $users->fullname }}</td>
        <td>{{ $users->email }}</td>
        <td>
          @foreach ($users->usercourse as $item)
          <tr>
            <ul>
              <li>{{ $item->user_course_name }}</li>
            </ul>
          </tr>
          @endforeach
        </td>
        <td>
          @foreach ($users->usercourse as $item)
          <tr>
            <ul>
              <li>{{ $item->class_link }}</li>
            </ul>
          </tr>
          @endforeach
        </td>
      </tr>
    </tbody>
  </table>
</div>




<div class="container">
  <h2>User Course</h2>            
  <table class="table table-bordered">
    <thead>
        <tr>
          <th>User Name</th>
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
          @foreach ($course->users as $item)
          <ul>
            <li>{{ $item->fullname }}</li>
          </ul>
          @endforeach
        </td>
        <td>{{ $course->user_course_name }}</td>
        <td>{{ $course->class_link }}</td>
        <td>{{ $course->day }}</td>
        <td>{{ $course->start_time }}</td>
      </tr>
      @endforeach

    </tbody>
  </table>
</div>
</body>
</html>
