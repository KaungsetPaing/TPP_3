<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Update Product</h1>
    <form action="{{route('productUpdate',$product->id)}}" method="post">
    @csrf
     <label for="">Name</label>
    <input type="text" name="name" value="{{$product->name}}"> <br><br>
    <label for="">Price</label>
    <input type="text" name="price" value="{{$product->price}}"><br><br>
    <label for="">Image</label>
    <input type="file" name="image" value="{{$product->image}}"><br><br>
    <button type="submit">Update</button>
    </form>
</body>
</html>