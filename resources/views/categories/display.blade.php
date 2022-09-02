<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">

    <title>Document</title>
</head>
<body>
    <div class="container">
    <h2 class="text-center">All categories</h2>

    @if (session()->has('success'))
        <div class="alert alert-success">{{session()->get('success')}}</div>
    @endif

    <a class="btn btn-success" href="{{ url('create') }}">Add category</a>
    <table class="table mt-5">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Description</th>
            <th scope="col">image</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($cats as $cat )
            <tr>
                <th scope="row">{{ $cat->id }}</th>
                <td>{{ $cat->name }}</td>
                <td>{{ $cat->description }}</td>
                <td><img src="{{ asset("storage/$cat->image") }}" height='200px' width='170px'></td>
                <td>
                    <a class="btn btn-info" href="{{ url("edit/$cat->id") }}">Update</a>
                    <a class="btn btn-danger" href="{{url("delete/$cat->id")}}">Delete</a>

                </td>
              </tr>
            @endforeach


        </tbody>
      </table>
    </div>
</body>
</html>
