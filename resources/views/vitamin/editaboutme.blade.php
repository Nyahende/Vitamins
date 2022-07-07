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
</head>
<body class="hold-transition sidebar-mini">

@if(Auth::id() == $userId)
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
          <img src="{{asset('/assets')}}/{{Auth::user()->profile_picture}}" class="img-circle elevation-2" alt="User Image" style="width:80px;height:80px;">
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
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
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

    <div class="col-md-6">
            <!-- general form elements -->
            <div class="card card-primary">
             
              <!-- /.card-header -->
              <!-- form start -->
              <form action="{{route('UpdateUser')}}" method="post">

                 @csrf

                <div class="card-body">
                  <div class="form-group">
                  <input type="hidden" name="id" value="{{$aboutUserId['id']}}">
                    <label for="exampleInputEmail1">Username</label>
                    <input type="text" class="form-control"  placeholder="Username" name="aboutUsername" value="{{$aboutUserId['name']}}">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Location</label>
                    <input type="text" class="form-control"  placeholder="Location" name="aboutLocation" value="{{$aboutUserId['location']}}">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Skills</label>
                    <input type="text" class="form-control"  placeholder="Skills" name="aboutSkills" value="{{$aboutUserId['skills']}}">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Hobbies</label>
                    <input type="text" class="form-control"  placeholder="Hobbies" name="aboutHobbies" value="{{$aboutUserId['hobbies']}}">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Occupation</label>
                    <input type="text" class="form-control"  placeholder="Occupation" name="aboutOccupation" value="{{$aboutUserId['occupation']}}">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Eduaction</label>
                    <input type="text" class="form-control"  placeholder="Education" name="aboutEducation" value="{{$aboutUserId['education']}}">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Notes</label>
                    <textarea type="text" class="form-control" row=3 col=3  placeholder="Notes" name="aboutNotes"></textarea>
                  </div>

                  
                 
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Save</button>
                </div>
              </form>
            </div>
    </section>
    </div><!-- /.container-fluid -->

  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      <b>Version</b> 3.2.0
    </div>
    <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
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
