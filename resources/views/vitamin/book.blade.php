<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Vitamin | Books</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('/plugins/fontawesome-free/css/all.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('/dist/css/adminlte.min.css')}}">
  <link rel="stylesheet" href="{{asset('/css/vitamin.css')}}">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>


</head>
<body class="hold-transition sidebar-mini">
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

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Navbar Search -->
    

      <!-- Messages Dropdown Menu -->
   
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
     <!-- Brand Logo -->
     <a href="" class="brand-link">
      <img src="{{asset('dist/img/vitaminlogo.png')}}" alt="Vitamin Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
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
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Books</h1>
          </div>
         
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        
        <!-- /.col -->

        <div class="col-md-9">
          <div class="card card-primary card-outline">
            <div class="card-header">

              <div class="card-tools">
                <div class="input-group input-group-sm">
                  <input type="text" class="form-control" name="booksearch" id="booksearch" placeholder="Search a Book">
                  <table>
                      <tbody id="Content" class="searchdata" style="background-color:black;color:white;"></tbody>
                  </table>
                </div>
              </div>
              <!-- /.card-tools -->
            </div>
            <!-- /.card-header -->
            <div class="active tab-pane" id="video">


                    @foreach($book as $book)
                    <div class="post" id="{{$book->id}}">
                      <div class="user-block">
                        <span class="username">
                          <a href="{{route('userprofilename',[$book->name])}}">{{$book->name}}</a>
                        </span>
                        <span class="description">{{$book->author}}</span>
                      </div>
                      <!-- /.user-block -->
                      <div class="cover-div" style="width:100%;height:auto;"> 
                       <img src="{{asset('/assets')}}/{{$book->bookCover}}" style="width:100%;height:auto;">
                      </div>
                      <p>

                      <button type="button" class="btn btn-success" style="margin:10px;"><a href="{{asset('/assets')}}/{{$book->file}}" style="color:white;"> Read The Book</a></button>
                      <button type="button" class="btn btn-success" style="margin:10px;"><a href="{{asset('/assets')}}/{{$book->preview}}" style="color:white;"> Read The Preview</a></button>
                      
                      </p>
                         <a href="{{$Wshare}}"><img src="{{asset('/dist/img/whatsapp.jpeg')}}" alt="" style="50px;height:50px;"></a>
                         <a href="{{$Tshare}}"><img src="{{asset('/dist/img/telegram.jpeg')}}" alt="" style="50px;height:50px;"></a>
                         <a href="{{$Fshare}}"><img src="{{asset('/dist/img/fabicon.png')}}" alt="" style="35px;height:35px;"></a>
                    </div>
                    @endforeach

                    </div>

            <!-- /.card-body -->
            
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <strong>Developed and Maintained by:  <a href="">michaelnyahende8@gmail.com</a>.</strong>
    
    <div class="float-right d-none d-sm-inline-block">
      This site has been acive since <b>2022 July</b>
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
<!-- Page specific script -->



<script>
   $(document).on('keyup','#booksearch', function()
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
                url:'{{URL::to('search')}}',
                data:{'search':$value},

                success:function(data)
                {
                    console.log(data);
                    $('#Content').html(data);
                }
            });
        });
</script>
</body>
</html>
