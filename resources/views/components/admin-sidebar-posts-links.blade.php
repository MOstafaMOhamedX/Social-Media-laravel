<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#posts" aria-expanded="true"
        aria-controls="posts">
        <i class="fas fa-fw fa-cog"></i>
        <span>Posts</span>
    </a>
    <div id="posts" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Posts</h6>
            @if (auth()
        ->user()
        ->hasRole(['administrator']))
                <a class="collapse-item" href="{{ route('posts.index') }}">All Posts</a>
            @endif
            <a class="collapse-item" href="{{ route('post.create') }}">Create Post</a>
        </div>
    </div>
</li>
