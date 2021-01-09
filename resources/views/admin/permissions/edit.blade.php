<x-admin-master>
    @section('content')
        <div class="row">
            <h1>Permissions</h1>
        </div>
        <div class="row">
            <div class="col-5">
                @if (Session('message'))
                    <div class="alert alert-primary  alert-dismissible fade show" role="alert">
                        {{ Session::get('message') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
                <form action="{{ route('Permission.update', $Permission) }}" method="POST" style="width: 100%">
                    @csrf
                    @method('PATCH')
                    <label for="validationDefault03">Name</label>
                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                        id="validationDefault03" placeholder="Permission Name" value="{{ $Permission->name }}">
                    @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                    <button class="btn btn-info col" type="submit" style="margin-top: 20px">Edit Permission</button>
                </form>
            </div>
            <div class="offset-1 col-6">
                <table class="table table-striped" id="dataTable">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col" class="text-center">#</th>
                            <th scope="col" class="text-center">ID</th>
                            <th scope="col" class="text-center">Name</th>
                            <th scope="col" class="text-center">Control</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($roles as $role)

                            <tr>
                                <td scope="col" class="text-center">
                                    <input type="checkbox" disabled @foreach ($Permission->roles as $Permission_role)
                                    @if ($Permission_role->name == $role->name)
                                        checked
                                    @endif
                        @endforeach >
                        </td>
                        <th scope="row" class="text-center">{{ $role->id }}</th>
                        <td scope="row" class="text-center"><a href="{{ route('role.edit', $role) }}"> {{ $role->name }}</a>
                        </td>
                        <td>
                            <div class="row">
                                <form action="{{ route('Permission.role.attatch', $Permission) }}" method="POST"
                                    style="width: 50%">
                                    @csrf
                                    @method('put')
                                    <input type="hidden" name="role" value="{{ $role->id }}">
                                    <button type="submit" class="btn btn-outline-success offset-1 col-10" @if ($Permission->roles->contains($role))
                                        disabled
                                        @endif>attatch</button>
                                </form>
                                <form action="{{ route('Permission.role.detatch', $Permission) }}" method="POST"
                                    style="width: 50%">
                                    @csrf
                                    @method('put')
                                    <input type="hidden" name="role" value="{{ $role->id }}">
                                    <button type="submit" class="btn btn-outline-danger offset-1 col-10" @if (!$Permission->roles->contains($role))
                                        disabled
                                        @endif>detatch</button>
                                </form>
                            </div>
                        </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endsection

</x-admin-master>
