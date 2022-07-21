<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Vitamin | Profile</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('/plugins/fontawesome-free/css/all.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('/dist/css/adminlte.min.css')}}">
  <link rel="stylesheet" href="{{asset('/css/vitamin.css')}}">
</head>
<body class="hold-transition sidebar-mini">
@if(Auth::id() == $id)
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="{{route('main')}}" class="nav-link">Home</a>
      </li>
      
      <li class="nav-item d-none d-sm-inline-block">
      <a class="dropdown-item" href="{{ route('logout') }}"
          onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
          {{ __('Logout') }}
      </a>

      <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
          @csrf
      </form>
      </li>
    </ul>

   
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
     <!-- Brand Logo -->
     <a href="index3.html" class="brand-link">
      <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Vitamin</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3">
        <div class="image">
          @if(Auth::user()->profile_picture)
            <img src="{{asset('/assets')}}/{{Auth::user()->profile_picture}}??" class="img-circle elevation-2" alt="User Image" style="width:80px;height:80px;">
          @else
            <img src="{{asset('/dist/img/user.jpg')}}" class="img-circle elevation-2" alt="User Image" style="width:80px;height:80px;">
          @endif
        </div><br>
        <div class="info">
          <a href="#" class="d-block">{{Auth::user()->name}}</a>
        </div>
      </div>


      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item menu-open">
            <a href="{{route('main')}}" class="nav-link active">
              <i class="nav-icon fas fa-home"></i>
              <p>
                Home
              </p>
            </a>
            
          </li>
          <li class="nav-item">
            <a href="{{route('technology')}}" class="nav-link">
              <i class="fas fa-atom"></i>
              <p>
                Technology
              </p>
            </a>
          </li>
          
         
          <li class="nav-item">
            <a href="{{route('history')}}" class="nav-link">
              <i class="fas fa-history"></i>
              <p>
                History
              </p>
            </a>
            
          </li>
          <li class="nav-item">
            <a href="{{route('sports')}}" class="nav-link">
              <i class="fas fa-baseball-ball"></i>
              <p>
                Sports
              </p>
            </a>
           
          </li>
          <li class="nav-item">
            <a href="{{route('food')}}" class="nav-link">
              <i class="fas fa-pizza-slice"></i>
              <p>
                Food
              </p>
            </a>
          </li>
         

        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Change Profile picture</h1>
          </div>
         
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
         
        <div class="add-media-div">
            <form action="{{route('ProfilePictureRoute')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                
                <div class="form-group">
                <input type="hidden" name="id" value="{{$editProfilePicture['id']}}">
                    <div class="input-group">
                    <div class="custom-file">
                     <input type="file" class="form-control" placeholder="Choose File" style="margin:5px" name="file" >
                    </div>
                    <div class="input-group-append">
                        <button type="submit" class="input-group-text" id="upload-media-btn">Upload</button>
                    </div>
                    </div>
                </div>
                </div>
            </form>
        </div>
         
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <strong>Developed and Maintained by:  <a href="">michaelnyahende8@gmail.com</a>.</strong>
    
    <div class="float-right d-none d-sm-inline-block">
    This site has been active since <b>July 2022 </b>
    </div>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="{{asset('/plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('/dist/js/adminlte.min.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{asset('/dist/js/demo.js')}}"></script>
<script src="{{asset('/js/formslide.js')}}"></script>
@else

<div class="sorry" style="text-align:center;font-size:25px;margin-top:200px;">
Sorry, You can not access the page you are requesting
</div>

@endif
</body>
</html>
