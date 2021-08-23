<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
  <!-- Left navbar links -->
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
    </li>
    <li class="nav-item d-none d-sm-inline-block">
      <a href="{{ url('dashboard') }}" class="nav-link">Home</a>
    </li>
    <li class="nav-item d-none d-sm-inline-block">
      <a href="#" class="nav-link"><i class="fas fa-shopping-cart"></i>&nbsp;Sale</a>
    </li>
    <li class="nav-item d-none d-sm-inline-block">
      <a href="#" class="nav-link" target="popup"
      onclick="window.open('/laravel_login/calculator/cal.html','popup','width=305,height=450,toolbar=0,scrollbars=no,resizable=no,top=100'); return false;">
      <i class="fas fa-calculator"></i>&nbsp;Calculator</a>
    </li>
  </ul>

  <!-- Right navbar links -->
  <ul class="navbar-nav ml-auto">
    <!-- Navbar Search -->

    <!-- Notifications Dropdown Menu -->
    <li class="nav-item dropdown">
      <a class="nav-link" data-toggle="dropdown" href="#">
        <i class="far fa-bell"></i>
        <span class="badge badge-danger navbar-badge">15</span>
      </a>
      <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
        <span class="dropdown-item dropdown-header">15 Notifications</span>
        <div class="dropdown-divider"></div>
        <a href="#" class="dropdown-item">
          <i class="fas fa-envelope mr-2"></i> 4 new messages
          <span class="float-right text-muted text-sm">3 mins</span>
        </a>
        <div class="dropdown-divider"></div>
        <a href="#" class="dropdown-item">
          <i class="fas fa-users mr-2"></i> 8 friend requests
          <span class="float-right text-muted text-sm">12 hours</span>
        </a>
        <div class="dropdown-divider"></div>
        <a href="#" class="dropdown-item">
          <i class="fas fa-file mr-2"></i> 3 new reports
          <span class="float-right text-muted text-sm">2 days</span>
        </a>
        <div class="dropdown-divider"></div>
        <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
      </div>
    </li>
    @auth()
    <li class="nav-item dropdown">
      <a class="nav-link" data-toggle="dropdown" href="#">
        <img src="{{ asset('images/avatar/male.jpg') }}" class="img-circle elevation-1" height="30" alt="User Image">
      </a>
      <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right" style="text-align:right;">
        <div style="padding:15px; text-align:center; background-color:#17A2B8; color:#FFFFFF;">
          <div><b>{{ optional(auth()->user())->name }}</b></div>
          <div>{{ optional(auth())->user()->email }}</div>
        </div>
        <div class="dropdown-divider"></div>
        <a href="{{ url('user-profile') }}" class="dropdown-item">
          User Profile
        </a>
        <div style="display:  @if(auth()->user()->user_type == 'User') none @endif ">
        <div class="dropdown-divider"></div>
        <a href="{{ url('all-users') }}" class="dropdown-item">
          All Users
        </a>
        <div class="dropdown-divider"></div>
        <a href="{{ route('users_log') }}" class="dropdown-item">
           Users Log
        </a>
        <div class="dropdown-divider"></div>
        <a href="{{ route('app-settings') }}" class="dropdown-item">
          App Settings
        </a>
       </div>
        <div class="dropdown-divider"></div>
        <a href="{{ route('logout') }}" class="dropdown-item">
          Logout
        </a>
      </div>
    </li>
    @endauth

  </ul>
</nav>
<!-- /.navbar -->
