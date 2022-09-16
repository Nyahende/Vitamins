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
  @include('live.newmessage')
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  @include('vitamin.sidebar')


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


                    @foreach($book as $books)
                    <div class="post" id="{{$books->id}}">
                      <div class="user-block">
                        <span class="username">
                          <a href="{{route('userprofilename',[$books->name])}}">{{$books->name}}</a>
                        </span>
                        <span class="description">{{$books->author}}</span>
                      </div>
                      <!-- /.user-block -->
                      <div class="cover-div" style="width:100%;height:auto;"> 
                       <img src="{{asset('/assets')}}/{{$books->bookCover}}" style="width:100%;height:auto;">
                      </div>
                      <p>

                      <button type="button" class="btn btn-success" style="margin:10px;"><a href="{{asset('/assets')}}/{{$books->file}}" style="color:white;"> Download</a></button>
                      
                      </p>
                         
                    </div>
                    @endforeach

                    {{ $book->links('pagination::bootstrap-4') }}

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
