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
              <div class="card-header" style="background-color:#B8C7E7; color:#000;">
                <h3 class="card-title">Create New Supplier</h3>
                <div class="card-tools">
                  <a href="{{ route('all-supplier') }}" class="btn btn-success btn-sm"><i class="fa fa-arrow-left"></i> All Suppliers</a>
                </div>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form class="form-horizontal" action="{{ url('insert-supplier') }}" method="post">
                @csrf
                <div class="card-body">
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Company Name</label>
                    <div class="col-sm-5">
                      <input type="text" name="company_name" class="form-control" value="{{ old('company_name') }}" required>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Company Type</label>
                    <div class="col-sm-5">
                      <input type="text" name="company_type" class="form-control" value="{{ old('company_type') }}" required>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Responsible Person</label>
                    <div class="col-sm-5">
                      <input type="text" name="name" class="form-control" value="{{ old('name') }}" required>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-5">
                      <input type="email" name="email" class="form-control" value="{{ old('email') }}" >
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Contact No</label>
                    <div class="col-sm-5">
                      <input type="text" name="contact" class="form-control" value="{{ old('contact') }}" required>
                    </div>
                  </div>

                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Address</label>
                    <div class="col-sm-5">
                      <textarea name="address" rows="3" class="form-control" required>{{ old('address') }}</textarea>
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

@endsection


@section('footer')
  @parent
@endsection
