 @include('layouts.master')
@yield('content')

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
                                         <th>#</th>
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
                                        <td><img src="{{ asset('image') }}/{{ $medic->profileimage }}"style="max-width:60px;"></td>
                                        <td><a href="/show-medic/{{ $medic->id }}" class="btnbtn-info">View</a>
                                        </td>
                                        <td><a href="/edit-medic/{{ $medic->id }}" class="btnbtn-warning">Edit</a>
                                        </td>
                                        <td>
                                          <form action="{{ route('medic.delete',$medic->id) }}" method="POST">
                                            @csrf
                                            <input name="_method" type="hidden" value="DELETE">
                                            <button type="submit" class="btn btn-xs btn-danger btn-flatshow_confirm" data-toggle="tooltip" title="Delete" >Delete</button>
                                          </form>
                                        </td>
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
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm"crossorigin="anonymous"></script>
</body>
<script type="text/javascript">
    $('.show_confirm').click(function (event){
        var form = $(this).closet("form");
        var name = $(this).data("name");

        event.preventDefault();
        swal({
            title: 'Are you sure to delete this record ?',
            text: "If your delete this, will be gone forever.",
            icon: "warning",
            buttons: true,
            dangerMode: true,
       })
       .then((willDelete)=> {
       if(willDelete){
          form.submit();
       }
       });
    });
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

