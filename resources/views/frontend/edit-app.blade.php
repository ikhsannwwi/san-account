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
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- // Basic multiple Column Form section end -->
@endsection
