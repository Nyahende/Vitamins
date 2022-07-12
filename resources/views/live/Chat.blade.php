<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="csrf-token" content="{{csrf_token()}}">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Vitamin | LiveChat </title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="{{asset('plugins/fontawesome-free/css/all.min.css')}}">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{asset('plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('dist/css/adminlte.min.css')}}">
  <link rel="stylesheet" href="{{asset('/css/vitamin.css')}}">
  <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script> -->
  <!-- jQuery -->
<script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>

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
    <img class="animation__wobble" src="dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
  </div>

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-dark">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="index3.html" class="nav-link">Home</a>
      </li>
    
    </ul>

  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="{{asset('dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Vitamin</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
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

    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper" style="height:100%;">
    <!-- Content Header (Page header) -->
    
    
                <!-- DIRECT CHAT -->
                <div class="card direct-chat direct-chat-warning" style="width:100%;height:100%;">
                  <a href="{{route('userprofilename',[$name])}}">
                  <div class="card-header" style="background-color:orange;" style="display:inline-flex;">
                  @foreach($userDetails as $userDetails)

                    <div style="display:inline-flex;margin-top:-20px;">
                    @if($userDetails->profile_picture)
                      <img src="{{asset('/assets')}}/{{$userDetails->profile_picture}}" alt="" style="width:50px;height:50px;border-radius:50%;border:2px solid black;margin:10px;"><br>
                    @else
                      <img src="{{asset('/dist/img/user.jpg')}}" alt="" style="width:50px;height:50px;border-radius:50%;border:2px solid black;margin:10px;"><br>

                    @endif
                    </div>
                      <h3 class="card-title" style="color:white!important;"> {{$name}}</h3><br>
                      <span style="margin-left:10x;color:white!important;">{{$userDetails->status}}</span>

                  @endforeach
                  </div>
                  </a>
                  
                  <!-- /.card-header -->
                  <div class="card-body" style="width:100%;height:100%;">
                    <!-- Conversations are loaded here -->
                    <div class="direct-chat-messages" style="width:100%;height:200px;">
                      
                      <!-- Message. Default to the left -->
                      <div class="direct-chat-msg">
                        
                        <!-- /.direct-chat-img -->
                        <div class="direct-chat-text" id="direct-chat-text-left">
                        </div>
                        <div class="direct-chat-infos clearfix">
                          <span class="direct-chat-timestamp-float-right"></span>
                        </div>
                        <!-- /.direct-chat-text -->
                      </div>
                      <!-- /.direct-chat-msg -->
                      <!-- Message to the right -->
                      <div class="direct-chat-msg right">

                        <!-- /.direct-chat-img -->
                        <div class="direct-chat-text" id="direct-chat-text-right" >
                        </div>
                        <div class="direct-chat-infos clearfix">
                          <span class="direct-chat-timestamp-float-left"></span>
                        </div>
                        <!-- /.direct-chat-text -->
                      </div>

                    </div>
                    <!-- /.direct-chat-pane -->
                  </div>
                  <!-- /.card-body -->
                  <div class="card-footer">
                    <form class="the-chat-form" id="the-chat-form">
                      <div class="input-group">
                          @csrf
                        <input type="hidden"  name="sreceiver" id="sreceiver" value="{{$receivername}}">
                        <input type="hidden"  name="receiver" id="receiver" value="{{$receivername}}">
                        <input type="hidden"  name="authusername" id="authusername" value="{{$authusername}}">
                        <input type="text" name="message" id="message" placeholder="Type Message ..." class="form-control">
                        <span class="input-group-append">
                          <button type="submit" class="btn btn-warning">Send</button>
                        </span>
                      </div>
                    </form>
                  
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 3.2.0
    </div>
  </footer>
</div>



<script>

// $(document).ready(function(){

    // FETCHING TEXTS

    fetchtexts();
    setInterval(fetchtexts, 100);
    function fetchtexts()
        {
        $.ajax({
            type:'get',
            url:'{{route('fetchtexts',$name)}}',
            dataType:'json',
            success: function(response)
            {
                                    
            var username = $('#receiver').val();
            var authusername = $('#authusername').val();
            $('.direct-chat-messages').html("");
            
            $.each(response.texts, function(key, item){
                if(item.sender_name == authusername && item.receiver_name == username)
                {
                $('.direct-chat-messages').append('\
                    <div id="direct-chat-text-right">'+item.text_body+'</div>\
                    <div class="direct-chat-timestamp-float-left">'+item.created_at+'</div>\
                '); 
                }
                else if(item.sender_name == username && item.receiver_name == authusername)
                {
                $('.direct-chat-messages').append('\
                    <div id="direct-chat-text-left">'+item.text_body+'</div>\
                    <div class="direct-chat-timestamp-float-right">'+item.created_at+'</div>\
                '); 
                }

            });  
                                
            }
            });
        }
    

    // SENDING A TEXT MESSAGE

$('.the-chat-form').submit(function(e){
    e.preventDefault();

    $value = $('#message').val();
    $receiver = $('#receiver').val();
    $.ajaxSetup({
        headers:{
            'X-CSRF-TOKEN':
            $('meta[name="csrf-token"]').attr('content')
        }
    });

    $.ajax({
            url:'{{route('sendtext')}}',
            type:"post",
            data:{'message':$value, 'receiver':$receiver},
            success:function(response)
            {
                $('.the-chat-form')[0].reset();
                fetchtexts();
            }      
    }); 
    
    
});
// });

</script>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

</body>
</html>
