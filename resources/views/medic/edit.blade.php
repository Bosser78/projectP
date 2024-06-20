<!doctype html>
<html lang="en">
<head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9"crossorigin="anonymous">
   <title>Edit medic</title>
</head>
<body>
   <div class="container">
       <div class="row">
           <div class="col-md-12">
               <div class="card">
                   <div class="card-header">Edit medic</div>
                   <div class="card-body">
                     <p class="text-end"><a href="{{ url('all-medic') }}" class="btn btn-primary btn-sm">All medic</a></p>
                     @if (Session::has('medic_update'))
                        <div class="alert alert-success">
                           {{ Session::get('medic_update') }}
                        </div>
                     @endif
                    <form action="{{ route('medic.update') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" value="{{ $medic->id }}">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" name="name" class="form-control" value="{{ $medic->name }}">
                        </div><br>
                        <div class="form-group">
                            <label for="price">price</label>
                            <input type="text" name="price" class="form-control"  value="{{ $medic->price }}">
                        </div><br>
                        <div class="form-group">
                            <label for="file">Choose Profile Image</label>
                            <input type="file" name="file" class="form-control" onchange="previewFile(this)">
                            <img id="previewImg"src="{{ asset('image') }}/{{ $medic->profileimage }}" alt="image"style="max-width:130px;margin-top:20px;">
                            
                        </div><br>
                        <button type="submit" class="btn btn-danger">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm"crossorigin="anonymous"></script>
</body>
</html>
