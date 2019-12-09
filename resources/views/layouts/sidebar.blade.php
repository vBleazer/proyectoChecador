<!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4" style="background-color: #5d6b78;">
    <!-- Brand Logo -->
    <a href="/home" class="brand-link">
      <img src="{{asset('app_assets/dist/img/logo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light" style="color:#fff">UBCS - DASC</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{asset('app_assets/dist/img/usuario.png')}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="/home" class="d-block" style="color:#fff">{{ Auth::user()->nombre }}</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          @if(Auth::user()->role == 2 )
            <li class="nav-item ">
              <a href="/home" class="nav-link {{ (request()->is('home*')) ? 'active' : '' }}" style="background-color:#e2e2e2">
                <i class="nav-icon fas fa-tachometer-alt" style="color:#000000"></i>
                <p style="color:#000000">
                  Dashboard
                </p>
              </a>
            </li>
          @endif

          @if(Auth::user()->role == 1 )
            <li class="nav-item">
              <a href="/proyectos" class="nav-link {{ (request()->is('proyectos*')) ? 'active' : '' }}">
                <i class="nav-icon fas fa-project-diagram" style="color:#000000"></i>
                <p style="color:#fff">
                  Proyectos
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="/usuarios" class="nav-link {{ (request()->is('usuarios*')) ? 'active' : '' }}">
                <i class="nav-icon fas fa-users" style="color:#000000"></i>
                <p style="color:#fff">
                  Usuarios
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="/configuracion" class="nav-link {{ (request()->is('configuracion*')) ? 'active' : '' }}">
                <i class="nav-icon fas fa-edit" style="color:#000000"></i>
                <p style="color:#fff">
                  Configuración
                </p>
              </a>
            </li>
          @endif
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
    <a class="dropdown-item" href="{{ route('logout') }}"
       onclick="event.preventDefault();
                     document.getElementById('logout-form').submit();">
        {{ __('Logout') }}
    </a>

    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
    </form>
  </aside>