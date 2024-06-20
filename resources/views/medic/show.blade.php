<!doctype html>
<html lang="en">
<head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <title>Add medic</title>
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9"crossorigin="anonymous">
</head>
<body>
   <div class="container">
       <div class="row">
           <div class="col-md-12">
               <div class="card">
                   <div class="card-header">Profile medic</div>
                       <div class="card-body">
                       <a href="{{ url('all-medic') }}" class="btn btn-success btn-sm">All medic</a>
                           <div class="table-responsive">
                               <p class="card-title">
                                   Name: {{ $medic->name }}
                               </p>
                               <p class="card-title">
                                   Price: {{ $medic->price }}
                               </p>
                               <img src="{{ asset('image') }}/{{ $medic->profileimage }}"style="max-width:130px;margin-top:20px;">
                           </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm"crossorigin="anonymous"></script>
</body>
</html>

