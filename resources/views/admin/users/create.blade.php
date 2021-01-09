<x-admin-master>
  @section('content')
      @section('css')
        <link href="{{asset('css/profile.css')}}" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
      @endsection
      @if (Session('message-updated'))
      <div class="alert alert-info alert-dismissible fade show" role="alert">
        {{ Session::get('message-updated') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      @endif
      <div class="main-content">
        <!-- Page content -->
        <div class="container-fluid mt--7" >
          <div class="row">
            <div class="col ">
              <div class="card bg-secondary shadow">
                <div class="card-body" style="background: white;">
                  <form method="POST" action="{{ route('admin.users.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="card-header bg-white border-0">
                      <div class="row justify-content-center">
                        <div class="col-md-4">
                          <div class="profile-img">
                            <img src="{{ asset('images/avatar.png') }}" class="rounded mx-auto d-block rounded-circle" id="profile-img-tag" />
                              <div class="file btn btn-lg btn-primary">
                                  Change Photo
                                  <input type="file" name="image" id="profile-img"/>
                              </div>  
                          </div>
                        </div>
                      </div>
                      <div class="row align-items-center">
                        <div class="col-8">
                          <h3 class="mb-0">Profile Information</h3>
                        </div>
                        <div class="col-4 text-right">
                          <button type="submit" href="" class="btn btn-sm btn-primary">Add User</button>
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
                             placeholder="Username" value="">
                             @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>   
                             @enderror
                          </div>
                        </div>
                        <div class="col-lg-6">
                          <div class="form-group">
                            <label class="form-control-label" for="input-email">Email address</label>
                            <input name="email" type="email" id="input-email" 
                              class="form-control form-control-alternative @error('name') is-invalid @enderror" 
                              value="" placeholder="jesse@example.com">
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>   
                             @enderror
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-lg-6">
                          <div class="form-group focused">
                            <label class="form-control-label" for="input-first-name">First name</label>
                            <input name="First_name" type="text" id="input-first-name" class="form-control form-control-alternative" value="" placeholder="First name" value="Lucky">
                          </div>
                        </div>
                        <div class="col-lg-6">
                          <div class="form-group focused">
                            <label class="form-control-label" for="input-last-name">Last name</label>
                            <input name="Last_name" type="text" id="input-last-name" class="form-control form-control-alternative" value="" placeholder="Last name" value="Jesse">
                          </div>
                        </div>
                      </div>
                      <hr class="my-4">
                      <!-- Address -->
                      <h6 class="heading-small text-muted mb-4">Password information</h6>
                      <div class="row">
                        <div class="col-lg-6">
                          <div class="form-group focused">
                            <label class="form-control-label" for="input-first-name">Password</label>
                            <input name="password1" type="password" id="input-first-name" 
                            class="form-control form-control-alternative @error('password1') is-invalid @enderror">
                            @error('password1')
                                <div class="invalid-feedback">{{ $message }}</div>   
                             @enderror
                          </div>
                        </div>
                        <div class="col-lg-6">
                          <div class="form-group focused">
                            <label class="form-control-label" for="input-last-name">Confirm Password</label>
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
                            <input name="Address" id="input-address" class="form-control form-control-alternative" value="" placeholder="Home Address" value="Bld Mihail Kogalniceanu, nr. 8 Bl 1, Sc 1, Ap 09" type="text">
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-lg-4">
                          <div class="form-group focused">
                            <label class="form-control-label" for="input-city">City</label>
                            <input name="City" type="text" id="input-city" class="form-control form-control-alternative" value="" placeholder="City" value="New York">
                          </div>
                        </div>
                        <div class="col-lg-4">
                          <div class="form-group focused">
                            <label class="form-control-label" for="input-country">Country</label>
                            <input name="Country" type="text" id="input-country" class="form-control form-control-alternative" value="" placeholder="Country" value="United States">
                          </div>
                        </div>
                        <div class="col-lg-4">
                          <div class="form-group">
                            <label class="form-control-label" for="input-country">Postal code</label>
                            <input name="Postal_code" type="text" id="input-postal-code" class="form-control form-control-alternative" value="" placeholder="Postal code">
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
                        <textarea name="About_Me" rows="4" class="form-control form-control-alternative" placeholder="A few words about you ..."></textarea>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      @section('scripts')
        <script src="{{asset('js/project.js')}}"></script>
      @endsection
      
  @endsection
</x-admin-master>