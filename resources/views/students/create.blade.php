<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Create Course</h1>
    <form action="{{ route('student.store') }}" method="post">
    @csrf
     <label for="">Name</label>
    <input type="text" name="name"> <br><br>
    <label for="">Age</label>
    <input type="text" name="age"> <br><br>
    <label for="">Phone</label>
    <input type="text" name="phone"> <br><br>
    <label for="">Address</label>
    <input type="text" name="address"> <br><br>
    <label for="">Select Your Course</label><br><br>

    <!-- <select name="course_id" id="course" class="form-control">
      <option value="">Select Course</option>
      @foreach ($courses as $course)
        <option value="{{ $course->id }}">{{ $course->name }}</option>
      @endforeach
    </select><br><br> -->

    <select name="courses[]" id="courses" multiple class="form-control">
      @foreach ($courses as $course)
        <option value="{{ $course->id }}">{{ $course->name }}</option>
      @endforeach
    </select> 

   
    
    <button type="submit">Create</button>
    </form>
</body>
</html>