<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#Comments" aria-expanded="true"
        aria-controls="Comments">
        <i class="fas fa-fw fa-cog"></i>
        <span>Comments</span>
    </a>
    <div id="Comments" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Comments</h6>
            @if (auth()
        ->user()
        ->hasRole(['administrator']))
                <a class="collapse-item" href="{{ route('comments.index') }}">All Comments</a>
            @endif
        </div>
    </div>
</li>
