<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <title>Medic Profile</title>
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
   <style>

      .table th, .table td {
         font-size: 16px;
         text-align: center;
      }


      .table img {
         max-width: 150px;
      }
   </style>
</head>
<body>
   <div class="container">
      <div class="row">
         <div class="col-md-12">
            <div class="card">
               <div class="card-header">All medics</div>
               <div class="card-body">
                  <a href="{{ url('add-medic') }}" class="btn btn-success btn-sm">Add medic</a>
                  <div class="table-responsive">
                     <table class="table">
                        <thead>
                           <tr>
                              <th>Number</th>
                              <th>Name</th>
                              <th>Price</th>
                              <th>Profile Image</th>
                              <th>Actions</th>
                           </tr>
                        </thead>
                        <tbody>
                           @foreach ($medics as $medic)
                           <tr>
                              <td>{{ $loop->iteration }}</td>
                              <td>{{ $medic->name }}</td>
                              <td>{{ $medic->price }}</td>
                              <td><img src="{{ asset('image') }}/{{ $medic->profileimage }}"></td>
                              <td><a href="/show-medic/{{ $medic->id }}" class="btn btn-info">View</a></td>
                           </tr>
                           @endforeach
                        </tbody>
                     </table>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</body>
</html>

