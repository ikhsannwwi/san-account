@extends('admin.layout.header')

@section('title')
    Detail App
@endsection

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
                </div>
            </div>
        </div>
    </div>
    <section class="row">
        <div class="col-12">
            <div class="row">
                @php
                    $no = 1;
                @endphp
            @foreach ($data->account as $row)
            <div class="col-6 col-md-6">
                    <div class="card">
                        <div class="card-body px-4 py-4-5">
                            <div class="row">
                                <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                    <h6 class="text-muted font-semibold text-center">{{$no++}}</h6>
                                    <h6 class="text-muted font-semibold">Email : {{$row->email}}</h6>
                                    <h6 class="text-muted font-semibold">Nomor : {{$row->nomor}}</h6>
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