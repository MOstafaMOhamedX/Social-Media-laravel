<x-admin-master>
  @section('content')
      <h1>Create </h1>
      @if (Session('message'))
      <div class="alert alert-info">{{ Session::get('message') }}</div>
      @endif
      @if ($errors->any())
        @foreach ($errors->all() as $error)
            <div class="alert alert-danger">{{ $error }}</div>
        @endforeach
      @endif
      <form method="post" action="{{ route('post.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
          <label for="exampleFormControlInput1">Title</label>
          <input type="text" name="title" class="form-control" id="exampleFormControlInput1" placeholder="Enter Title" value="{{ old('title') }}">
        </div>
        <div class="input-group mb-3">
          <div class="custom-file">
            <input type="file" class="form-control-file" id="inputGroupFile02" name="image" style="opacity: 1" value="old('image')">
          </div>
        </div>        
        <div class="form-group">
          <label for="exampleFormControlTextarea1">Body</label>
          <textarea class="form-control" id="exampleFormControlTextarea1" rows="15" rows="10" name="body" placeholder="Post Description"></textarea>
        </div>
        <button type="submit" class="btn btn-dark">Add New Post</button>
      </form>
  @endsection
</x-admin-master>