@extends('admin.layout.header')

@section('title')
    Edit App
@endsection

@section('content')
    <!-- // Basic multiple Column Form section start -->
    <section id="multiple-column-form">
        <div class="row match-height">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-12">
                                <h4 class="card-title">Form Edit App</h4>
                            </div>
                        </div>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            @if (request()->is(
                                'app/edit-app/'.$data->slug
                            ))
                                <form class="form" action="/app/update-app/{{$data->slug}}" method="post" enctype="multipart/form-data">
                                    @csrf   
                                    <div class="row">
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="first-name-column">App<span class="text-danger">*</span></label>
                                                <input type="text" value="{{$data->app}}" id="first-name-column" class="form-control @error('app') is-invalid @enderror"
                                                    placeholder="Masukan Nama Aplikasi" name="app">
                                                    @error('app')
                                                        <span class="invalid-feedback d-block">{{$message}}</span>
                                                    @enderror 
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="first-name-column">Foto<span class="text-danger">*</span></label>
                                                <input type="text" value="{{$data->foto}}" id="first-name-column" class="form-control @error('foto') is-invalid @enderror"
                                                    placeholder="Masukan link foto" name="foto">
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
                            @endif

                            @if (request()->is(
                                'account/edit-account/'. $data->slug .'/' .$dataa->id
                            ))
                                <form class="form" action="/account/update-account/{{$data->slug}}/{{$dataa->id}}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-6 col-12 mt-3">
                                            <div class="form-group">
                                                <label for="first-name-column">Username<span class="text-secondary">(optional)</span></label>
                                                <input type="text" value="{{$dataa->username}}" id="first-name-column" class="form-control @error('username') is-invalid @enderror"
                                                placeholder="Masukan Username" name="username">
                                                    @error('username')
                                                        <span class="invalid-feedback d-block">{{$message}}</span>
                                                        @enderror 
                                            </div>
                                        </div>
                                    <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="first-name-column">Email<span class="text-danger">*</span></label>
                                                <input type="email" value="{{$dataa->email}}" id="first-name-column" class="form-control @error('email') is-invalid @enderror"
                                                    placeholder="Masukan Email" name="email">
                                                    @error('email')
                                                        <span class="invalid-feedback d-block">{{$message}}</span>
                                                    @enderror 
                                            </div>
                                        </div>
                                            <div class="col-md-6 col-12">
                                                <div class="form-group">
                                                <label for="first-name-column">Password<span class="text-danger">*</span></label>
                                                <input type="password" value="{{$dataa->password}}" id="first-name-column" class="form-control @error('password') is-invalid @enderror"
                                                    placeholder="Masukan Title Banner" name="password">
                                                    @error('password')
                                                        <span class="invalid-feedback d-block">{{$message}}</span>
                                                    @enderror 
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12 mt-3">
                                            <div class="form-group">
                                                <label for="first-name-column">Nomor Telepon<span class="text-secondary">(optional)</span></label>
                                                <input type="number" value="{{$dataa->nomor}}" id="first-name-column" class="form-control @error('nomor') is-invalid @enderror"
                                                placeholder="Masukan Nomor Telpon" name="nomor">
                                                    @error('nomor')
                                                        <span class="invalid-feedback d-block">{{$message}}</span>
                                                        @enderror 
                                            </div>
                                        </div>
                                        
                                        @if (auth()->user()->role_user->role == 'Moderator')
                                        <div class="col-md-6 col-12">
                                            <label for="formCategory" class="form-label">User</label>
                                            <div class="form-group @error('user_id') is-invalid @enderror">
                                                <select name="user_id" id="formCategory" class="choices form-select ">
                                                    <option value="{{$dataa->user_id}}" selected>{{$dataa->user->name}}</option>
                                                    @foreach ($dataa_user as $row)
                                                    <option value="{{$row->id}}">{{$row->name}}</option>
                                                    @endforeach
                                                </select>
                                                @error('user_id')
                                                        <span class="invalid-feedback d-block">{{$message}}</span>
                                                    @enderror 
                                                </div>
                                            </div>
                                            @endif
                                            
                                            
                                        <div class="col-12 d-flex justify-content-end">
                                            <button type="submit" class="btn btn-primary me-1 mb-1">Submit</button>
                                            <button type="reset" class="btn btn-light-secondary me-1 mb-1">Reset</button>
                                        </div>
                                    </div>
                                </form>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- // Basic multiple Column Form section end -->
@endsection
