@extends('admin.layout.header')

@section('title')
    Add User
@endsection

@section('content')
    <!-- // Basic multiple Column Form section start -->
    <section id="multiple-column-form">
        <div class="row match-height">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Form Add User</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <form class="form" action="/admin/user/insert-user" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                <div class="col-12">
                                        <div class="form-group">
                                            <label for="first-name-column">Username<span class="text-danger">*</span></label>
                                            <input type="text" id="first-name-column" class="form-control @error('name') is-invalid @enderror"
                                                placeholder="Masukan Nama" name="name">
                                                @error('name')
                                                    <span class="invalid-feedback d-block">{{$message}}</span>
                                                @enderror 
                                        </div>
                                    </div>
                                <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="first-name-column">Email<span class="text-danger">*</span></label>
                                            <input type="email" id="first-name-column" class="form-control @error('email') is-invalid @enderror"
                                                placeholder="Masukan Email" name="email">
                                                @error('email')
                                                    <span class="invalid-feedback d-block">{{$message}}</span>
                                                @enderror 
                                        </div>
                                    </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                            <label for="first-name-column">Password<span class="text-danger">*</span></label>
                                            <input type="password" id="first-name-column" class="form-control @error('password') is-invalid @enderror"
                                                placeholder="Masukan Password" name="password">
                                                @error('password')
                                                    <span class="invalid-feedback d-block">{{$message}}</span>
                                                @enderror 
                                        </div>
                                    </div>
                                        <div class="col-md-6 col-12">
                                            <label for="formCategory" class="form-label">Role</label>
                                            <div class="form-group @error('role_id') is-invalid @enderror">
                                                <select name="role_id" id="formCategory" class="choices form-select ">
                                                    <option value="" selected>Open this select menu</option>
                                                    @foreach ($data_role as $row)
                                                    <option value="{{$row->id}}">{{$row->role}}</option>
                                                    @endforeach
                                                </select>
                                                @error('role_id')
                                                        <span class="invalid-feedback d-block">{{$message}}</span>
                                                    @enderror 
                                            </div>
                                        </div>
                                    <div class="col-md-6 col-12 mt-3">
                                        <div class="form-group">
                                            <label for="first-name-column">Foto<span class="text-danger">*</span></label>
                                            <input type="file" id="first-name-column" class="form-control @error('foto') is-invalid @enderror"
                                            placeholder="Masukan Foto" name="foto">
                                                @error('foto')
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