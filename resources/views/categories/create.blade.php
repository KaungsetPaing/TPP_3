<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Create Category</h1>
    <form action="{{route('categoryStore')}}" method="post">
    @csrf
     <label for="">Name</label>
    <input type="text" name="name">
    <button type="submit">Create</button>
    </form>
</body>
</html>