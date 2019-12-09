<!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light" style="background-color: #2B4B68;">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
      </li>
      
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">

      <li class="nav-item dropdown user-menu">
        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
          <img src="{{asset('app_assets/dist/img/usuario.png')}}" class="user-image img-circle elevation-2" alt="User Image">
          <span class="d-none d-md-inline" style="color:#fff">{{Auth::user()->nombre}}</span>
        </a>
        <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <!-- User image -->
          <li class="user-header" style="background-color: #3e4e5f">
            <img src="{{asset('app_assets/dist/img/usuario.png')}}" class="img-circle elevation-2" alt="User Image">

            <p style="color:#fff;g">
              {{Auth::user()->nombre}} {{Auth::user()->apellidos}}
            </p>
          </li>
          
          <!-- Menu Footer-->
          <li class="user-footer">
            <a class="btn btn-default btn-flat float-right" href="{{ route('logout') }}"
               onclick="event.preventDefault();
                             document.getElementById('logout-form').submit();">
                {{ __('SALIR') }}
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
          </li>
        </ul>
      </li>
      
    </ul>
  </nav>
  <!-- /.navbar -->