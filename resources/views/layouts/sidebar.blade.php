<!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{!!route('home')!!}" class="brand-link">
      <img src="{!! asset('img/logo_sime.jpeg') !!}" alt="Logo Spreading" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">SIME</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{!! asset('img/avatar.jpg') !!}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="{{ route('home')}}" class="d-block">{{ Auth::user()->name }}</a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item">
            <a href="{!!route('home')!!}" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>Home <!-- <span class="right badge badge-danger">New</span> --></p>
            </a>
          </li>
          
          @if(Auth::user()->user_type=="Admin")
          
          <li class="nav-item">
            <a href="{!!route('periodos.index')!!}" class="nav-link">
              <i class="nav-icon fas fa-circle"></i>
              <p>Periodos</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{!!route('programas.index')!!}" class="nav-link">
              <i class="nav-icon fas fa-circle"></i>
              <p>Programas de Estudio</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{!!route('profesores.index')!!}" class="nav-link">
              <i class="nav-icon fas fa-circle"></i>
              <p>Profesores</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{!!route('asignaturas.index')!!}" class="nav-link">
              <i class="nav-icon fas fa-circle"></i>
              <p>Asignaturas</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{!!route('pde.listar_pde_admin')!!}" class="nav-link">
              <i class="nav-icon fas fa-circle"></i>
              <p>Planes de Evaluación</p>
            </a>
          </li>
          @else
          <li class="nav-item">
            <a href="{!!route('pde.index')!!}" class="nav-link">
              <i class="nav-icon fas fa-circle"></i>
              <p>Asignaciones</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{!!route('pde.listar')!!}" class="nav-link">
              <i class="nav-icon fas fa-circle"></i>
              <p>Planes de Evaluación</p>
            </a>
          </li>
          @endif
          
          
        </ul>

      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>