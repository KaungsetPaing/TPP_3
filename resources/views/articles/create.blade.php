<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Create Article</h1>
    <form action="{{ route('article.store') }}" method="post">
    @csrf
     <label for="">Name</label>
    <input type="text" name="name"> <br><br>
    <label for="">Address</label>
    <input type="text" name="address"><br><br>
    <button type="submit">Create</button>
    </form>
</body>
</html>