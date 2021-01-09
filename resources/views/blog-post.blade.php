<x-home-master>
    @section('content')
    <!-- Title -->
    <h1 class="mt-4">{{ $post->title }}</h1>

    <!-- Author -->
    <p class="lead">
        by
        <a href="#">{{ $post->user->name }}</a>
    </p>

    <hr>

    <!-- Date/Time -->
    <p>Posted on {{ $post->created_at->diffForHumans() }}</p>
    @can('view', $post)
    <div class="row">
        <a type="submit" class="btn btn-outline-success offset-2  col-4"
            href="{{ route('post.edit', $post->id) }}">Edit</a>
        <form method="post" action="{{ route('post.destroy', $post->id) }}" style="display: contents;">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-outline-danger offset-1 col-4">Delete</button>
        </form>
    </div>
    @endcan

    <hr>

    <!-- Preview Image -->
    <img class="card-img-top" src="{{ asset($post->post_image) }}" alt="Card image cap">

    <hr>

    <!-- Post Content -->
    {{ $post->body }}
    <hr>

    @if (Session('message'))
    <div class="alert alert-info">{{ Session::get('message') }}</div>
    @endif
    @if ($errors->any())
    @foreach ($errors->all() as $error)
    <div class="alert alert-danger">{{ $error }}</div>
    @endforeach
    @endif

    <!-- Comments Form -->
    <div class="card my-4">
        <h5 class="card-header">Leave a Comment:</h5>
        <div class="card-body">
            <form method="post" action="{{ route('comment.store') }}">
                @csrf
                <div class="form-group">
                    <input type="hidden" value="{{ $post->id }}" name="post_id">
                    <input type="hidden" value="0" name="parent">
                    <textarea class="form-control" rows="3" name="comment"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>



    @foreach ($comments as $parent)
    @if ($parent->parent === 0)
    <!-- Comment with nested comments -->
    <div class="media mb-4">
        <img class="d-flex mr-3 rounded-circle" src="{{ asset('images/'.$parent->user->image) }}" style="width: 50px"
            alt="">
        <div class="media-body">
            <h5 class="mt-0"><b style="color: red">{{ $parent->user->name }}</b></h5>
            {{ $parent->comment }}
            <div class="container">
                <div class="row">
                    <div class="col link">
                        <p>{{ $parent->created_at->diffForHumans()  }}</p>
                    </div>
                </div>
            </div>
            @foreach ($comments as $chiled)
            @if ($chiled->parent == $parent->id)
            <div class="media mt-4">
                <img class="d-flex mr-3 rounded-circle" src="{{ asset('images/'.$chiled->user->image) }}"
                    style="width: 50px" alt="">
                <div class="media-body">
                    <h5 class="mt-0"><b style="color: red">{{ $chiled->user->name }}</b></h5>
                    {{ $chiled->comment }}
                    <p>{{ $chiled->created_at->diffForHumans()  }}</p>
                </div>
            </div>
            @endif
            @endforeach
            <div class="d-none d-block">
                <!-- Comments Form -->
                <form method="post" action="{{ route('comment.store') }}" style="width: 100%; border: none">
                    @csrf
                    <input type="hidden" value="{{ $post->id }}" name="post_id">
                    <input type="hidden" value="{{ $parent->id }}" name="parent">
                    <input type="text" name="comment" class="form-control col-9" style="float: left">
                    <button type="submit" class="btn btn-primary offset-1 col-2">Reply</button>
                </form>
            </div>
        </div>
    </div>
    @endif
    @endforeach
    @endsection
</x-home-master>