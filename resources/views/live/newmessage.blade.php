<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

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
<!-- <script src="{{asset('js/formslide.js')}}"></script> -->
<body>
<nav class="main-header navbar navbar-expand navbar-dark">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="{{route('main')}}" class="nav-link">Home</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#" id="new-message-id">
          <i class="far fa-comments"></i>
          <span class="badge badge-danger navbar-badge">{{$newmessageCount = \App\Models\newmessage::where('receiver_name',Auth::user()->name)->count();}}</span>
        </a>
        @foreach($shownewmessage as $shownewmessage)
         @if($shownewmessage->sender_name !== Auth::user()->name && $shownewmessage->receiver_name == Auth::user()->name) 

        
        <div id="the-span">
          <ul>
            <li><a href="{{route('chat',[$shownewmessage->sender_name])}}">{{$shownewmessage->sender_name}}</a></li>
          </ul>
        </div>
         @endif

        @endforeach
        <li class="nav-item d-none d-sm-inline-block">
      <a class="dropdown-item" href="{{ route('logout') }}" style="color:red"
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
  <form action="" method="post">
    <input type="hidden" id="authusername" name="authusername" value="{{Auth::user()->name}}">
  </form>
@php
$authusername = Auth::user()->name
@endphp

<!-- <script>

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
          
            $('#the-span').html("");
            var authusername = $('#authusername').val()
            $.each(response.newmessage, function(key, item){
            
              // if(item.sender_name !== authusername)
              {
                $('#the-span').append('\
                    <li> <a href="chat/'+item.sender_name+'">'+item.sender_name+'</a></li>\
                '); 
              }
               

            });
                                
            }
        });
                                
       }
        
    </script> -->
</body>
</html>