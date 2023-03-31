@extends('admin.layout.header')

@section('title')
    Account 
@endsection

@section('content')
    <!-- Basic Tables start -->
    <section class="section">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-11">
                        Data Account
                    </div>
                    <div class="col-1">
                        <a href="/admin/account/add-account"><i class="bi bi-cloud-plus-fill fs-4"></i></a>
                    </div>
                </div>
                
            </div>
            <div class="card-body ">
                <table class="table " id="table1">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Foto</th>
                            <th>App</th>
                            <th>Email</th>
                            <th>Username</th>
                            <th>Nomor</th>
                            <th>Password</th>
                            @if (auth()->user()->role_user->role == 'Moderator')
                            <th>User</th>
                            @endif
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $no = 1;
                        @endphp
                        @foreach ($data as $row)
                        <tr>
                            <td><a class="text-primary" href="/admin/account/edit-account/{{$row->id}}">{{$no++}}</a></td>
                            <td><img width="30px" class="rounded" src="{{$row->app->foto}}" alt="{{$row->app->app}}"></td>
                            <td>{{$row->app->app}}</td>
                            <td>{{$row->email}}</td>
                            <td>{{$row->username}}</td>
                            <td>{{$row->nomor}}</td>
                            <td>{{$row->password}}</td>
                            @if (auth()->user()->role_user->role == 'Moderator')
                            <td>{{$row->user->name}}</td>
                            @endif
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </section>
    <!-- Basic Tables end -->
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