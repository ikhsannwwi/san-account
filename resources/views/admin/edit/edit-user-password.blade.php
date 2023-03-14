@extends('admin.layout.header')

@section('title')
    Edit User Password
@endsection

@section('content')
    <!-- // Basic multiple Column Form section start -->
    <section id="multiple-column-form">
        <div class="row match-height">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Form Edit User Password</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <form class="form" action="/admin/user/update-user-password/{{$data->id}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-2">
                                        <img width="100px" class="rounded" src="{{asset('images/user/'.$data->foto)}}" alt="{{$data->foto}}">
                                    </div>
                                    <div class="col-10">
                                        <h3 class="mt-3">Username : {{$data->name}}</h3>
                                        <h3 class="mt-3">Email : {{$data->email}}</h3>
                                    </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                            <label for="first-name-column">Password<span class="text-danger">*</span></label>
                                            <input type="password" id="first-name-column" class="form-control @error('password') is-invalid @enderror"
                                                placeholder="Masukan Password" name="password">
                                                @error('password')
                                                    <span class="invalid-feedback d-block">{{$message}}</span>
                                                @enderror 
                                        </div>
                                    </div>
                                    
                                    
                                    <div class="col-12 d-flex justify-content-end">
                                        <button type="submit" class="btn btn-primary me-1 mb-1">Submit</button>
                                        <button type="reset" class="btn btn-light-secondary me-1 mb-1">Reset</button>
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