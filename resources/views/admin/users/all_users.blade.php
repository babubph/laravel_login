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
      <div class="card-header">
        <h3 class="card-title">All Users</h3>

        <div class="card-tools">

          <a href="{{ route('new-users') }}" class="btn btn-success btn-sm">Add New</a>
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
              <th>Status</th>
              <th class="text-right">Action</th>
            </tr>
          </thead>
          <tbody>

            @foreach ($user as $users)
            <tr>
              <td>{{$loop->iteration}}</td>
              <td>{{ $users->name }}</td>
              <td>{{ $users->email }}</td>
              <td>{{ $users->contact }}</td>
              <!-- <td>{{ $users->status == 1 ? 'Active' : 'Inactive' }}</td> -->
              <td>
                @if ($users->status == 1)
                    <a class="btn btn-success btn-sm">Active</button>
                @else
                    <a class="btn btn-danger btn-sm">Inactive</button>
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
