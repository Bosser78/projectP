 @include('layouts.master')
@yield('content')

<body>
   <div class="container">
       <div class="row">
           <div class="col-md-12">
               <div class="card">
                   <div class="card-header">Addad medic</div>
                   <div class="card-body">
                     <p class="text-end"><a href="{{ url('all-medic') }}" class="btn btn-primary btn-sm">All medic</a></p>
                     @if (Session::has('medic_add'))
                        <div class="alert alert-success">
                           {{ Session::get('medic_add') }}
                        </div>
                     @endif
                     <form action="{{ route('medic.store') }}" method="post" enctype="multipart/form-data">
                        <div class="text-end d-flex justify-content-end">
                            <a href="{{ url('all') }}" class="btn btn-primary btn-sm">View All</a>
                        </div>

                        @csrf
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" name="name" class="form-control">
                        </div><br>
                        <div class="form-group">
                            <label for="price">Price</label>
                            <input type="text" name="price" class="form-control">
                        </div><br>
                        <div class="form-group">
                            <label for="file">Choose Profile Image</label>
                            <input type="file" name="file" class="form-control">

                        </div><br>
                        <button type="submit" class="btn btn-danger">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
