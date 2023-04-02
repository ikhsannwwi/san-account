@extends('admin.layout.header')

@section('title')
    Detail App
@endsection
@push('active_app')
    
    {{request()->is(
                    'app/'.$data->slug,
                ) ? 'active' : ''}}
@endpush
@section('content')
<div class="page-heading">
    <h3>Detail App</h3>
</div>
<div class="page-content">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body px-4 py-4-5">
                    <div class="row">
                        <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7 text-center">
                            <img class="mb-3" src="{{$data->foto}}" alt="">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                            <h6 class="text-muted font-bold text-center">{{$data->app}}</h6>
                        </div>
                    </div>
                    @if (auth()->user()->role_user->role == 'Moderator')
                    <div class="row">
                        <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                            <h6 class="text-muted font-bold text-center">{{$data->user->email}}</h6>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <div class="page-content">
        <div class="container">
            <br/>
                <div class="row justify-content-center">
                    <div class="col-12 col-md-10 col-lg-8">
                        <form class="card card-sm" action="account" method="get">
                            <div class="card-body row no-gutters align-items-center">
                                <div class="col-auto">
                                    <i class="fas fa-search h4 text-body"></i>
                                </div>
                                <!--end of col-->
                                <div class="col">
                                    <input class="form-control form-control-lg form-control-borderless" name="q" type="search" placeholder="Search topics or keywords">
                                </div>
                                <!--end of col-->
                                <div class="col-md-auto col">
                                    <button class="btn btn-lg btn-success" type="submit">Search</button>
                                </div>
                        </form>
    
                                <!--end of col-->
                                    <div class="col-md-auto col">
                                        <button class="btn btn-lg btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#inlineForm">
                                            Tambah Account
                                        </button>
                                    </div>
    
                                    <!--login form Modal -->
                                    <div class="modal fade text-left" id="inlineForm" tabindex="-1" aria-labelledby="myModalLabel33" aria-hidden="true" style="display: none;">
                                        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title" id="myModalLabel33">Account Form </h4>
                                                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                                                    </button>
                                                </div>
                                                <form action="/account/insert-account/{{$data->slug}}" method="post" enctype="multipart/form-data">
                                                    @csrf
                                                    <div class="modal-body">
                                                        <label>Username: </label>
                                                        <div class="form-group">
                                                            @if (auth()->user()->role_user->role == 'Pengguna')
                                                            <input type="number" class="d-none" name="user_id" value="{{auth()->user()->id}}">
                                                            @endif
                                                            <input type="number" class="d-none" name="app_id" value="{{$data->id}}">
                                                            <input name="username" type="text" placeholder="Masukkan Username" class="form-control @error('username') is-invalid @enderror">
                                                            @error('username')
                                                                <span class="invalid-feedback d-block">{{$message}}</span>
                                                            @enderror 
                                                        </div>
                                                        <label>Email: </label>
                                                        <div class="form-group">
                                                            <input name="email" type="text" placeholder="Masukkan Email" class="form-control @error('email') is-invalid @enderror">
                                                            @error('email')
                                                                <span class="invalid-feedback d-block">{{$message}}</span>
                                                            @enderror 
                                                        </div>
                                                        
                                                        <label>Nomor Telepon: </label>
                                                        <div class="form-group">
                                                            <input name="nomor" type="number" placeholder="Masukkan Nomor Telepon" class="form-control @error('nomor') is-invalid @enderror">
                                                            @error('nomor')
                                                                <span class="invalid-feedback d-block">{{$message}}</span>
                                                            @enderror 
                                                        </div>
                                                        <label>Password: </label>
                                                        <div class="form-group">
                                                            <input name="password" type="text" placeholder="Masukkan Password" class="form-control @error('password') is-invalid @enderror">
                                                            @error('password')
                                                                <span class="invalid-feedback d-block">{{$message}}</span>
                                                            @enderror 
                                                        </div>
                                                    @if (auth()->user()->role_user->role == 'Moderator')
                                                        <label>User:</label>
                                                        <div class="form-group @error('user_id') is-invalid @enderror">
                                                            <select name="user_id" id="formCategory" class="choices form-select ">
                                                                <option value="" selected>Open this select menu</option>
                                                                @foreach ($data_user as $row)
                                                                <option value="{{$row->id}}">{{$row->name}}</option>
                                                                @endforeach
                                                            </select>
                                                            @error('user_id')
                                                            <span class="invalid-feedback d-block">{{$message}}</span>
                                                                @enderror 
                                                            </div>
                                                        @endif
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                                                            <i class="bx bx-x d-block d-sm-none"></i>
                                                            <span class="d-none d-sm-block">Close</span>
                                                        </button>
                                                        <button type="submit" class="btn btn-primary ml-1">
                                                            <i class="bx bx-check d-block d-sm-none"></i>
                                                            <span class="d-none d-sm-block">Tambah</span>
                                                        </button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                
                                <!--end of col-->
                            </div>
                    </div>
                    <!--end of col-->
                </div>
            </div>  
    <section class="row">
        <div class="col-12">
            <div class="row">
                @php
                    $no = $data->account->count();
                @endphp
            @foreach ($data->account as $row)
            <div class="col-6 col-md-6">
                    <div class="card">
                        <div class="card-body px-4 py-4-5">
                            <div class="row">
                                <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                    <h6 class="text-muted font-semibold text-center">{{$no--}}</h6>
                                    <div class="dropdown text-end">
                                        <button class="btn dropdown-toggle me-1" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            Edit
                                        </button>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton" style="">
                                            <a class="dropdown-item" href="/account/edit-account/{{$data->slug}}/{{$row->id}}">Edit {{$row->email}}</a>
                                            <a class="dropdown-item delete" href="#" data-id="{{$row->id}}" data-title="{{$row->email}}">Delete</a>
                                        </div>
                                    </div>
                                    <h6 class="text-muted font-semibold">Email : {{$row->email}}</h6>
                                    @if ($row->username != null)
                                    <h6 class="text-muted font-semibold">Username : {{$row->username}}</h6>
                                    @endif
                                    @if ($row->nomor != null)
                                    <h6 class="text-muted font-semibold">Nomor : {{$row->nomor}}</h6>
                                    @endif
                                    <h6 class="text-muted font-semibold">Password : {{$row->password}}</h6>
                                    {{-- <h6 class="font-extrabold mb-0">{{$row->nomor}}</h6> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                    @endforeach
            </div>
        </div>
    </section>
</div>
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
              window.location = "/account/delete-account/" + id + ""
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

@push('css')
    <style>
        .form-control-borderless {
    border: none;
}

.form-control-borderless:hover, .form-control-borderless:active, .form-control-borderless:focus {
    border: none;
    outline: none;
    box-shadow: none;
}
    </style>
@endpush
@push('script')
@if (session()->has('success'))
<script>
    toastr.options = {
    "closeButton": true,
    "debug": false,
    "newestOnTop": false,
    "progressBar": true,
    "rtl": false,
    "positionClass": "toast-top-right",
    "preventDuplicates": false,
    "onclick": null,
    "showDuration": 300,
    "hideDuration": 1000,
    "timeOut": 5000,
    "extendedTimeOut": 1000,
    "showEasing": "swing",
    "hideEasing": "linear",
    "showMethod": "fadeIn",
    "hideMethod": "fadeOut"
  };
      toastr["success"]("{{ Session::get('success') }}")
      @endif
      </script>
    <script>
        @if (session()->has('error'))
    toastr.options = {
    "closeButton": true,
    "debug": false,
    "newestOnTop": false,
    "progressBar": true,
    "rtl": false,
    "positionClass": "toast-top-right",
    "preventDuplicates": false,
    "onclick": null,
    "showDuration": 300,
    "hideDuration": 1000,
    "timeOut": 5000,
    "extendedTimeOut": 1000,
    "showEasing": "swing",
    "hideEasing": "linear",
    "showMethod": "fadeIn",
    "hideMethod": "fadeOut"
  };
      toastr["error"]("{{ Session::get('error') }}")
      @endif
    </script>
@endpush
@endsection