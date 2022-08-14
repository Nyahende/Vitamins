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

  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__wobble" src="{{asset('dist/img/vitaminlogo.png')}}" alt="VitaminLogo" height="60" width="60">
  </div>
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
  @include('vitamin.sidebar')


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
                  <div class="form-group">
                    <label for="exampleInputPassword1">Status</label>
                    <textarea type="text" class="form-control" row=3 col=3  placeholder="Status" name="status"></textarea>
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
