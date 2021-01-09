<x-admin-master>
  @section('content')
  
  @section('css')
    <link href="{{asset('css/profile.css')}}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
  @endsection
      <h1>Edit Post </h1>
      @if (Session('message'))
      <div class="alert alert-info">{{ Session::get('message') }}</div>
      @endif
      @if ($errors->any())
        @foreach ($errors->all() as $error)
            <div class="alert alert-danger">{{ $error }}</div>
        @endforeach
      @endif
      <form method="post" action="{{ route('post.update' , $post->id) }}" enctype="multipart/form-data">
        @csrf
        @method('PATCH')
        <div class="form-group">
          <label for="exampleFormControlInput1">Title</label>
          <input type="text" name="title" class="form-control" id="exampleFormControlInput1" placeholder="Enter Title" value="{{ $post->title }}">
        </div>
        <div class="row justify-content-center">
          <div class="col">
            <div class="profile-img">
              <img src="{{ $post->post_image }}" class="rounded mx-auto d-block " id="profile-img-tag" />
                <div class="file btn btn-lg btn-primary">
                    Change Photo
                    <input type="file" name="image" id="profile-img" style="width: 100%"/>
                </div>  
            </div>
          </div>
        </div>     
        <div class="form-group">
          <label for="exampleFormControlTextarea1">Body</label>
          <textarea class="form-control" id="exampleFormControlTextarea1" rows="15" rows="10" name="body" placeholder="Post Description">{{ $post->body }}
          </textarea>
        </div>
        <button type="submit" class="btn btn-secondary btn-lg">Edit Post</button>
      </form>
      @section('scripts')
            
      <!-- Page level plugins -->
      <script src="{{ asset('vendor/datatables/jquery.dataTables.min.js') }}"></script>
      <script src="{{ asset('vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>

      <script src="{{asset('js/project.js')}}"></script>
    @endsection
  @endsection
</x-admin-master>