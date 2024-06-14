<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Update Article</h1>
    <form action="{{ route('article.update', $data->id) }}" method="post">
    @csrf
    @method('PUT')
     <label for="">Name</label>
    <input type="text" name="name" value="{{$data->name}}"><br><br>
    <label for="">Address</label>
    <input type="text" name="address" value="{{$data->address}}"><br><br>
    <button type="submit">Update</button>
    </form>
</body>
</html>