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
              <div class="card-header">
                <h3 class="card-title">Change Password</h3>
                <div class="card-tools">
                  <a href="{{ route('all-users') }}" class="btn btn-success btn-sm"><i class="fa fa-arrow-left"></i> Bank</a>
                </div>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form class="form-horizontal" action="{{ route('update-password', $user->id) }}" method="post">
                @csrf
                @method('PUT')
                <div class="card-body">

                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-5">
                    {{ $user->email }}
                    </div>
                  </div>

                  <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-2 col-form-label">Password</label>
                    <div class="col-sm-4">
                      <input type="password" class="form-control" name="password" autocomplete="off">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-2 col-form-label">Confirm Password</label>
                    <div class="col-sm-4">
                      <input type="password" class="form-control" name="confirm_password" autocomplete="off">
                    </div>
                  </div>


                </div>
                <!-- /.card-body -->
                <div class="card-footer">

                  <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-2 col-form-label"></label>
                    <div class="col-sm-5">
                      <button type="submit" class="btn btn-warning float-left">Update</button>
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

@endsection


@section('footer')
  @parent
@endsection
