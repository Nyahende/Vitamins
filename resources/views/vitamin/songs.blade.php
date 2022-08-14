<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Vitamins | Songs</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('/plugins/fontawesome-free/css/all.min.css')}}">
  <!-- SweetAlert2 -->
  <!-- Toastr -->
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('/dist/css/adminlte.min.css')}}">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
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
            <ul class="nav nav-tabs" id="custom-content-below-tab" role="tablist">
              <li class="nav-item">
                <a class="nav-link active" id="custom-content-below-home-tab" data-toggle="pill" href="#custom-content-below-home" role="tab" aria-controls="custom-content-below-home" aria-selected="true" style="font-size:12px;">Videos</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="custom-content-below-profile-tab" data-toggle="pill" href="#custom-content-below-profile" role="tab" aria-controls="custom-content-below-profile" aria-selected="false" style="font-size:12px;">Audios</a>
              </li>
            </ul>
            <div class="tab-content" id="custom-content-below-tabContent">
              <div class="tab-pane fade show active" id="custom-content-below-home" role="tabpanel" aria-labelledby="custom-content-below-home-tab">
                  
                  <div class="card-tools">
                    <div class="input-group input-group-sm">
                      <input type="text" class="form-control" name="videosearch" id="videosearch" placeholder="Search">
                      <table>
                          <tbody id="videoContent" class="videosearchdata" style="background-color:black;color:white;margin-top:50px;"></tbody>
                      </table>
                    </div>
                  </div>
                  @foreach($musicVideo as $musicVideo)
                   <div class="post" id="{{$musicVideo->id}}">
                      <div class="user-block" style="margin-left:-40px;">
                        <span class="username">
                          <a href="#">{{$musicVideo->song_name}}</a>
                        </span>
                        <span class="description">{{$musicVideo->artist_name}}</span>
                      </div>
                      <!-- /.user-block -->
                      <div class="row mb-3" style="width:100%;" >
                      <div class="video-div" style="width:100%;height:auto"> 
                      <video controls class="video-controls" style="width:100%;height:auto">
                       <source src="{{asset('/assets')}}/{{$musicVideo->file}}" type="video/mp4">Your audio format is not supported</video>
                      </div>
                      </div>
                     
                    </div>
                  @endforeach
              </div>
              <div class="tab-pane fade" id="custom-content-below-profile" role="tabpanel" aria-labelledby="custom-content-below-profile-tab">
             
                  <div class="card-tools">
                    <div class="input-group input-group-sm">
                      <input type="text" class="form-control" name="audiosearch" id="audiosearch" placeholder="Search">
                      <table>
                          <tbody id="audioContent" class="audiosearchdata" style="background-color:black;color:white;"></tbody>
                      </table>
                    </div>
                  </div>
               @foreach($songs as $songs)
                    <div class="post" id="{{$songs->id}}">
                      <div class="user-block" style="margin-left:-40px;">
                        <span class="username">
                          <a href="#">{{$songs->song_name}}</a>
                        </span>
                        <span class="description">{{$songs->artist_name}}</span>
                      </div>
                      <!-- /.user-block -->
                      <div class="row mb-3" style="width:100%;" >
                      <div class="video-div" style="width:100%;height:auto"> 
                      <audio controls class="audiplay" style="width:100%;">
                      <source src="{{asset('/assets')}}/{{$songs->file}}" type="audio/mpeg" style="width:100%;">Your audio format is not supported</audio>
                      </div>
                      </div>
                     
                    </div>
               @endforeach
               
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
<script src="{{asset('/plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('/dist/js/adminlte.min.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{asset('/dist/js/demo.js')}}"></script>


<script>
$(document).on('keyup','#videosearch', function()
    {
        $value = $(this).val();
        
        if($value)
        {
            $('.videosearchdata').show();
        }
        else{
            $('.videosearchdata').hide();
        }
        $.ajax({

            type:'get',
            url:'{{URL::to('searchvideo')}}',
            data:{'videosearch':$value},

            success:function(data)
            {
                console.log(data);
                $('#videoContent').html(data);
            }
        });
    });
</script> 
 <script>
   $(document).on('keyup','#audiosearch', function()
        {
            $value = $(this).val();
            
            if($value)
            {
                $('.audiosearchdata').show();
            }
            else{
                $('.audiosearchdata').hide();
            }
            $.ajax({

                type:'get',
                url:'{{URL::to('searchaudio')}}',
                data:{'audiosearch':$value},

                success:function(data)
                {
                    console.log(data);
                    $('#audioContent').html(data);
                }
            });
        });
</script> 

</body>
</html>
