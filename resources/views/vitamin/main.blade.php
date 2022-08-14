<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="csrf-token" content="{{csrf_token()}}">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Vitamins | Homepage</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="{{asset('plugins/fontawesome-free/css/all.min.css')}}">
  <link rel="stylesheet" href="{{asset('css/vitamin.css')}}">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{asset('plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('dist/css/adminlte.min.css')}}">

  <!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
  <script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>
  <script src="{{asset('js/activity.js')}}"></script>
  <script src="{{asset('/js/formslide.js')}}"></script>
  <!-- Bootstrap -->
  <script src="{{asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <!-- overlayScrollbars -->
  <script src="{{asset('plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
  <!-- AdminLTE App -->
  <script src="{{asset('dist/js/adminlte.js')}}"></script>

  <!-- PAGE PLUGINS -->
  <!-- jQuery Mapael -->
  <script src="{{asset('plugins/jquery-mousewheel/jquery.mousewheel.js')}}"></script>
  <script src="{{asset('plugins/raphael/raphael.min.js')}}"></script>
  <script src="{{asset('plugins/jquery-mapael/jquery.mapael.min.js')}}"></script>
  <script src="{{asset('plugins/jquery-mapael/maps/usa_states.min.js')}}"></script>
  <!-- ChartJS -->

  <!-- AdminLTE for demo purposes -->
  <script src="{{asset('dist/js/demo.js')}}"></script>
  <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
  <script src="{{asset('dist/js/pages/dashboard2.js')}}"></script>
</head>
<body class="hold-transition dark-mode sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
<div class="wrapper">

  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__wobble" src="{{asset('dist/img/vitaminlogo.png')}}" alt="VitaminLogo" height="60" width="60">
  </div>

  <!-- Navbar -->
  @include('live.newmessage')
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  @include('vitamin.sidebar')


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Vitamins</h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Info boxes -->
        <div class="row">
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box">
              <span class="info-box-icon bg-info elevation-1"><i class="fas fa-address-card"></i></span>

              <div class="info-box-content">
                <a href="{{route('profile')}}">
                <span class="info-box-text">Profile</span>
                
                </a>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-microphone"></i></span>

              <a href="{{route('podcasts')}}">
              <div class="info-box-content">
                <span class="info-box-text">PodCasts</span>
                <span class="info-box-number">{{$podcastCount}}</span>
              </div>
              </a>

              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->

          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-book"></i></span>

              <a href="{{route('book')}}">
              <div class="info-box-content">
                <span class="info-box-text">Books</span>
                <span class="info-box-number">{{$bookCount}}</span>
              </div>
              </a>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-users"></i></span>

              <a href="{{route('members')}}">
              <div class="info-box-content">
                <span class="info-box-text">Users</span>
                <span class="info-box-number">{{$usersCount}}</span>
              </div>
              </a>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->

        <!-- /.row -->

        <!-- Main row -->
        <div class="row">
          <!-- Left col -->
          <div class="col-md-8">
           
            <!-- /.card -->
           

            <!-- TABLE: LATEST ORDERS -->
            <div class="card">
              <div class="card-header border-transparent">
                <h3 class="card-title">Recently Added Movies</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <div class="table-responsive">
                  <table class="table m-0">
                    <thead>
                    <tr>
                      <th>Movie Name</th>
                      <th>Staring</th>
                      <th>Director</th>
                      <th>Released Date</th>
                    </tr>
                    </thead>
                    <tbody>
                      @foreach($movies as $movies)
                    <tr>
                      <td><a href="{{route('movies')}}">{{$movies->name}}</a></td>
                      <td>{{$movies->staring}}</td>
                      <td>{{$movies->director}}</td>
                      <td>
                      {{$movies->released_year}}
                      </td>
                    </tr>
                    
                    @endforeach
                    </tbody>
                  </table>
                </div>
                <!-- /.table-responsive -->
              </div>
              <!-- /.card-body -->
              <div class="card-footer text-center">
                <a href="{{route('movies')}}" class="uppercase">View All Movies</a>
              </div>
              <!-- /.card-footer -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->

          <div class="col-md-4">

            <!-- PRODUCT LIST -->
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Recently Added Songs</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <ul class="products-list product-list-in-card pl-2 pr-2">

                @foreach($songs as $item)
                  <li class="item">
                    <div class="product-img">
                      <img src="{{asset('dist/img/user.jpg')}}" alt="Product Image" class="img-size-50">
                    </div>
                    <div class="product-info">
                      <a href="" class="product-title">{{$item->artist_name}}
                      <span class="product-description">
                      {{$item->song_name}}
                      </span>
                    </div>
                  </li>
                  @endforeach
                  <!-- /.item -->
                  
                  <!-- /.item -->
                </ul>
              </div>
              <!-- /.card-body -->
              <div class="card-footer text-center">
                <a href="{{route('songs')}}" class="uppercase">View All Songs</a>
              </div>
              <!-- /.card-footer -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>

        
      <div class="card card-success" style="display:none;" id="activity-form">
                    
      <form action="{{route('addActivity')}}" method="post" id="activity-form">
            @csrf
        <div class="card-body">
            <div class="row">
            <div class="col-5">
                <input type="text" id="activity" class="form-control" placeholder="Activity" style="margin:5px" name="activity" required autofocus>
            </div>
            <div class="col-5">
                <input type="text" id="duration" class="form-control" placeholder="Duration..Optional" style="margin:5px" name="duration">
            </div>
            <div class="col-5">
                <input type="hidden" id="authusername" class="form-control" style="margin:5px" value="{{Auth::user()->name}}" name="authusername">
            </div>
            
          <button type="submit" class="btn  btn-primary btn-sm" id="upload-activity-btn" style="margin:10;">Upload </button>
      
        </div>
        </div>
        
      </form>

      </div>
     
      <div class="card-footer clearfix">
        <button type="button" class="btn btn-primary float-right" id="add-activity"><i class="fas fa-plus"></i> Add Activity</button>
      </div>
        <div class="card">
              <div class="card-header">
                <h3 class="card-title">
                  To Do List
                </h3>

              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <ul class="todo-list">
                  
                @foreach($activity as $activity)

                <li>
                  @if($activity->checked == "checked")
                  <div style="float:right">
                      <a href="{{route('deleteSingleActivity',[$activity->id])}}" >
                      <i class="fas fa-times"></i>
                      </a>
                    </div>
                  <input type="checkbox" name="" id="" checked>
                  <span class="text" id="checked-message">{{$activity->Body}}</span><br>
                  <small class="badge badge-primary" id="checked-time"><i class="far fa-clock"></i>
                  {{$activity->duration}}</small>
                 
                  @else
                  <div style="float:right">
                  <a href="{{route('deleteSingleActivity',[$activity->id])}}">
                  <i class="fas fa-times"></i>
                  </a>
                  </div>
                  <input type="checkbox" name="" id="">
                  <input type="hidden" name="itemid" id="itemid" >
                  <span class="text" id="message">{{$activity->Body}}</span><br>
                  <small class="badge badge-primary" id="unchecked-time"><i class="far fa-clock"></i>
                  {{$activity->duration}}</small>
                  <form action="{{route('checked',[$activity->id])}}" method="post">
                      @csrf
                    <input type="hidden" name="checked" value="checked" >
                    <Button type="submit">Check</Button>
                    
                  </form>
                  @endif
                </li>
                <hr>

                @endforeach
                <button><a href="{{route('deleteAllActivities',[$Authid])}}"> Delete All</a></button>

                </ul>
              </div>
              <!-- /.card-body -->
              
            </div>
        <!-- /.row -->
      </div><!--/. container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <strong>Developed and Maintained by:  <a href="">michaelnyahende8@gmail.com</a>.</strong>
    
    <div class="float-right d-none d-sm-inline-block">
    This site has been active since <b>July 2022 </b>
    </div>
  </footer>
</div>
<!-- ./wrapper -->

<script>
  document.getElementById('disabled').disabled = true;
  document.getElementById('checked').disabled = true;
</script>


</body>
</html>
