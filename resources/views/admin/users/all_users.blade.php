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
    @if(session()->has('massage'))
      <div class="alert alert-{{ session('msg_type') }}">{{ session('massage') }}</div>
    @endif
    <div class="card">
      <div class="card-header"  style="background-color:#343A40; color:#FFF;">
        <div><h3 class="card-title"><i class="fa fa-user"></i>&nbsp; ALL USERS</h3></div>
        <div class="card-tools">
          <a href="{{ route('new-users') }}" class="btn btn-success btn-sm"><i class="fa fa-plus-square"></i>&nbsp; Add New</a>
        </div>
      </div>
      <!-- /.card-header -->
      <div class="card-body table-responsive p-0">
        <table class="table table-hover text-nowrap">
          <thead>
            <tr>
              <th>SL</th>
              <th>User Name</th>
              <th>Email</th>
              <th>Contact</th>
              <th>User Type</th>
              <th>Status</th>
              <th class="text-right">Action</th>
            </tr>
          </thead>
          <tbody>

            @foreach ($user as $users)
            <tr>
              <td>{{$loop->iteration}}</td>
              <td>
                <div style="color:#138496;">
                  <b>{{ $users->name }}</b>
                  @if ($users->id == auth()->user()->id)
                     &nbsp;&nbsp;<i class="fa fa-user"></i>
                  @else
                      <i class=""></i>
                  @endif
                </div>
              </td>
              <td>{{ $users->email }}</td>
              <td>{{ $users->contact }}</td>
              <td>{{ $users->user_type }}</td>
              <!-- <td>{{ $users->status == 1 ? 'Active' : 'Inactive' }}</td> -->
              <td>
                @if ($users->status == 1)
                  <form action="{{ route('user-inactive', $users->id) }}" method="post">
                      @csrf
                      @method('PUT')
                      <button type="submit" class="btn btn-success btn-sm"><i class="fa fa-check"></i>&nbsp; Active</button>
                  </form>
                @else
                      <form action="{{ route('user-active', $users->id) }}" method="post">
                          @csrf
                          @method('PUT')
                          <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-times"></i>&nbsp; Inactive</button>
                      </form>
                @endif
              </td>
              <td class="text-right">

                <div class="row">
                  <div class="col-9 text-right">
                    <a href="{{ route('edit-user', $users->id) }}" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>
                  </div>
                  <div class="col-3">
                    <form action="{{ route('delete-user', $users->id) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm" onClick="return confirmation()"><i class="fa fa-times"></i></button>
                   </form>
                  </div>
                </div>
              </td>
            </tr>
            @endforeach
            <tr>
              <td colspan="7"><div>Total user: <b> {{ $user->count() }}</b> user</div></th>
            </tr>
          </tbody>
        </table>
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->
  </div>
</div>
</div>
</section>
<script type="text/javascript">
      function confirmation() {
       return confirm('Are you sure you want to Delete this?');
        }
 </script>
@endsection


@section('footer')
  @parent
@endsection
