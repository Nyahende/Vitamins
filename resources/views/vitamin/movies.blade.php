<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Vitamins | Movies</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('/plugins/fontawesome-free/css/all.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('/dist/css/adminlte.min.css')}}">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

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
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
     <!-- Brand Logo -->
     <a href="" class="brand-link">
      <img src="{{asset('dist/img/vitaminlogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
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
    

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
        <div class="col-md-12">
            <div class="card">
              <div class="card-header p-2" >
                <ul class="nav nav-pills">
                  <li class="nav-item"><a class="nav-link active" href="#traillers" data-toggle="tab">Traillers</a></li>
                  <li class="nav-item"><a class="nav-link" href="#movies" data-toggle="tab">Movies</a></li>
                  <li class="nav-item"><a class="nav-link" href="#events" data-toggle="tab">Events</a></li>
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">

                  <div class="active tab-pane" id="traillers">

                  <div class="card-tools">
                    <div class="input-group input-group-sm">
                      <input type="text" class="form-control" name="trailersearch" id="trailersearch" placeholder="Search a Trailler">
                      <table>
                          <tbody id="Content" class="searchdata" style="background-color:black;color:white;"></tbody>
                      </table>
                    </div>
                  </div>
                        @foreach($traillers as $traillers)

                        <div class="post">

                              <div class="user-block" style="margin-left:-50px;">
                                  <span class="username">
                                    <a href="">{{$traillers->name}}</a>
                                  </span>
                                  <span class="description"><b> Director</b>: {{$traillers->director}}</span>
                                  <span class="description"><b>Staring</b>: {{$traillers->staring}}</span>
                              </div>
                                <!-- /.user-block -->
                                <div class="video-div" style="width:100%;height:auto;"> 
                                <video controls class="video-controls" style="width:100%;height:auto;">
                                <source src="{{asset('/assets')}}/{{$traillers->file}}" type="video/mp4" style="width:100%;height:auto;">
                                Your audio format is not supported</video>

                                </div>
                                <p>
                                    <a href="{{$Wshare}}"><img src="{{asset('/dist/img/whatsapp.jpeg')}}" alt="" style="50px;height:50px;"></a>
                                    <a href="{{$Tshare}}"><img src="{{asset('/dist/img/telegram.jpeg')}}"" alt="" style="50px;height:50px;"></a>
                                    <a href="{{$Fshare}}"><img src="{{asset('/dist/img/fabicon.png')}}"" alt="" style="35px;height:35px;"></a>
                                </p>
                        </div>

                        @endforeach

                    </div>
                  <!-- /.tab-pane -->
                  <div class="tab-pane" id="movies">

                  <div class="card-tools">
                    <div class="input-group input-group-sm">
                      <input type="text" class="form-control" name="moviesearch" id="moviesearch" placeholder="Search a Movie">
                      <table>
                          <tbody id="movieContent" class="moviesearchdata" style="background-color:black;color:white;"></tbody>
                      </table>
                    </div>
                  </div>
                  @foreach($movies as $movies)


                      <div class="post">


                            <div class="user-block" style="margin-left:-50px;">
                                <span class="username">
                                  <a href="">{{$movies->name}}</a>
                                </span>
                                <span class="description"><b> Director</b>: {{$movies->director}}</span>
                                <span class="description"><b> Staring</b>: {{$movies->staring}}</span>
                            </div>
                              <!-- /.user-block -->
                              <div class="video-div" style="width:100%;height:auto;"> 
                              <video controls class="video-controls" style="width:100%;height:auto;">
                              <source src="{{asset('/assets')}}/{{$movies->file}}" type="video/mp4" style="width:100%;height:auto;">
                              Your audio format is not supported</video>

                              </div>
                              <p>

                                
                              <a href="{{$Wshare}}"><img src="{{asset('/dist/img/whatsapp.jpeg')}}" alt="" style="50px;height:50px;"></a>
                              <a href="{{$Tshare}}"><img src="{{asset('/dist/img/telegram.jpeg')}}"" alt="" style="50px;height:50px;"></a>
                              <a href="{{$Fshare}}"><img src="{{asset('/dist/img/fabicon.png')}}"" alt="" style="35px;height:35px;"></a>
                              
                              </p>
                        </div>
                        @endforeach

                    </div>


                  <div class="tab-pane" id="events">

                  <div class="card-tools">
                    <div class="input-group input-group-sm">
                      <input type="text" class="form-control" name="eventssearch" id="eventssearch" placeholder="Search an Event">
                      <table>
                          <tbody id="eventContent" class="eventsearchdata" style="background-color:black;color:white;"></tbody>
                      </table>
                    </div>
                  </div>
                  @foreach($events as $events)

                      <div class="post">

                          <div class="user-block" style="margin-left:-50px;">
                              <span class="username">
                                <a href="">{{$events->name}}</a>
                              </span>
                              <span class="description"><b> Event Name</b>: {{$events->name}}</span>
                              <span class="description"><b> Host</b>: {{$events->host}}</span>
                          </div>
                            <!-- /.user-block -->
                            <div class="video-div" style="width:100%;height:auto;"> 
                            <video controls class="video-controls" style="width:100%;height:auto;">
                            <source src="{{asset('/assets')}}/{{$events->file}}" type="video/mp4" style="width:100%;height:auto;">
                            Your audio format is not supported</video>
                            </div>
                            <p>
                                <a href="{{$Wshare}}"><img src="{{asset('/dist/img/whatsapp.jpeg')}}" alt="" style="50px;height:50px;"></a>
                                <a href="{{$Tshare}}"><img src="{{asset('/dist/img/telegram.jpeg')}}" alt="" style="50px;height:50px;"></a>
                                <a href="{{$Fshare}}"><img src="{{asset('/dist/img/fabicon.png')}}" alt="" style="35px;height:35px;"></a>
                            </p>
                      </div>
                  @endforeach
                    
                  </div>
               
                  </div>
                  <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
              </div><!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
     
        <!-- /.card -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <!-- <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      <b>Version</b> 3.2.0
    </div>
    <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
  </footer> -->

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

<script>
   $(document).on('keyup','#trailersearch', function()
        {
            $value = $(this).val();
            
            if($value)
            {
                $('.searchdata').show();
            }
            else{
                $('.searchdata').hide();
            }
            $.ajax({

                type:'get',
                url:'{{URL::to('searchtrailer')}}',
                data:{'trailersearch':$value},

                success:function(data)
                {
                    console.log(data);
                    $('#Content').html(data);
                }
            });
        });
</script>

<script>
   $(document).on('keyup','#moviesearch', function()
        {
            $value = $(this).val();
            
            if($value)
            {
                $('.moviesearchdata').show();
            }
            else{
                $('.moviesearchdata').hide();
            }
            $.ajax({

                type:'get',
                url:'{{URL::to('searchmovie')}}',
                data:{'moviesearch':$value},

                success:function(data)
                {
                    console.log(data);
                    $('#movieContent').html(data);
                }
            });
        });
</script>

<script>
   $(document).on('keyup','#eventssearch', function()
        {
            $value = $(this).val();
            
            if($value)
            {
                $('.eventsearchdata').show();
            }
            else{
                $('.eventsearchdata').hide();
            }
            $.ajax({

                type:'get',
                url:'{{URL::to('searchevent')}}',
                data:{'eventssearch':$value},

                success:function(data)
                {
                    console.log(data);
                    $('#eventContent').html(data);
                }
            });
        });
</script>
</body>
</html>
