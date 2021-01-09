<x-admin-master>
    @section('content')
        <h1>Comments</h1>
        @if (Session('message'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Hola!</strong> {{ Session::get('message') }}
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
                                <th scope="col" class="text-center">Post</th>
                                <th scope="col" class="text-center">Comment</th>
                                <th scope="col" class="text-center">Created</th>
                                <th scope="col" class="text-center">Control</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($Comments as $Comment)
                                <tr>
                                    <th scope="row" class="text-center">{{ $Comment->id }}</th>
                                    <td class="text-center">{{ $Comment->post->title }}</td>
                                    <td class="text-center">{{ Str::limit($Comment->comment, 25, '.....') }}</td>
                                    <td class="text-center">{{ $Comment->created_at }}</td>
                                    <td class="text-center" style="width: 20%">
                                        @if ($Comment->approval == 0)
                                            <div class="row">
                                                <form method="POST" style="display: contents; width: 100%"
                                                    action="{{ route('comment.approve') }}">
                                                    @csrf
                                                    @method('PATCH')
                                                    <input type="hidden" value="{{ $Comment->id }}" name="id">
                                                    <button type="submit" class="btn btn-outline-info"
                                                        style="width: 100%">Approve</button>
                                                </form>
                                            </div>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        @foreach ($Comments as $Comment)
            @if ($Comment->approval == 0)
                <div class="row">
                    <form method="POST" style="display: contents; width: 100%" action="{{ route('comment.approveAll') }}">
                        @csrf
                        @method('PATCH')
                        <button type="submit" class="btn btn-outline-info offset-9 col-3"
                            style="width: 100% ; height: 50%;">Approve All</button>
                    </form>
                </div>
            @endif
        @endforeach
    @endsection
    @section('scripts')

        <!-- Page level plugins -->
        <script src="{{ asset('vendor/datatables/jquery.dataTables.min.js') }}"></script>
        <script src="{{ asset('vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>

        <!-- Page level custom scripts -->
        <script src="{{ asset('js/demo/datatables-demo.js') }}"></script>
    @endsection
</x-admin-master>
