<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Product Page</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">
</head>
<body>
    <h1>Products List</h1>
    <a href="{{route('productCreate')}}">Create</a>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Name</th>
            <th scope="col">Price</th>
            <th scope="col">Image</th>
            <th> Action</th>
            
        </tr>
        </thead>
        <tbody>
        @foreach($product_item as $p)
            <tr>
                <td>{{$p->id}}</td>
                <td>{{$p->name}}</td>
                <td>{{$p->price}}</td>
                <td>
                  
                    <!-- <img src="{{asset('images/'.$p->image)}}" alt="" width="80px" height="80px"> -->
                    @foreach($p->images as $image)
                        <img src="{{ asset('images/'.$image->image_path) }}" width="50px" height="50px">
                    @endforeach
                </td>
                
                <td>
                    <a href="{{route('productEdit', ['id' => $p->id])}}" class="btn btn-info"  >Edit</a>

                    <form action="{{route('productDelete',$p->id)}}" method="post">
                    @csrf
                  
                        <button class="btn btn-sm btn-danger">Delete</button>
                    </form>
                </td>
               
            </tr>
        @endforeach
        </tbody>
    </table>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"></script>
</body>
</html>
