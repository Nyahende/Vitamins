<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Vitamins | Admin</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="{{asset('plugins/fontawesome-free/css/all.min.css')}}">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{asset('plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('dist/css/adminlte.min.css')}}">
</head>
<body class="hold-transition dark-mode sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
<div class="wrapper">

  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__wobble" src="{{asset('dist/img/vitaminlogo.png')}}" alt="VitaminLogo" height="60" width="60">
  </div>

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-dark">
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
      <img src="{{asset('dist/img/vitaminlogo.png')}}" alt="Vitamin Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
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
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Admin Panel</h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">

           <div class="card">
              <div class="card-header">
                <h3 class="card-title">Movies Table</h3>

              </div>


              <div class="card card-success" >
                        
                        <form action="{{route('AdminMovies')}}" method="post" enctype="multipart/form-data">
                            @csrf
                        <div class="card-body">
                            <div class="row">
                            <div class="col-5">
                                <input type="text" class="form-control" placeholder="VIDEO NAME" style="margin:5px" name="movieName" required autofocus>
                            </div>
                            <div class="col-5">
                                <input type="text" class="form-control" placeholder="DIRECTOR NAME" style="margin:5px" name="directorName" required autofocus>
                            </div>
                            <div class="col-5">
                                <input type="text" class="form-control" placeholder="STARING NAME" style="margin:5px" name="staringName" required autofocus>
                            </div>
                            <div class="col-5">
                                <input type="text" class="form-control" placeholder="RELEASED YEAR" style="margin:5px" name="year" required autofocus>
                            </div>
                            <div class="col-5">
                                <input type="file" class="form-control" placeholder="FILE" style="margin:5px" name="file" required autofocus>
                            </div>
                      <button type="submit" class="btn  btn-primary btn-sm" id="upload-movie-btn" style="margin:10;">Upload Movie</button>
                        </form>
                      
                        </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>id</th>
                    <th>Video Name</th>
                    <th>Created_at</th>
                  </tr>
                  </thead>
                  <tbody>

                @foreach($movies as $item)

                  <tr>
                    <td>{{$item->id}}</td>
                    <td>{{$item->name}}</td>
                    <td>{{$item->created_at}}</td>
                  </tr>

                @endforeach

                  </tbody>
                  <tfoot>
                  <tr>
                    <th>id</th>
                    <th>Video Name</th>
                    <th>Created_at</th>
                    
                  </tr>
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>

            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Traillers Table</h3>

                </div>


                      <div class="card card-success">
                                  
                      <form action="{{route('AdminTrailler')}}" method="post" enctype="multipart/form-data">
                            @csrf
                        <div class="card-body">
                            <div class="row">
                            <div class="col-5">
                                <input type="text" class="form-control" placeholder="VIDEO NAME" style="margin:5px" name="traillerName" required autofocus>
                            </div>
                            <div class="col-5">
                                <input type="text" class="form-control" placeholder="DIRECTOR NAME" style="margin:5px" name="directorName" required autofocus>
                            </div>
                            <div class="col-5">
                                <input type="text" class="form-control" placeholder="STARING NAME" style="margin:5px" name="staringName" required autofocus>
                            </div>
                            <div class="col-5">
                                <input type="file" class="form-control" placeholder="FILE" style="margin:5px" name="file" required autofocus>
                            </div>
                      <button type="submit" class="btn  btn-primary btn-sm" id="upload-movie-btn" style="margin:10;">Upload Movie</button>
                        </form>
                        
                          </div>
                      </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example2" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>id</th>
                    <th>Video Name</th>
                    <th>Created_at</th>
                  </tr>
                  </thead>
                  <tbody>
                  @foreach($traillers as $item)

                  <tr>
                    <td>{{$item->id}}</td>
                    <td>{{$item->name}}</td>
                    <td>{{$item->created_at}}</td>
                  </tr>

                @endforeach

                  </tbody>
                  <tfoot>
                  <tr>
                    <th>id</th>
                    <th>Video Name</th>
                    <th>Created_at</th>
                    
                  </tr>
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>


            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Events Table</h3>

              </div>


              <div class="card card-success" >
                        
                        <form action="{{route('AdminEvents')}}" method="post" enctype="multipart/form-data">
                            @csrf
                        <div class="card-body">
                            <div class="row">
                            <div class="col-5">
                                <input type="text" class="form-control" placeholder="VIDEO NAME" style="margin:5px" name="eventName" required autofocus>
                            </div>
                            <div class="col-5">
                                <input type="text" class="form-control" placeholder="HOST NAME" style="margin:5px" name="hostName" required autofocus>
                            </div>
                            <div class="col-5">
                                <input type="file" class="form-control" placeholder="FILE" style="margin:5px" name="file" required autofocus>
                            </div>
                      <button type="submit" class="btn  btn-primary btn-sm" id="upload-movie-btn" style="margin:10;">Upload Movie</button>
                        </form>
                      
                        </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>id</th>
                    <th>Video Name</th>
                    <th>Created_at</th>
                  </tr>
                  </thead>
                  <tbody>

                @foreach($events as $item)

                  <tr>
                    <td>{{$item->id}}</td>
                    <td>{{$item->name}}</td>
                    <td>{{$item->created_at}}</td>
                  </tr>

                @endforeach

                  </tbody>
                  <tfoot>
                  <tr>
                    <th>id</th>
                    <th>Video Name</th>
                    <th>Created_at</th>
                    
                  </tr>
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Technology Table</h3>

            </div>


            <div class="card card-success">
                        
                <form action="{{route('uploadTech')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="row">
                        <div class="col-5">
                            <input type="text" class="form-control" placeholder="VIDEO NAME" style="margin:5px" name="videoName" required autofocus>
                        </div>
                        <div class="col-5">
                            <input type="file" class="form-control" placeholder="FILE" style="margin:5px" name="file" required autofocus>
                        </div>
                        <button type="submit" class="btn  btn-primary btn-sm" id="add-movie" style="margin:10;">Upload Tech</button>
                    </div>
                </form>

            </div>

              <!-- /.card-header -->
              <div class="card-body">
                <table id="example3" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>id</th>
                    <th>Video Name</th>
                    <th>Created_at</th>
                  </tr>
                  </thead>
                  <tbody>

               @foreach($tech as $tech)
                  <tr>
                    <td>{{$tech->id}}</td>
                    <td>{{$tech->name}}</td>
                    <td>{{$tech->created_at}}</td>
                    
                  </tr>
               @endforeach
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>id</th>
                    <th>Video Name</th>
                    <th>Created_at</th>
                    
                  </tr>
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>

            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Food Table</h3>

              </div>


              <div class="card card-success">
                        
                <form action="{{route('uploadFood')}}" method="post" enctype="multipart/form-data">
                    @csrf
                <div class="card-body">
                    <div class="row">
                    <div class="col-5">
                        <input type="text" class="form-control" placeholder="VIDEO NAME" style="margin:5px" name="videoName" required autofocus>
                    </div>
                    <div class="col-5">
                        <input type="file" class="form-control" placeholder="FILE" style="margin:5px" name="file" required autofocus>
                    </div>
                   <button type="submit" class="btn  btn-primary btn-sm" id="add-movie" style="margin:10;">Upload Food</button>

              
                </div>
                </form>
                </div>

              <!-- /.card-header -->
              <div class="card-body">
                <table id="example4" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>id</th>
                    <th>Video Name</th>
                    <th>Created_at</th>
                  </tr>
                  </thead>
                  <tbody>

              @foreach($food as $food)
                  <tr>
                    <td>{{$food->id}}</td>
                    <td>{{$food->name}}</td>
                    <td>{{$food->created_at}}</td>
                    
                  </tr>
               @endforeach

                  </tbody>
                  <tfoot>
                  <tr>
                    <th>id</th>
                    <th>Video Name</th>
                    <th>Created_at</th>
                    
                  </tr>
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>


            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Music Videos Table</h3>

              </div>


              <div class="card card-success">
                        
                <form action="{{route('addMusic')}}" method="post" enctype="multipart/form-data">
                    @csrf
                <div class="card-body">
                    <div class="row">
                    <div class="col-5">
                        <input type="text" class="form-control" placeholder="VIDEO NAME" style="margin:5px" name="musicName" required autofocus>
                    </div>
                    <div class="col-5">
                        <input type="text" class="form-control" placeholder="ARTISTS NAME" style="margin:5px" name="artistName" required autofocus>
                    </div>
                    <div class="col-5">
                        <input type="file" class="form-control" placeholder="FILE" style="margin:5px" name="file" required autofocus>
                    </div>
              <button type="submit" class="btn  btn-primary btn-sm" id="add-movie" style="margin:10;">Upload Song</button>

              
              
                </div>
                </form>
                </div>

              <!-- /.card-header -->
              <div class="card-body">
                <table id="example4" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>id</th>
                    <th>Video Name</th>
                    <th>Video Artist</th>
                    <th>Created_at</th>
                  </tr>
                  </thead>
                  <tbody>

                  @foreach($musicVideo as $item)

                    <tr>
                      <td>{{$item->id}}</td>
                      <td>{{$item->song_name}}</td>
                      <td>{{$item->artist_name}}
                      </td>
                      <td>{{$item->created_at}}</td>
                    </tr>
                  
                  @endforeach
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>id</th>
                    <th>Video Name</th>
                    <th>Artist Name</th>
                    <th>Created_at</th>
                    
                  </tr>
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>

            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Audios Table</h3>

              </div>


              <div class="card card-success">
                        
                <form action="{{route('addSong')}}" method="post" enctype="multipart/form-data">
                    @csrf
                <div class="card-body">
                    <div class="row">
                    <div class="col-5">
                        <input type="text" class="form-control" placeholder="AUDIO NAME" style="margin:5px" name="audioName" required autofocus>
                    </div>
                    <div class="col-5">
                        <input type="text" class="form-control" placeholder="ARTIST NAME" style="margin:5px" name="artistName" required autofocus>
                    </div>
                 
                    <div class="col-5">
                        <input type="file" class="form-control" placeholder="FILE" style="margin:5px" name="file" required autofocus>
                    </div>
                <button type="submit" class="btn  btn-primary btn-sm" id="add-movie" style="margin:10;">Upload Song</button>

                </form>
                </div>
                </div>

              <!-- /.card-header -->
              <div class="card-body">
                <table id="example4" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>id</th>
                    <th>Song Name</th>
                    <th>Song Artist</th>
                    <th>Created_at</th>
                  </tr>
                  </thead>
                  <tbody>
                
                  @foreach($audio as $item)
                  <tr>
                    <td>{{$item->id}}</td>
                    <td>{{$item->song_name}}</td>
                    <td>{{$item->artist_name}}</td>
                    <td>{{$item->created_at}}</td>
                  </tr>
  
                  @endforeach
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>id</th>
                    <th>Song Name</th>
                    <th>Song Artist</th>
                    <th>Created_at</th>
                    
                  </tr>
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>

            <div class="card">
              <div class="card-header">
                <h3 class="card-title">History Table</h3>

              </div>


              <div class="card card-success">
                        
                <form action="{{route('addHistory')}}" method="post" enctype="multipart/form-data">
                    @csrf
                <div class="card-body">
                    <div class="row">
                    <div class="col-5">
                        <input type="text" class="form-control" placeholder="VIDEO NAME" style="margin:5px" name="videoName" required autofocus>
                    </div>
                   
                 
                    <div class="col-5">
                        <input type="file" class="form-control" placeholder="FILE" style="margin:5px" name="file" required autofocus>
                    </div>
                <button type="submit" class="btn  btn-primary btn-sm" id="add-movie" style="margin:10;">Upload History</button>

                </form>
                </div>
                </div>

              <!-- /.card-header -->
              <div class="card-body">
                <table id="example4" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>id</th>
                    <th>Video Name</th>
                    <th>Created_at</th>
                  </tr>
                  </thead>
                  <tbody>
                
                  @foreach($history as $item)
                  <tr>
                    <td>{{$item->id}}</td>
                    <td>{{$item->name}}</td>
                    <td>{{$item->created_at}}</td>
                  </tr>
  
                  @endforeach
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>id</th>
                    <th>Video Name</th>
                    <th>Created_at</th>
                    
                  </tr>
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
              <div class="card">
              <div class="card-header">
                <h3 class="card-title">Books Table</h3>

              </div>


              <div class="card card-success">
                        
                <form action="{{route('addBook')}}" method="post" enctype="multipart/form-data">
                    @csrf
                  <div class="card-body">
                      <div class="row">
                      <div class="col-5">
                          <input type="text" class="form-control" placeholder="BOOK NAME" style="margin:5px" name="bookName" required autofocus>
                      </div>

                      <div class="col-5">
                          <input type="text" class="form-control" placeholder="AUTHOR" style="margin:5px" name="author" required autofocus>
                      </div>

                      
                      <div class="col-5">
                          <input type="file" class="form-control" placeholder="PREVIEW" style="margin:5px" name="preview" required autofocus>
                      </div>
                    
                  
                      <div class="col-5">
                          <input type="file" class="form-control" placeholder="FILE" style="margin:5px" name="file" required autofocus>
                      </div>

                      <div class="col-5">
                          <input type="file" class="form-control" placeholder="FILE" style="margin:5px" name="bookCover" required autofocus>
                      </div>
                  <button type="submit" class="btn  btn-primary btn-sm" id="add-movie" style="margin:10;">Upload Book</button>

                </form>
                </div>
                </div>

              <!-- /.card-header -->
              <div class="card-body">
                <table id="example4" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>id</th>
                    <th>Book Name</th>
                    <th>Created_at</th>
                  </tr>
                  </thead>
                  <tbody>
                
                  @foreach($book as $item)
                  <tr>
                    <td>{{$item->id}}</td>
                    <td>{{$item->name}}</td>
                    <td>{{$item->created_at}}</td>
                  </tr>
  
                  @endforeach
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>id</th>
                    <th>book Name</th>
                    <th>Created_at</th>
                    
                  </tr>
                  </tfoot>
                </table>
              </div>

              <div class="card">
              <div class="card-header">
                <h3 class="card-title">Podcast Table</h3>

              </div>


              <div class="card card-success">
                        
                <form action="{{route('addPodcast')}}" method="post" enctype="multipart/form-data">
                    @csrf
                <div class="card-body">
                    <div class="row">
                    <div class="col-5">
                        <input type="text" class="form-control" placeholder="PODCAST NAME" style="margin:5px" name="podName" required autofocus>
                    </div>
                   
                 
                    <div class="col-5">
                        <input type="file" class="form-control" placeholder="FILE" style="margin:5px" name="file" required autofocus>
                    </div>
                <button type="submit" class="btn  btn-primary btn-sm" id="add-movie" style="margin:10;">Upload Podcast</button>

                </form>
                </div>
                </div>

              <!-- /.card-header -->
              <div class="card-body">
                <table id="example4" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>id</th>
                    <th>Podcast Name</th>
                    <th>Created_at</th>
                  </tr>
                  </thead>
                  <tbody>
                
                  @foreach($podcast as $item)
                  <tr>
                    <td>{{$item->id}}</td>
                    <td>{{$item->name}}</td>
                    <td>{{$item->created_at}}</td>
                  </tr>
  
                  @endforeach
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>id</th>
                    <th>Podcast Name</th>
                    <th>Created_at</th>
                    
                  </tr>
                  </tfoot>
                </table>
              </div>



            </div>
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Sports Table</h3>

              </div>


              <div class="card card-success">
                        
                <form action="{{route('uploadSport')}}" method="post" enctype="multipart/form-data">
                    @csrf
                <div class="card-body">
                    <div class="row">
                    <div class="col-5">
                        <input type="text" class="form-control" placeholder="VIDEO NAME" style="margin:5px" name="videoName" required autofocus>
                    </div>
                    <div class="col-5">
                        <input type="file" class="form-control" placeholder="FILE" style="margin:5px" name="file" required autofocus>
                    </div>
                 <button type="submit" class="btn  btn-primary btn-sm" id="add-movie" style="margin:10;">Upload Sport</button>

              
                </div>
                </div>

              <!-- /.card-header -->
              <div class="card-body">
                <table id="example5" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>id</th>
                    <th>Video Name</th>
                    <th>Created_at</th>
                  </tr>
                  </thead>
                  <tbody>
                  
                  @foreach($sport as $sport)
                  <tr>
                    <td>{{$sport->id}}</td>
                    <td>{{$sport->name}}</td>
                    <td>{{$sport->created_at}}</td>
                    
                  </tr>
                 @endforeach

                  </tbody>
                  <tfoot>
                  <tr>
                    <th>id</th>
                    <th>Video Name</th>
                    <th>Created_at</th>
                  </tr>
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
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
  <!-- <footer class="main-footer">
    <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 3.2.0
    </div>
  </footer> -->
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap -->
<script src="{{asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- overlayScrollbars -->
<script src="{{asset('plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('dist/js/adminlte.js')}}"></script>
<script src="{{asset('/js/formslide.js')}}"></script>



<script src="{{asset('/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
<script src="{{asset('/plugins/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('/plugins/datatables-buttons/js/buttons.bootstrap4.min.js')}}"></script>
<script src="{{asset('/plugins/jszip/jszip.min.js')}}"></script>
<script src="{{asset('/plugins/pdfmake/pdfmake.min.js')}}"></script>
<script src="{{asset('/plugins/pdfmake/vfs_fonts.js')}}"></script>
<script src="{{asset('/plugins/datatables-buttons/js/buttons.html5.min.js')}}"></script>
<script src="{{asset('/plugins/datatables-buttons/js/buttons.print.min.js')}}"></script>
<script src="{{asset('/plugins/datatables-buttons/js/buttons.colVis.min.js')}}"></script>

<!-- PAGE PLUGINS -->
<!-- jQuery Mapael -->
<script src="{{asset('plugins/jquery-mousewheel/jquery.mousewheel.js')}}"></script>
<script src="{{asset('plugins/raphael/raphael.min.js')}}"></script>
<script src="{{asset('plugins/jquery-mapael/jquery.mapael.min.js')}}"></script>
<script src="{{asset('plugins/jquery-mapael/maps/usa_states.min.js')}}"></script>
<!-- ChartJS -->
<script src="{{asset('plugins/chart.js/Chart.min.js')}}"></script>

<!-- AdminLTE for demo purposes -->
<script src="{{asset('dist/js/demo.js')}}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{asset('dist/js/pages/dashboard2.js')}}"></script>

<script>
    $(function () {
        $("#example1")
            .DataTable({
                responsive: true,
                lengthChange: true,
                autoWidth: true,
                searching: true,
            })
            .buttons()
            .container()
            .appendTo("#example1_wrapper .col-md-6:eq(0)");
        $("#example2").DataTable({
            paging: true,
            lengthChange: true,
            searching: true,
            ordering: true,
            info: true,
            autoWidth: true,
            responsive: true,
        });
        $("#example3")
          .DataTable({
              responsive: true,
              lengthChange: true,
              autoWidth: true,
              searching: true,
          })
          $("#example4")
          .DataTable({
              responsive: true,
              lengthChange: true,
              autoWidth: true,
              searching: true,
          })
          $("#example5")
          .DataTable({
              responsive: true,
              lengthChange: true,
              autoWidth: true,
              searching: true,
          })
    });
</script>
</body>
</html>
