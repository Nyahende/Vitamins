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
  <link rel="stylesheet" href="{{asset('/css/vitamin.css')}}">
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

    <!-- Right navbar links -->
    
  </nav>
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
            <h1>Profile</h1>
          </div>
         
        </div>
      </div><!-- /.container-fluid -->
    </section>
    @if(Session::get('followsuccess'))
      <div>
          <h2 style="color:blue;font-weight:lighter;text-align:center">{{Session::get('followsuccess')}}</h2>
      </div>
    @endif
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-3">

           @foreach($userDetails as $userDetails)

            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                  @if($userDetails->profile_picture)
                  <img class="profile-user-img img-fluid img-circle"
                       src="{{asset('/assets')}}/{{$userDetails->profile_picture}}"
                       alt="User profile picture">
                  @else
                  <img class="profile-user-img img-fluid img-circle"
                    src="{{asset('/dist/img/user.jpg')}}"
                    alt="User profile picture">
                  @endif
                </div>

                <h3 class="profile-username text-center">{{$userDetails->name}}</h3>

                <p class="text-muted text-center">{{$userDetails->occupation}}</p>
                <p class="text-muted text-center">{{$userDetails->status}}</p> <br>
 
                <ul class="list-group list-group-unbordered mb-3">
                
                  <li class="list-group-item">
                   <a href="{{route('chat',[$userDetails->name])}}"> <b>Inbox</b></a> 
                  </li>
                  <li class="list-group-item">
                    <b>Posts</b> <a class="float-right">{{$totalPostCount}}</a>
                  </li>
                </ul>
              </div>
              <!-- /.card-body -->
            </div>

          </div>
          <!-- /.col -->
          <div class="col-md-9">
            <div class="card">
              <div class="card-header p-2">
                <ul class="nav nav-pills">
                  <li class="nav-item"><a class="nav-link active" href="#videos" data-toggle="tab">Videos</a></li>
                  <li class="nav-item"><a class="nav-link" href="#images" data-toggle="tab">Images</a></li>
                  <li class="nav-item"><a class="nav-link" href="#posts" data-toggle="tab">Posts</a></li>
                  <li class="nav-item"><a class="nav-link" href="#about" data-toggle="tab">About Me</a></li>
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
                @if(Session::get('profilePicture'))
                  <div>
                      <h1 style="color:red;font-size:20px;">{{Session::get('profilePicture')}}</h1>
                  </div>
                @endif
                  <div class="active tab-pane" id="videos">

                    @foreach($userVideos as $userVideos)
                    <div class="post">

                    <div class="user-block">
                      @if($userDetails->profile_picture)
                        <img class="img-circle img-bordered-sm" src="{{asset('/assets')}}/{{$userDetails->profile_picture}}" alt="user image">
                      @else 
                      <img class="img-circle img-bordered-sm" src="{{asset('/dist/img/user.jpg')}}" alt="user image">
                      @endif
                        <span class="username">
                          <a href="{{route('userprofilename',[$userVideos->poster_name])}}">{{$userVideos->poster_name}}</a>
                        </span>
                        <span class="description">{{$userVideos->caption}}</span>
                      </div>
                      <!-- /.user-block -->
                      <div class="video-div" style="width:100%;height:auto;"> 
                        <video controls class="video-controls" style="width:100%;height:auto;">
                        <source src="{{asset('/assets')}}/{{$userVideos->file}}" type="video/mp4" style="width:100%;height:auto;">
                         Your audio format is not supported</video>
                      </div>
                      <p>

                        
                        <span class="float-right" id="video-float-right">
                            <i class="far fa-comments mr-1"></i> Comments ({{$commentCount = \App\Models\videoComment::where('post_id',$userVideos->id)->count();}})
                        </span>
                      </p>
                      <div class="videos-comments-div" style="margin-top:20px;width:100%;max-height:400px;overflow-y:scroll;">
                    
                      @foreach($userVideoComments as $comment)

                         @if($comment->post_id == $userVideos->id)

                            <div class="user-block">
                              @if($comment->sender_picture)
                              <img class="img-circle img-bordered-sm" src="{{asset('/assets')}}/{{$comment->sender_picture}}" alt="user image">
                              @else
                              <img class="img-circle img-bordered-sm" src="{{asset('/dist/img/user.jpg')}}" alt="user image">
                              @endif
                              <span class="username">
                                <a href="{{route('userprofilename',[$comment->sender_name])}}">{{$comment->sender_name}}</a>
                              </span>
                              <span class="description">{{$comment->created_at}}</span>
                            </div>
                            <!-- /.user-block -->
                            <p>
                            {{$comment->comment_body}} <br>
                            </p>
                            
                          @endif

                      @endforeach
                      </div>


                      <form action="{{route('Profilecomment')}}" method="post" enctype="multipart/form-data">
                        @csrf
                      <input  type="hidden"  value="{{$userVideos->id}}" name="postId">
                      <input class="form-control form-control-sm" type="text" placeholder="Type a comment" name="commentBody">
                      <button type="submit" class="input-group-text" >Send</button>

                      </form>
                      </div>
                    @endforeach

                    </div>
                  <!-- /.tab-pane -->
                  <div class="tab-pane" id="images">
                    <!-- The timeline -->

                    @foreach($userImages as $userImages)
                    <div class="post">
                      <div class="user-block">
                        @if($userDetails->profile_picture)
                         <img class="img-circle img-bordered-sm" src="{{asset('/assets')}}/{{$userDetails->profile_picture}}" alt="User Image">
                        @else
                        <img class="img-circle img-bordered-sm" src="{{asset('/dist/img/user.jpg')}}" alt="User Image">
                        @endif
                        <span class="username">
                          <a href="{{route('userprofilename',[$userImages->poster_name])}}">{{$userImages->poster_name}}</a>
                        </span>
                        <span class="description">{{$userImages->caption}}</span>
                      </div>
                      <!-- /.user-block -->
                      <div class="row mb-3" style="" >
                      <img class="img-fluid" src="{{asset('/assets')}}/{{$userImages->file}}" alt="Photo" style="width:100%;height:100%;">


                      </div>
                      <!-- /.row -->
                      <p>
                      
                         <span class="float-right" id="images-float-right">
                            <i class="far fa-comments mr-1"></i> Comments({{$commentCount = \App\Models\imageComment::where('post_id',$userImages->id)->count();}})
                         </span>
                      </p>
                      <div class="images-comments-div" style="margin-top:20px;width:100%;max-height:300px;overflow-y:scroll;">
                      @foreach($userImageComments as $comment)

                         @if($comment->post_id == $userImages->id)

                            <div class="user-block">
                              @if($comment->sender_picture)
                               <img class="img-circle img-bordered-sm" src="{{asset('/assets')}}/{{$comment->sender_picture}}" alt="user image">
                              @else
                               <img class="img-circle img-bordered-sm" src="{{asset('/dist/img/user.jpg')}}" alt="user image">
                              @endif
                              <span class="username">
                                <a href="{{route('userprofilename',[$comment->sender_name])}}">{{$comment->sender_name}}</a>
                              </span>
                              <span class="description">{{$comment->created_at}}</span>
                            </div>
                            <p>
                            {{$comment->comment_body}} <br>
                            </p>

                            
                          @endif

                      @endforeach
                      </div>

                      <form action="{{route('ProfileImageComment')}}" method="post">
                        @csrf
                      <input  type="hidden"  value="{{$userImages->id}}" name="postId">
                      <input class="form-control form-control-sm" type="text" placeholder="Type a comment" name="commentBody">
                      <button type="submit" class="input-group-text" >Send</button>

                      </form>
                      </div>
                    @endforeach

                    </div>


                  <div class="tab-pane" id="posts">
                    <!-- The timeline -->

                    @foreach($userPosts as $userPosts)
                    <div class="post">
                      <div class="user-block">
                        @if($userDetails->profile_picture)
                         <img class="img-circle img-bordered-sm" src="{{asset('/assets')}}/{{$userDetails->profile_picture}}" alt="User Image">
                        @else
                        <img class="img-circle img-bordered-sm" src="{{asset('/dist/img/user.jpg')}}" alt="User Image">
                        @endif
                         <span class="username">
                          <a href="{{route('userprofilename',[$userPosts->poster_name])}}">{{$userPosts->poster_name}}</a>
                        </span>
                        <span class="description">{{$userPosts->caption}}</span>
                      </div>
                      <!-- /.user-block -->
                      <p>
                        {{$userPosts->post}}
                      </p>
                      <!-- /.row -->

                      <p>
                        <span class="float-right" id="posts-float-right">
                            <i class="far fa-comments mr-1"></i> Comments ({{$commentCount = \App\Models\postComment::where('post_id',$userPosts->id)->count();}})
                        </span>
                      </p>
                      <div class="posts-comments-div" style="margin-top:20px;width:100%;max-height:400px;overflow-y:scroll;">
                      @foreach($userPostComments as $comment)

                         @if($comment->post_id == $userPosts->id)

                            <div class="user-block">
                              @if($comment->sender_picture)
                               <img class="img-circle img-bordered-sm" src="{{asset('/assets')}}/{{$comment->sender_picture}}" alt="user image">
                              @else
                              <img class="img-circle img-bordered-sm" src="{{asset('/dist/img/user.jpg')}}" alt="user image">
                              @endif
                              <span class="username">
                                <a href="{{route('userprofilename',[$comment->sender_name])}}">{{$comment->sender_name}}</a>
                              </span>
                              <span class="description">{{$comment->created_at}}</span>
                            </div>
                            <p>
                            {{$comment->comment_body}} <br>
                            </p>

                          @endif

                      @endforeach
                      </div>

                      <form action="{{route('ProfilePostComment')}}" method="post">
                        @csrf
                      <input  type="hidden"  value="{{$userPosts->id}}" name="postId">
                      <input class="form-control form-control-sm" type="text" placeholder="Type a comment" name="commentBody">
                      <button type="submit" class="input-group-text" >Send</button>

                      </form>
                    </div>
                    @endforeach
                    
                    <!-- Post -->
                    
                  </div>
                  
                  <!-- /.tab-pane -->

                  <div class="tab-pane" id="about">
                  
                        <div class="card-header">
                          <h3 class="card-title">About Me</h3>
                        </div>
              <!-- /.card-header -->

                        <div class="card-body">
                            <strong><i class="fas fa-book mr-1"></i> Education</strong>

                            <p class="text-muted">
                            {{$userDetails->education}}
                            </p>

                            <hr>

                            <strong><i class="fas fa-map-marker-alt mr-1"></i> Location</strong>

                            <p class="text-muted">{{$userDetails->location}}</p>

                            <hr>

                            <strong><i class="fas fa-pencil-alt mr-1"></i> Skills</strong>

                            <p class="text-muted">
                            <span class="tag tag-danger">{{$userDetails->skills}}</span>
                            
                            </p>

                            <hr>

                            <strong><i class="far fa-file-alt mr-1"></i> Hobbies</strong>

                            <p class="text-muted">{{$userDetails->hobbies}}</p>


                             <hr>

                             <strong><i class="far fa-file-alt mr-1"></i> Notes</strong>

                            <p class="text-muted">{{$userDetails->notes}}</p>

                        </div>
                        @endforeach
                        
                        <!-- /.card-body -->
                        </div>
                  </div>
                  <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
              </div><!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
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
</body>
</html>
