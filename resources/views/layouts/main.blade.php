<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Admisi @yield('title')</title>

  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Tangerine">
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap4.min.css">   
  <link rel="stylesheet" href="{{asset('template/plugins/fontawesome-free/css/all.min.css')}}">
  <link rel="stylesheet" href="{{asset('template/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
  <link rel="stylesheet" href="{{asset('template/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
  <link rel="stylesheet" href="{{asset('template/plugins/jqvmap/jqvmap.min.css')}}">
  <link rel="stylesheet" href="{{asset('template/dist/css/adminlte.min.css')}}">
  <link rel="stylesheet" href="{{asset('template/plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
  <link rel="stylesheet" href="{{asset('template/plugins/daterangepicker/daterangepicker.css')}}">
  <link rel="stylesheet" href="{{asset('template/plugins/summernote/summernote-bs4.min.css')}}">
  
</head>

<body>
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="index3.html" class="brand-link">
      <img src="{{asset('template/dist/img/admisi.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Admisi v1.0</span>
    </a>
  
    <div class="sidebar">
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="image">
          <img src="{{asset('template/dist/img/user-e.png')}}" class="img-circle elevation-2" alt="User Image">
          </div>
          <div class="info">
          <a href="#" class="d-block">{{Auth::user()->name}}</a>
          <div>
              <small class="designation text-muted" style="text-transform: uppercase;letter-spacing: 1px;">{{ Auth::user()->level }}</small>
              <span class="status-indicator online"></span>
          </div>
          </div>
      </div>

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

      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item">
            <a href="{{route('home')}}" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>Dashboard</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('data-user.index')}}" class="nav-link">
              <i class="nav-icon fas fa-user"></i>
              <p>Users</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('data-people.index')}}" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>Peoples</p>
            </a>            
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-chart-pie"></i>
              <p>Charts</p>
            </a>
          </li>
          
          <li class="nav-header">MASTER</li>
          <li class="nav-item">
            <a href="pages/calendar.html" class="nav-link">
              <i class="nav-icon far fa-calendar-alt"></i>
              <p>Calendar<span class="badge badge-info right">2</span></p>
            </a>
          </li>
          <li class="nav-item">
            <a href="pages/gallery.html" class="nav-link">
              <i class="nav-icon far fa-image"></i>
              <p>Gallery</p>
            </a>
          </li>
          
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-book"></i>
              <p>Pages<i class="fas fa-angle-left right"></i></p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="pages/examples/invoice.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Invoice</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/examples/profile.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Profile</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="{{ route('logout') }}" class="nav-link">
              <i class="nav-icon fas fa-power-off"></i>
              <p>
                Logout
              </p>
            </a>
          </li>  
        </ul>
      </nav>
    </div>
  </aside>  
  

  <nav class="main-header navbar navbar-expand navbar-black navbar-dark">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="{{route('home')}}" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="{{route('contact')}}" class="nav-link">Contact</a>
      </li>
    </ul>

    <ul class="navbar-nav ml-auto">
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
            <span class="badge badge-info right"></span>
            <p>Hallo, {{Auth::user()->name}}
              <i class="fas fa-angle-left"></i>
            </p>
            
        </a>
        <div class="dropdown-menu dropdown-menu-right">
          <a href="#" class="dropdown-item">
            <div class="media">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  <i class="nav-icon fas fa-user"></i>
                  Profile
                </h3>
              </div>
            </div>
          </a>
          <a href="#" class="dropdown-item">
            <div class="media">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  <i class="nav-icon fas fa-cog"></i>
                  Setting
                </h3>
              </div>
            </div>
          </a>
          <a href="{{ route('logout') }}" class="dropdown-item">
            <div class="media">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  <i class="nav-icon fas fa-power-off"></i>
                  Logout
                </h3>
              </div>
            </div>
          </a>
      </li>      
    </ul>
  </nav>
  

  @yield('breadcrumbs')
  @yield('content')
  @include('sweetalert::alert')


  <script src="{{asset('template/plugins/jquery/jquery.min.js')}}"></script>
  <script src="{{asset('template/plugins/jquery-ui/jquery-ui.min.js')}}"></script>
  <script>$.widget.bridge('uibutton', $.ui.button)</script>
  <script src="{{asset('template/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{asset('template/plugins/chart.js/Chart.min.js')}}"></script>
  <script src="{{asset('template/plugins/sparklines/sparkline.js')}}"></script>
  <script src="{{asset('template/plugins/jqvmap/jquery.vmap.min.js')}}"></script>
  <script src="{{asset('template/plugins/jqvmap/maps/jquery.vmap.usa.js')}}"></script>
  <script src="{{asset('template/plugins/jquery-knob/jquery.knob.min.js')}}"></script>
  <script src="{{asset('template/plugins/moment/moment.min.js')}}"></script>
  <script src="{{asset('template/plugins/daterangepicker/daterangepicker.js')}}"></script>
  <script src="{{asset('template/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')}}"></script>
  <script src="{{asset('template/plugins/summernote/summernote-bs4.min.js')}}"></script>
  <script src="{{asset('template/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
  <script src="{{asset('template/dist/js/adminlte.js')}}"></script>
  <script src="{{asset('template/dist/js/demo.js')}}"></script>
  <script src="{{asset('template/plugins/datatables/jquery.dataTables.js')}}"></script>
  <script src="{{asset('template/plugins/datatables/jquery.dataTables.min.js')}}"></script>
  <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
  <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap4.min.js"></script>
  <script>
      $(document).ready(function() {
      var table = $('#table').DataTable({                
              lengthMenu:[
                  [10,50,100,-1],
                  [10,50,100,'All']
              ]
      });
      } );
  </script>

</body>
</html>