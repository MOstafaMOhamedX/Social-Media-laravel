<x-admin-master>
    @section('content')
        <div class="row">
            <h1>Permissions</h1>
        </div>
        <div class="row">
            <div class="col-5">
                @if (Session('message'))
                    <div class="alert alert-info alert-dismissible fade show" role="alert">
                        {{ Session::get('message') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
                @if (Session('message-delete'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{ Session::get('message-delete') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
                <form action="{{ route('Permission.store') }}" method="POST" style="width: 100%">
                    @csrf
                    <label for="validationDefault03">Name</label>
                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                        id="validationDefault03" placeholder="Permission Name">
                    @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                    <button class="btn btn-info col" type="submit" style="margin-top: 20px">New Permission</button>
                </form>
            </div>
            <div class="offset-1 col-6">
                <div class="card shadow mb-4">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped" id="dataTable">
                                <thead class="thead-dark">
                                    <tr>
                                        <th scope="col" class="text-center">ID</th>
                                        <th scope="col" class="text-center">Name</th>
                                        <th scope="col" class="text-center">Slug</th>
                                        <th scope="col" class="text-center">Control</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($Permissions as $Permission)
                                        <tr>
                                            <th scope="row" class="text-center">{{ $Permission->id }}</th>
                                            <td scope="row" class="text-center"><a
                                                    href="{{ route('Permission.edit', $Permission) }}">{{ $Permission->name }}</a>
                                            </td>
                                            <td scope="row" class="text-center">{{ $Permission->name }}</td>
                                            <td>

                                                <div class="row">
                                                    <form method="post"
                                                        action="{{ route('Permission.destroy', $Permission) }}"
                                                        style="width: 100%">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit"
                                                            class="btn btn-danger btn-circle btn-md offset-4">
                                                            <i class="fas fa-trash"></i>
                                                        </button>
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
    @endsection
</x-admin-master>
