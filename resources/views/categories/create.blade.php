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
        <h2 class="m-auto text-center mt-4">Add categories</h2>
        <div class="form w-50 m-auto mt-5">
            <form action="{{ url('/store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label  class="form-label fs-4">Name</label>
                    <input name="name" type="text" class="form-control" value="{{ old('name') }}">
                  </div>

                  <div class="error">
                    @error('name')
                    <p class="alert alert-danger">{{ $message }}</p>
                    @enderror
                  </div>

                  <div class="mb-3">
                    <label  class="form-label fs-4">Description</label>
                    <textarea name="description" class="form-control"  rows="3">{{ old('description') }}</textarea>
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

                  <div class="error">
                    @error('image')
                    <p class="alert alert-danger">{{ $message }}</p>
                    @enderror
                  </div>

                  <button  class="btn btn-info mt-4 d-block m-auto">Add category</button>


                </form>
        </div>
    </div>

</body>
</html>
