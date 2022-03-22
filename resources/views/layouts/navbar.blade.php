<ul class="navbar-nav navbar-right">
  <a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
    <img alt="image" src="../assets/img/avatar/avatar-1.png" class="rounded-circle mr-1">
    <div class="d-sm-none d-lg-inline-block">Hi, Admin</div></a>
    {{-- Memanggil nama {{ auth()->user()->name }} --}}
    <div class="dropdown-menu dropdown-menu-right">
      
      <a href="/profile" class="dropdown-item has-icon">
        <i class="far fa-user"></i> Profile
      </a>
      <a href="features-profile.html" class="dropdown-item has-icon">
        <i class="fas fa-briefcase"></i> Dashboard
      </a>
      <a href="/login" class="dropdown-item has-icon">
        <i class="fas fa-bolt"></i> Front End
      </a>
      <a href="features-settings.html" class="dropdown-item has-icon">
        <i class="fas fa-cog"></i> Settings
      </a>
      <div class="dropdown-divider"></div>
      <form action="/logout" method="POST">
        @csrf
        <button class=" dropdown-item has-icon text-danger"> <i class="fas fa-sign-out-alt"></i> Logout</button>
        {{-- <a href="#" class="dropdown-item has-icon text-danger">
          <i class="fas fa-sign-out-alt"></i> Logout
        </a> --}}
      </form>
    </div>
  </li>

</ul>