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
         <div class="col-md-4"  style="margin-top:20px;">

           <!-- Profile Image -->
           <div class="card card-info card-outline">
             <div class="card-body box-profile">
               <div class="text-center">
                 <img class="profile-user-img img-fluid img-circle"
                      src="{{ asset('images/avatar/male.jpg')}}"
                      alt="User profile picture">
               </div>

               <h3 class="profile-username text-center">{{ optional(auth()->user())->name }}</h3>
               <p class="text-muted text-center">{{ optional(auth()->user())->email }}</p>
               <p class="text-muted text-center">{{ optional(auth()->user())->contact }}</p>
               <div class="text-center">
                 <a href="#" class="btn btn-info"><b>Edit</b></a>
                 <a href="#" class="btn btn-info"><b>Follow</b></a>
             </div>
             </div>
             <!-- /.card-body -->
           </div>
           <!-- /.card -->

        </div>
      </div>
    </div>
</section>
@endsection


@section('footer')
  @parent
@endsection
