@extends('admin.layout.header')

@section('title')
    Edit User
@endsection

@section('content')
    <!-- // Basic multiple Column Form section start -->
    <section id="multiple-column-form">
        <div class="row match-height">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-10">
                                <h4 class="card-title">Form Edit User</h4>
                            </div>
                            <div class="col-1">
                                <a href="/admin/user/add-user"><i class="bi bi-cloud-plus-fill fs-4"></i></a>
                            </div>
                            <div class="col-1">
                                <a class="delete" href="#" data-id="{{$data->id}}" data-title="{{$data->name}}"><i class="bi bi-trash3-fill fs-4"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <form class="form" action="/admin/user/update-user/{{$data->id}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                <div class="col-12">
                                        <div class="form-group">
                                            <label for="first-name-column">Username<span class="text-danger">*</span></label>
                                            <input type="text" value="{{$data->name}}" id="first-name-column" class="form-control @error('name') is-invalid @enderror"
                                                placeholder="Masukan Nama" name="name">
                                                @error('name')
                                                    <span class="invalid-feedback d-block">{{$message}}</span>
                                                @enderror 
                                        </div>
                                    </div>
                                <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="first-name-column">Email<span class="text-danger">*</span></label>
                                            <input type="email" value="{{$data->email}}" id="first-name-column" class="form-control @error('email') is-invalid @enderror"
                                                placeholder="Masukan Email" name="email">
                                                @error('email')
                                                    <span class="invalid-feedback d-block">{{$message}}</span>
                                                @enderror 
                                        </div>
                                </div>
                                
                                        <div class="col-md-6 col-12">
                                            <label for="formCategory" class="form-label">Role</label>
                                            <div class="form-group @error('role_id') is-invalid @enderror">
                                                <select name="role_id" id="formCategory" class="choices form-select ">
                                                    <option value="{{$data->role_id}}" selected>{{$data->role_user->role}}</option>
                                                    @foreach ($data_role as $row)
                                                    <option value="{{$row->id}}">{{$row->role}}</option>
                                                    @endforeach
                                                </select>
                                                @error('role_id')
                                                        <span class="invalid-feedback d-block">{{$message}}</span>
                                                    @enderror 
                                            </div>
                                        </div>
                                        <div class="col-md-2 col-12">
                                    <img width="100px" class="rounded" src="{{asset('images/user/'.$data->foto)}}" alt="{{$data->foto}}">
                                </div>
                                    <div class="col-md-10 col-12">
                                        <div class="form-group">
                                            <label for="first-name-column">Foto<span class="text-danger">*</span></label>
                                            <input type="file" value="{{$data->foto}}" id="first-name-column" class="form-control @error('foto') is-invalid @enderror"
                                            placeholder="Masukan Foto" name="foto">
                                                @error('foto')
                                                    <span class="invalid-feedback d-block">{{$message}}</span>
                                                    @enderror 
                                        </div>
                                    </div>
                                    
                                    
                                    <div class="col-12 d-flex justify-content-end">
                                        <button type="submit" class="btn btn-primary me-1 mb-1">Submit</button>
                                        <button type="reset" class="btn btn-light-secondary me-1 mb-1">Reset</button>
                                        <a href="/admin/user/edit-user-password/{{$data->id}}" class="btn btn-light-success me-1 mb-1">Edit Password</a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- // Basic multiple Column Form section end -->
@endsection

@push('script')

    <script>
      $('.delete').click(function () {
          var id = $(this).attr('data-id');
          var title = $(this).attr('data-title');
          const swalWithBootstrapButtons = Swal.mixin({
            customClass: {
              confirmButton: 'btn btn-success',
              cancelButton: 'btn btn-danger'
            },
            buttonsStyling: false
          })
          swalWithBootstrapButtons.fire({
            title: 'Yakin?',
            text: "Kamu akan menghapus data ini dengan Nama " + title + " ",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes, delete it!',
            cancelButtonText: 'No, cancel!',
            reverseButtons: true
          }).then((result) => {
            if (result.isConfirmed) {
              window.location = "/admin/user/delete-user/" + id + ""
              swalWithBootstrapButtons.fire(
                'Deleted!',
                'Data '+ title +' has been deleted.',
                'success'
              )
            } else if (
              /* Read more about handling dismissals below */
              result.dismiss === Swal.DismissReason.cancel
            ) {
              swalWithBootstrapButtons.fire(
                'Cancelled',
                'Data '+ title +' is safe :)',
                'error'
              )
            }
          })
          
      });
    </script>
    @endpush