<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Vitamins | Food</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('/plugins/fontawesome-free/css/all.min.css')}}">
  <!-- SweetAlert2 -->
  <link rel="stylesheet" href="{{asset('/plugins/sweetalert2/sweetalert2.min.css')}}">
  <!-- Toastr -->
  <link rel="stylesheet" href="{{asset('/plugins/toastr/toastr.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('/dist/css/adminlte.min.css')}}">
  <script src="{{asset('/plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('/dist/js/adminlte.min.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{asset('/dist/js/demo.js')}}"></script>
<script src="{{asset('/js/formslide.js')}}"></script>
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
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
    

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
 
        <div class="card card-primary card-outline">
         
          <div class="card-body">
            
            <div class="tab-content" id="custom-content-below-tabContent">
              <div class="tab-pane fade show active" id="custom-content-below-home" role="tabpanel" aria-labelledby="custom-content-below-home-tab">
              
              

                 <div class="card-tools">
                    <div class="input-group input-group-sm">
                      <input type="text" class="form-control" name="foodsearch" id="foodsearch" placeholder="Search">
                      <table>
                          <tbody id="foodContent" class="foodsearchdata" style="background-color:black;color:white;"></tbody>
                      </table>
                    </div>
                  </div>
              @foreach($food as $foods)

              <div class="post">
                    <div class="user-block" style="margin-left:-40px;">
                      <span class="username">
                        <a href="#">{{$foods->name}}</a>
                      </span>
                      
                    </div>
                    <!-- /.user-block -->
                    <div class="row mb-3" style="width:100%;" >
                      <video controls class="video-controls" style="width:100%;height:auto;">
                      <source src="{{asset('/assets')}}/{{$foods->file}}" type="video/mp4" style="width:100%;height:auto;">
                      Your audio format is not supported</video>
                    </div>

                  </div>
                @endforeach

                {{ $food->links('pagination::bootstrap-4') }}
              </div>
              
              
              </div>
            
            </div>
            
            
         
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
<!-- Bootstrap 4 -->
<!-- AdminLTE App -->


<script>
$(document).on('keyup','#foodsearch', function()
    {
        $value = $(this).val();
        
        if($value)
        {
            $('.foodsearchdata').show();
        }
        else{
            $('.foodsearchdata').hide();
        }
        $.ajax({

            type:'get',
            url:'{{URL::to('searchfood')}}',
            data:{'foodsearch':$value},

            success:function(data)
            {
                console.log(data);
                $('#foodContent').html(data);
            }
        });
    });
</script>
</body>
</html>
