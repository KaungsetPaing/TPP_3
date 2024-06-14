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
    <h1>Articles List</h1>
    <a href="{{route('article.create')}}">Create</a>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Name</th>
            <th scope="col">Address</th>
           
            <th> Action</th>
            
        </tr>
        </thead>
        <tbody>
        @foreach($article as $a)
            <tr>
                <td>{{$a->id}}</td>
                <td>{{$a->name}}</td>
                <td>{{$a->address}}</td>
                
                <td>
                    <a href="{{route('article.edit',$a->id)}}">Edit</a>

                    <form action="{{ route('article.destroy', $a->id) }}" method="post">
                 
                    @csrf
                    @method('DELETE')
                    <button>Delete</button>
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
