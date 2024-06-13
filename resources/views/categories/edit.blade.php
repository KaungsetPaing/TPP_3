<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Update Category</h1>
    <form action="{{route('categoryUpdate',$data->id)}}" method="post">
    @csrf
     <label for="">Name</label>
    <input type="text" name="name" value="{{$data->name}}">
    <button type="submit">Update</button>
    </form>
</body>
</html>