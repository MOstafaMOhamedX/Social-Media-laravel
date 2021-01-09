<x-admin-master>
    @section('content')
    @section('css')
        <link href="{{ asset('css/profile.css') }}" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
    @endsection
    @if (Session('message-updated'))
        <div class="alert alert-info alert-dismissible fade show" role="alert">
            {{ Session::get('message-updated') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @elseif (Session('message'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ Session::get('message') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    <div class="main-content">
        <!-- Page content -->
        <div class="container-fluid mt--7">
            <div class="row">
                <div class="col ">
                    <div class="card bg-secondary shadow">
                        <div class="card-body" style="background: white;">
                            <form method="POST" action="{{ route('admin.user.profile.update', $user) }}"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="card-header bg-white border-0">
                                    <div class="row justify-content-center">
                                        <div class="col-md-4">
                                            <div class="profile-img">
                                                <img src="{{ asset('images/' . $user->image) }}"
                                                    class="rounded mx-auto d-block rounded-circle"
                                                    id="profile-img-tag" />
                                                <div class="file btn btn-lg btn-primary">
                                                    Change Photo
                                                    <input type="file" name="image" id="profile-img" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row align-items-center">
                                        <div class="col-8">
                                            <h3 class="mb-0">Profile Information</h3>
                                        </div>
                                        <div class="col-4 text-right">
                                            <button type="submit" href="" class="btn btn-sm btn-primary">Edit
                                                Profile</button>
                                        </div>
                                    </div>
                                </div>
                                <h6 class="heading-small text-muted mb-4">User information</h6>
                                <div class="pl-lg-4">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group focused">
                                                <label class="form-control-label" for="input-username">Username</label>
                                                <input name="name" type="text" id="input-username"
                                                    class="form-control form-control-alternative @error('name') is-invalid @enderror"
                                                    placeholder="Username" value="{{ $user->name }}">
                                                @error('name')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label class="form-control-label" for="input-email">Email
                                                    address</label>
                                                <input name="email" type="email" id="input-email"
                                                    class="form-control form-control-alternative @error('name') is-invalid @enderror"
                                                    value="{{ $user->email }}" placeholder="jesse@example.com">
                                                @error('email')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group focused">
                                                <label class="form-control-label" for="input-first-name">First
                                                    name</label>
                                                <input name="First_name" type="text" id="input-first-name"
                                                    class="form-control form-control-alternative"
                                                    value="{{ $user->First_name }}" placeholder="First name"
                                                    value="Lucky">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group focused">
                                                <label class="form-control-label" for="input-last-name">Last
                                                    name</label>
                                                <input name="Last_name" type="text" id="input-last-name"
                                                    class="form-control form-control-alternative"
                                                    value="{{ $user->Last_name }}" placeholder="Last name"
                                                    value="Jesse">
                                            </div>
                                        </div>
                                    </div>
                                    <hr class="my-4">
                                    <!-- Address -->
                                    <h6 class="heading-small text-muted mb-4">Password information</h6>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group focused">
                                                <label class="form-control-label"
                                                    for="input-first-name">Password</label>
                                                <input name="password1" type="password" id="input-first-name"
                                                    class="form-control form-control-alternative @error('password1') is-invalid @enderror">
                                                @error('password1')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group focused">
                                                <label class="form-control-label" for="input-last-name">Confirm
                                                    Password</label>
                                                <input name="password2" type="password" id="input-last-name"
                                                    class="form-control form-control-alternative @error('password2') is-invalid @enderror">
                                                @error('password2')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <hr class="my-4">
                                <!-- Address -->
                                <div class="pl-lg-4">
                                    <h6 class="heading-small text-muted mb-4">Contact information</h6>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group focused">
                                                <label class="form-control-label" for="input-address">Address</label>
                                                <input name="Address" id="input-address"
                                                    class="form-control form-control-alternative"
                                                    value="{{ $user->Address }}" placeholder="Home Address"
                                                    value="Bld Mihail Kogalniceanu, nr. 8 Bl 1, Sc 1, Ap 09"
                                                    type="text">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <div class="form-group focused">
                                                <label class="form-control-label" for="input-city">City</label>
                                                <input name="City" type="text" id="input-city"
                                                    class="form-control form-control-alternative"
                                                    value="{{ $user->City }}" placeholder="City" value="New York">
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-group focused">
                                                <label class="form-control-label" for="input-country">Country</label>
                                                <input name="Country" type="text" id="input-country"
                                                    class="form-control form-control-alternative"
                                                    value="{{ $user->Country }}" placeholder="Country"
                                                    value="United States">
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <label class="form-control-label" for="input-country">Postal
                                                    code</label>
                                                <input name="Postal_code" type="text" id="input-postal-code"
                                                    class="form-control form-control-alternative"
                                                    value="{{ $user->Postal_code }}" placeholder="Postal code">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <hr class="my-4">
                                <!-- Description -->
                                <div class="pl-lg-4">
                                    <h6 class="heading-small text-muted mb-4">About me</h6>
                                    <div class="form-group focused">
                                        <label>About Me</label>
                                        <textarea name="About_Me" rows="4" class="form-control form-control-alternative"
                                            placeholder="A few words about you ...">{{ $user->About_Me }}</textarea>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    @if (auth()
        ->user()
        ->hasRole(['administrator']))
        <div class="container-fluid mt--7">
            <div class="row">
                <div class="col">
                    <div class="card bg-secondary shadow">
                        <div class="card-body" style="background: white;">
                            <table class="table table-striped" id="dataTable">
                                <thead class="thead-dark">
                                    <tr>
                                        <th scope="col" class="text-center"></th>
                                        <th scope="col" class="text-center">ID</th>
                                        <th scope="col" class="text-center">Name</th>
                                        <th scope="col" class="text-center">Control</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($roles as $role)
                                        <tr>
                                            <td>
                                                <input type="checkbox" disabled @foreach ($user->roles as $user_role)
                                                @if ($user_role->name == $role->name)
                                                    checked
                                                @endif
                                    @endforeach >
                                    </td>
                                    <td scope="row" class="text-center">{{ $role->id }}</td>
                                    <td class="text-center">{{ $role->name }}</td>
                                    <td class="text-center">
                                        <div class="row">
                                            <form action="{{ route('admin.user.attach', $user) }}" method="POST"
                                                style="width: 50%">
                                                @csrf
                                                @method('put')
                                                <input type="hidden" name="role" value="{{ $role->id }}">
                                                <button type="submit" class="btn btn-outline-success offset-1 col-10"
                                                    style="margin-right: 10PX;" @if ($user->roles->contains($role))
                                                    disabled
    @endif
    >Attatch</button>
    </form>
    <form action="{{ route('admin.user.detatch', $user) }}" method="POST" style="width: 50%">
        @csrf
        @method('put')
        <input type="hidden" name="role" value="{{ $role->id }}">
        <button type="submit" class="btn btn-outline-danger offset-1 col-10" @if (!$user->roles->contains($role))
            disabled
            @endif
            >Detatch</button>
    </form>
    </form>
    </div>
    </td>
    </tr>
    @endforeach
    </tbody>
    </table>
    </div>
    </div>
    </div>
    </div>
    </div>
    @endif


    @section('scripts')

        <!-- Page level plugins -->
        <script src="{{ asset('vendor/datatables/jquery.dataTables.min.js') }}"></script>
        <script src="{{ asset('vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>

        <script src="{{ asset('js/project.js') }}"></script>
        <!-- Page level custom scripts -->
        {{-- <script src="{{ asset('js/demo/datatables-demo.js') }}"></script>
        --}}
    @endsection

@endsection
</x-admin-master>
