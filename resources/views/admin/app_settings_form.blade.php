@extends('admin.master_layout')

@section('title', 'Blog Login')

@section('header')
  @parent
@endsection

@section('side_navbar')
  @parent
@endsection

@section('contant')
<!-- Main content -->
<section class="content">
<div class="container-fluid">
  <div class="row">
    <div class="col-12" style="margin-top:20px;">
      @if ($errors->any())
          <div class="alert alert-danger">
              <ul>
                  @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                  @endforeach
              </ul>
          </div>
      @endif

      @if(session()->has('massage'))
        <div class="alert alert-{{ session('msg_type') }}">{{ session('massage') }}</div>
      @endif
           <div class="card">
              <div class="card-header"  style="background-color:#343A40; color:#FFF;">
                <h3 class="card-title"><i class="fa fa-cog"></i> App Settings</h3>
                <div class="card-tools">
                  <a href="{{ route('dashboard') }}" class="btn btn-success btn-sm"><i class="fa fa-arrow-left"></i> Bank</a>
                </div>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form class="form-horizontal" action="{{ route('update-app-settings') }}" method="post"  enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="card-body">
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">App Name</label>
                    <div class="col-sm-5">
                      <input type="text" name="name" class="form-control" value="{{ $app->app_title }}" id="inputEmail3">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-5">
                      <input type="email" name="email" class="form-control" value="{{ $app->email }}" id="inputEmail3">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Contact</label>
                    <div class="col-sm-5">
                      <input type="text" name="contact" class="form-control" value="{{ $app->contact }}" id="inputEmail3">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Address</label>
                    <div class="col-sm-5">
                      <textarea name="address" class="form-control" row="4">{{ $app->address }}</textarea>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Meta Description</label>
                    <div class="col-sm-5">
                      <textarea name="meta_dis" class="form-control" row="4">{{ $app->meta_dis }}</textarea>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Keyword</label>
                    <div class="col-sm-5">
                      <textarea name="meta_keyword" class="form-control" row="4">{{ $app->meta_keyword }}</textarea>
                    </div>
                  </div>

                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Logo</label>
                    <div class="col-sm-5">
                      <div style="margin-top:15px; ">
                         <img src="{{ asset('images/app_logo.png') }}" width="180" id="output">
                      </div>
                    </div>
                  </div>

                  <div class="form-group row" style="padding-top:15px;">
                    <label for="inputEmail3" class="col-sm-2 col-form-label"></label>
                    <div class="col-sm-5">
                      <input type = "file" name = "logo_image"  accept="image/*" onchange="loadFile(event)"/>
                    </div>
                  </div>

                </div>
                <!-- /.card-body -->
                <div class="card-footer">

                  <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-2 col-form-label"></label>
                    <div class="col-sm-5">
                      <button type="submit" class="btn btn-info float-left">Submit</button>
                    </div>
                  </div>
                </div>
                <!-- /.card-footer -->
              </form>
            </div>
        </div>
      </div>
      </div>
</section>

<script>
  var loadFile = function(event) {
    var reader = new FileReader();
    reader.onload = function(){
      var output = document.getElementById('output');
      output.src = reader.result;
    };
    reader.readAsDataURL(event.target.files[0]);
  };
</script>

@endsection


@section('footer')
  @parent
@endsection
