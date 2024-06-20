<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">
</head>
<body>
    <h1>Create Product</h1>
    <form action="{{route('productStore')}}" method="post" enctype="multipart/form-data">
    @csrf

    <label for="">Name</label>
    <input type="text" name="name"> <br><br>
    @error('name')
    <span class="text-danger">Name is required</span><br><br>
    @enderror

    <label for="">Price</label>
    <input type="text" name="price"><br><br>
    @error('price')
    <span class="text-danger">Price is required</span><br><br>
    @enderror 

    <label for="">Image</label>
    <input type="file" name="images[]" id="productImages" multiple><br><br>

    <button type="submit">Create</button>
    </form>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"></script>
</body>
</html>