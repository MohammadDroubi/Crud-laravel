<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
<!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>

    <div class="container">
        <h2 class="m-auto text-center mt-4">Update category</h2>
        <div class="form w-50 m-auto mt-5">
            <form action="{{ url("/update/$cats->id") }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT');

                <div class="mb-3">
                    <label  class="form-label fs-4">Name</label>
                    <input name="name" type="text" class="form-control" value="{{$cats->name}}">
                  </div>

                  <div class="error">
                    @error('name')
                    <p class="alert alert-danger">{{ $message }}</p>
                    @enderror
                  </div>

                  <div class="mb-3">
                    <label  class="form-label fs-4">Description</label>
                    <textarea name="description" class="form-control"  rows="3">{{ $cats->description }}</textarea>
                  </div>

                  <div class="error">
                    @error('description')
                    <p class="alert alert-danger">{{ $message }}</p>
                    @enderror
                  </div>

                  <div class="mb-3">
                    <label  class="form-label fs-4">Image</label>
                  </br>
                    <input  class="mt-2" type="file" name="image" />
                  </div>

                  <div>
                    <img src="{{ asset("storage/$cats->image")  }}" width='200px'>
                  </div>

                  <div class="error">
                    @error('image')
                    <p class="alert alert-danger">{{ $message }}</p>
                    @enderror
                  </div>

                  <button  class="btn btn-info mt-4 d-block m-auto">Update category</button>


                </form>
        </div>
    </div>

</body>
</html>
