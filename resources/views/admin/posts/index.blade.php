<x-admin-master>
    @section('content')
        <h1>Posts</h1>

        @if (Session('message'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ Session::get('message') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @elseif (Session('message-updated'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Hola!</strong> {{ Session::get('message-updated') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif

        <div class="card shadow mb-4">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-sm " id="dataTable">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col" class="text-center">ID</th>
                                <th scope="col" class="text-center">User</th>
                                <th scope="col" class="text-center">Title</th>
                                <th scope="col" class="text-center">Created</th>
                                <th scope="col" class="text-center">Control</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($posts as $post)
                                <tr>
                                    <th scope="row" class="text-center">{{ $post->id }}</th>
                                    <td class="text-center">{{ $post->user->name }}</td>
                                    <td class="text-center"><a
                                            href="{{ route('post', $post->id) }}">{{ Str::limit($post->title, 25, '.....') }}</a>
                                    </td>
                                    <td class="text-center">{{ $post->created_at }}</td>
                                    <td class="text-center" style="width: 20%">
                                        <div class="row">
                                            {{-- @can('view', $post)
                                            --}}
                                            <a href="{{ route('post.edit', $post->id) }}"
                                                class="btn btn-success btn-circle btn-md offset-3">
                                                <i class="fas fa-check"></i>
                                            </a>
                                            <form method="post" action="{{ route('post.destroy', $post->id) }}"
                                                style="display: contents;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-circle btn-md offset-2">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </form>
                                            {{-- @endcan --}}
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    @endsection
    @section('scripts')

        <!-- Page level plugins -->
        <script src="{{ asset('vendor/datatables/jquery.dataTables.min.js') }}"></script>
        <script src="{{ asset('vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>

        <!-- Page level custom scripts -->
        <script src="{{ asset('js/demo/datatables-demo.js') }}"></script>
    @endsection
</x-admin-master>
