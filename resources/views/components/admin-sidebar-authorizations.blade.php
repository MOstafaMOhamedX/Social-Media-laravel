<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#Authorizations" aria-expanded="true"
        aria-controls="Authorizations">
        <i class="fas fa-fw fa-cog"></i>
        <span>Authorizations</span>
    </a>
    <div id="Authorizations" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Authorizations</h6>
            @if (auth()
        ->user()
        ->hasRole(['administrator']))
                <a class="collapse-item" href="{{ route('roles.index') }}">Roles</a>
            @endif
            <a class="collapse-item" href="{{ route('Permissions.index') }}">Permission</a>
        </div>
    </div>
</li>
