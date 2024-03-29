<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="csrf-token" content="{{csrf_token()}}">
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
            <h1>Profile</h1>
          </div>
         
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <div class="are-you-sure">
      <h3>Are You Sure you want to delete Your Account?</h3>
      <button><a href="{{'deleteUser/'.Auth::user()->id}}"> Yes</a></button>
      <button id="cancel">Cancel</button>
    </div>
<button id="delete-account">Delete Account</button>
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-3">

            <!-- Profile Image -->
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                  <a href="editProfilePicture/{{Auth::user()->id}}">
                    @if(Auth::user()->profile_picture)
                      <img class="profile-user-img img-fluid img-circle" id="the-picture"
                       src="{{asset('/assets')}}/{{Auth::user()->profile_picture}}"
                       alt="User profile picture">
                    @else
                       <img class="profile-user-img img-fluid img-circle"
                       src="{{asset('/dist/img/user.jpg')}}"
                       alt="User profile picture">
                    @endif
                  </a>
                </div>

                <h3 class="profile-username text-center">{{Auth::user()->name}}</h3>

                <p class="text-muted text-center">{{Auth::user()->occupation}}</p>
                <p class="text-muted text-center">{{Auth::user()->status}}</p>

                <ul class="list-group list-group-unbordered mb-3">
                  
                  <li class="list-group-item">
                    <b>Posts</b> <a class="float-right">{{$totalPostCount}}</a>
                  </li>

                </ul>

              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

            
            <!-- /.card -->
          </div>
         
          <!-- /.col -->
          <div class="col-md-9">
            <div class="card">
              <div class="card-header p-2">
                <ul class="nav nav-pills">
                  <li class="nav-item"><a class="nav-link active" href="#video" data-toggle="tab">Videos</a></li>
                  <li class="nav-item"><a class="nav-link" href="#images" data-toggle="tab">Images</a></li>
                  <li class="nav-item"><a class="nav-link" href="#posts" data-toggle="tab">Posts</a></li>
                  <li class="nav-item"><a class="nav-link" href="#about" data-toggle="tab">About Me</a></li>
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
                  <div class="active tab-pane" id="video">
                  
                  <button type="button" class="btn btn-success" style="margin:10px;" id="add-media-btn" >Add Video</button>
                 
                  <div class="add-media-div" style="display:none">
                    <form action="{{route('ProfileMediaRoute')}}" method="post" enctype="multipart/form-data">
                      @csrf
                      <div class="card-body">
                        <div class="form-group">
                          <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Add Caption" name="caption" required>
                        </div>
                        <div class="form-group">
                          <div class="input-group">
                            <div class="custom-file">
                                <input type="file" class="form-control" placeholder="Choose File" style="margin:5px" name="file" >
                            </div>
                            <div class="input-group-append">
                              <button type="submit" class="input-group-text" id="upload-media-btn">Upload</button>
                            </div>
                          </div>
                        </div>
                      </div>
                    </form>
                    </div>

                    @foreach($userMedia as $item)
                    <div class="post">
                      <div class="user-block">
                        @if(Auth::user()->profile_picture)
                         <img class="img-circle img-bordered-sm" src="{{asset('/assets')}}/{{Auth::user()->profile_picture}}" alt="user image">
                        @else
                         <img class="img-circle img-bordered-sm" src="{{asset('/dist/img/user.jpg')}}" alt="user image">
                        @endif
                        <span class="username">
                          <a href="{{route('userprofilename',[$item->poster_name])}}">{{$item->poster_name}}</a>
                        </span>
                        <span class="description">{{$item->caption}}</span>
                      </div>
                      <!-- /.user-block -->
                      <div class="video-div" style="width:100%;height:auto;"> 
                      <video controls class="video-controls" style="width:100%;height:auto;">
                       <source src="{{asset('/assets')}}/{{$item->file}}" type="video/mp4" style="width:100%;height:auto;">Your audio format is not supported</audio>

                      </div>
                         
                      <p>

                         <a href="{{'deleteVideo/'.$item->id}}" class="link-black text-sm mr-2" ><i class="fas fa-trash mr-1"></i> Delete</a>
                        
                        <span class="float-right" id="video-float-right">
                            <i class="far fa-comments mr-1"></i> Comments ({{$commentCount = \App\Models\videoComment::where('post_id',$item->id)->count();}})
                        </span>
                      </p>
                      <div class="videos-comments-div" style="margin-top:20px;width:100%;max-height:400px;overflow-y:scroll;">
                    
                      @foreach($videoComments as $comment)

                         @if($comment->post_id == $item->id)

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
                        <input  type="hidden"  value="{{$item->id}}" name="postId">
                        <input class="form-control form-control-sm" type="text" placeholder="Type a comment" name="commentBody" required>
                        <button type="submit" class="input-group-text" >Send</button>

                      </form>
                    </div>
                    @endforeach

                    </div>

                  <div class="tab-pane" id="images">
                  <button type="button" class="btn btn-success" style="margin:10px;" id="add-image-btn" >Add Image</button>

                  <div class="add-image-div" style="display:none">
                    <form action="{{route('ProfileImageRoute')}}" method="post" enctype="multipart/form-data">
                      @csrf
                      <div class="card-body">
                        <div class="form-group">
                          <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Add Caption" name="caption" required>
                        </div>
                        <div class="form-group">
                          <div class="input-group">
                          <div class="custom-file">
                              <input type="file" class="form-control" placeholder="Choose File" style="margin:5px" name="file" >
                          </div>
                            <div class="input-group-append">
                              <button type="submit" class="input-group-text" id="upload-media-btn">Upload</button>
                            </div>
                          </div>
                        </div>
                      </div>
                    </form>
                    </div>

                    @foreach($userImage as $item)
                    <div class="post">
                      <div class="user-block">
                        @if(Auth::user()->profile_picture)
                          <img class="img-circle img-bordered-sm" src="{{asset('/assets')}}/{{Auth::user()->profile_picture}}" alt="User Image">
                        @else
                        <img class="img-circle img-bordered-sm" src="{{asset('/dist/img/user.jpg')}}" alt="User Image">
                        @endif
                        <span class="username">
                          <a href="{{route('userprofilename',[$item->poster_name])}}">{{$item->poster_name}}</a>
                        </span>
                        <span class="description">{{$item->caption}}</span>
                      </div>
                      <!-- /.user-block -->
                      <div class="row mb-3" style="" >
                      <img class="img-fluid" src="{{asset('/assets')}}/{{$item->file}}" alt="Photo" style="width:100%;height:100%;">

                      </div>
                      <p>
                         <a href="{{'deleteImage/'.$item->id}}" class="link-black text-sm mr-2" ><i class="fas fa-trash mr-1"></i> Delete</a>
                         <span class="float-right" id="images-float-right">
                            <i class="far fa-comments mr-1"></i> Comments({{$commentCount = \App\Models\imageComment::where('post_id',$item->id)->count();}})
                        </span>
                      </p>
                      <div class="images-comments-div" style="margin-top:20px;width:100%;max-height:400px;overflow-y:scroll;">
                      @foreach($imageComments as $comment)

                         @if($comment->post_id == $item->id)

                            <div class="user-block">
                              @if($comment->sender_picture)
                               <img class="img-circle img-bordered-sm" src="{{asset('/assets')}}/{{$comment->sender_picture}}" alt="user image">
                              @else
                              <img class="img-circle img-bordered-sm" src="{{asset('/assets')}}/{{$comment->sender_picture}}" alt="user image">
                              @endif
                               <span class="username">
                                <a href="{{route('userprofilename',[$comment->sender_name])}}">{{$comment->sender_name}}</a>
                              </span>
                              <span class="description">{{$comment->created_at}}</span>
                            </div>
                            <p>
                            {{$comment->comment_body}} <br>
                            <a href="{{'deleteImageComment/'.$comment->id}}" class="link-black text-sm mr-2" ><i class="fas fa-trash mr-1"></i> Delete</a>
                            </p>

                            
                          @endif

                      @endforeach
                      </div>

                      <form action="{{route('ProfileImageComment')}}" method="post"  enctype="multipart/form-data">
                        @csrf
                      <input  type="hidden"  value="{{$item->id}}" name="postId">
                       
                      <input class="form-control form-control-sm" type="text" placeholder="Type a comment" name="commentBody" required>
                      <button type="submit" class="input-group-text" >Send</button>

                      </form>
                    </div>

                    @endforeach


                   </div>
                    <!-- </div> -->

                    <!-- /.post -->
                  
                  <!-- /.tab-pane -->
                  <div class="tab-pane" id="posts">
                  <button type="button" class="btn btn-success" style="margin:10px;" id="add-post-btn">Add Post</button>


                  <div class="add-post-div" style="display:none">
                      <form action="{{route('ProfilePostRoute')}}" method="post">
                        @csrf
                        <div class="card-body">
                          <div class="form-group">
                          <textarea class="form-control" rows="3" placeholder="Type Your Post" name="post" required></textarea>
                          </div>
                          
                          <div class="form-group">
                            <div class="input-group">
                             
                              <div class="input-group-append">
                                <button class="input-group-text" id="upload-post-btn">Upload</button>
                              </div>
                            </div>
                          </div>
                          
                        </div>
                      </form>
                  </div>
                    <!-- The timeline -->
                   

                    <!-- Post -->
                    @foreach($userPost as $item)

                    <div class="post">
                      <div class="user-block">
                        @if(Auth::user()->profile_picture)
                          <img class="img-circle img-bordered-sm" src="{{asset('/assets')}}/{{Auth::user()->profile_picture}}" alt="user image">
                        @else
                        <img class="img-circle img-bordered-sm" src="{{asset('/dist/img/user.jpg')}}" alt="user image">
                        @endif
                          <span class="username">
                          <a href="{{route('userprofilename',[$item->poster_name])}}">{{$item->poster_name}}</a>
                          <a href="#" class="float-right btn-tool"><i class="fas fa-times"></i></a>
                        </span>
                        <span class="description">{{$item->created_at}}</span>
                      </div>
                      <!-- /.user-block -->
                      <p>
                        {{$item->post}}
                      </p>

                      <p>
                        <a href="{{'deletePost/'.$item->id}}" class="link-black text-sm mr-2" ><i class="fas fa-trash mr-1"></i> Delete</a>
                        <span class="float-right" id="posts-float-right">
                            <i class="far fa-comments mr-1"></i> Comments ({{$commentCount = \App\Models\postComment::where('post_id',$item->id)->count();}})
                        </span>
                      </p>
                      <div class="posts-comments-div" style="margin-top:20px;width:100%;max-height:300px;overflow-y:scroll;">
                      
                      @foreach($postComments as $comment)

                         @if($comment->post_id == $item->id)

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
                            <a href="{{'deletePostComment/'.$comment->id}}" class="link-black text-sm mr-2" ><i class="fas fa-trash mr-1"></i> Delete</a>

                            
                            </p>
                           

                          @endif

                      @endforeach
                      </div>
                      <form action="{{route('ProfilePostComment')}}" method="post">
                          @csrf
                        <input  type="hidden"  value="{{$item->id}}" name="postId">
                       
                        <input class="form-control form-control-sm" type="text" placeholder="Type a comment" name="commentBody" required>
                        <button type="submit" class="input-group-text" >Send</button>

                      </form>
                      
                    </div>

                    @endforeach
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
                            {{Auth::user()->education}}
                            </p>

                            <hr>

                            <strong><i class="fas fa-map-marker-alt mr-1"></i> Location</strong>

                            <p class="text-muted">{{Auth::user()->location}}</p>

                            <hr>

                            <strong><i class="fas fa-pencil-alt mr-1"></i> Skills</strong>

                            <p class="text-muted">
                            <span class="tag tag-danger">{{Auth::user()->skills}}</span>
                            
                            </p>

                            <hr>

                            <strong><i class="far fa-file-alt mr-1"></i> Hobbies</strong>

                            <p class="text-muted">{{Auth::user()->hobbies}}</p>


                             <hr>

                             <strong><i class="far fa-file-alt mr-1"></i> Notes</strong>

                            <p class="text-muted">{{Auth::user()->notes}}</p>
                            <a href="editabout/{{$userId}}" class="link-black text-sm"><i class="fas fa-edit mr-1"></i> Edit</a>

                        </div>
                        <!-- /.card-body -->
                        </div>
                  </div>
                  <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
              </div>
              <!-- /.card-body -->
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





</body>
</html>
