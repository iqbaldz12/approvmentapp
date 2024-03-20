    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Tasks</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    </head>

    <body style="background: lightgray">

        <div class="container mt-5">
            <div class="row">
                <div class="col-md-12">
                    <div>
                        <h3 class="text-center my-4">List Task</h3>
                        <hr>
                    </div>
                    <div class="card border-0 shadow-sm rounded">
                        <div class="card-body">
                            <a href="{{ route('tasks.create') }}" class="btn btn-md btn-success mb-3">New Task</a>
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Tasks Name</th>
                                        <th scope="col">Attachment</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($tasks as $task)
                                        <tr>
                                            <td class="text-center">
                                                {{ $loop->iteration }}
                                            </td>
                                            <td>{{ $task->tasks_name }}</td>
                                            <td>
                                                <a href="{{ url('/storage/tasks/' . $task->file) }}" download=""
                                                    target="_blank">file</a>
                                            </td>
                                            <td>
                                                @if ($task->approvement()->latest()->first() && $task->approvement()->latest()->first()->status)
                                                        @if ($task->status == 'approved')
                                                            <strong style="color: #0c82d6">{{ ucfirst($task->status) }}</strong><strong> by {{ ucfirst($task->user->username) }}</strong>
                                                        @elseif ($task->status == 'rejected')
                                                            <strong style="color: #d27070">{{ ucfirst($task->status) }}</strong><strong> by {{ ucfirst($task->user->username) }}</strong>
                                                        @elseif ($task->status == 'finished')
                                                            <strong style="color: #7cd274">{{ ucfirst($task->status) }}</strong><strong> by {{ ucfirst($task->user->username) }}</strong>
                                                        @else
                                                            <strong>{{ ucfirst($task->status) }}<strong> null</strong></strong>
                                                        @endif
                                                @else
                                                    <strong style="color: #636363">New</strong>
                                                @endif
                                            </td>


                                            {{-- <td>{{ @$task->status }}</td> --}}
                                            {{-- {{ route('tasks.approvement', $task->id) }} --}}
                                            <td class="text-center">
                                                <form onsubmit="return confirm('Apakah Anda Yakin ?');"
                                                    action="{{ route('tasks.destroy', $task->id) }}" method="POST">
                                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">approvement </button>
                                                    <a href="{{ route('tasks.show', $task->id) }}" class="btn btn-sm btn-info">SHOW</a>
                                                    <a href="{{ route('tasks.edit', $task->id) }}"
                                                        class="btn btn-sm btn-warning">EDIT</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-danger">HAPUS</button>
                                                </form>

                                                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="approvement,{{ $task->id }}" aria-hidden="true">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <div class="modal-header">

                                                                    <h5 class="modal-title" id="approvement,{{ $task->id }}">Approvement</h5>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <form action="{{ route('tasks.approvement', $task->id) }}" method="POST">
                                                                        @csrf
                                                                        <select class="form-control" name="status">
                                                                            <option value="">Choose Status</option>
                                                                            <option value="approved">Approved</option>
                                                                            <option value="rejected">Rejected</option>
                                                                            <option value="finished">Finished</option>
                                                                        </select>
                                                                </div>

                                                                <div class="modal-footer">

                                                                    <button type="submit" class="btn btn-primary">Save changes</button>
                                                                    </form>
                                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                            </td>
                                        </tr>
                                    @empty
                                        <div class="alert alert-danger">
                                            Data Task belum Tersedia.
                                        </div>
                                    @endforelse
                                </tbody>
                            </table>
                            {{ $tasks->links() }}
                        </div>
                    </div>
                </div>

            </div>
            <a class="btn btn-primary" href="{{ url('/') }}" role="button">Back</a>
        </div>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

        <script>
            //message with toastr
            @if (session()->has('success'))

                toastr.success('{{ session('success') }}', 'BERHASIL!');
            @elseif (session()->has('error'))

                toastr.error('{{ session('error') }}', 'GAGAL!');
            @endif
        </script>

    </body>

    </html>
