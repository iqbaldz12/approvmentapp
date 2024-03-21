<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tasks</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
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
                        @if(auth()->user()->role == 'employee')
                        <!-- New Task button for employees -->
                        <a href="{{ route('tasks.create') }}" class="btn btn-md btn-success mb-3">New Task</a>
                        @endif
                        <!-- Task table -->
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
                                        <td class="text-center">{{ $loop->iteration }}</td>
                                        <td>{{ $task->tasks_name }}</td>
                                        <td>
                                            <a href="{{ url('/storage/tasks/' . $task->file) }}" download=""
                                                target="_blank">file</a>
                                        </td>
                                        <td>
                                            @if ($task->approvement()->latest()->first() && $task->approvement()->latest()->first()->status)
                                                @if ($task->approvement()->latest()->first()->status == 'approved')
                                                    <strong style="color: #0c82d6">{{ ucfirst( $task->approvement()->latest()->first()->status) }}</strong><strong> by {{ ucfirst($task->user->username) }}</strong>
                                                @elseif ($task->approvement()->latest()->first()->status == 'rejected')
                                                    <strong style="color: #d27070">{{ ucfirst($task->approvement()->latest()->first()->status) }}</strong><strong> by {{ ucfirst($task->user->username) }}</strong>
                                                @elseif ($task->approvement()->latest()->first()->status == 'finished')
                                                    <strong style="color: #7cd274">{{ ucfirst( $task->approvement()->latest()->first()->status) }}</strong><strong> by {{ ucfirst($task->user->username) }}</strong>
                                                @else
                                                    <strong>{{ ucfirst( $task->approvement()->latest()->first()->status) }}<strong> by null</strong></strong>
                                                @endif
                                            @else
                                                <strong style="color: #636363">New</strong>
                                            @endif
                                        </td>

                                        <td class="text-center">
                                            <form onsubmit="return confirm('Apakah Anda Yakin ?');"
                                                action="{{ route('tasks.destroy', $task->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                @if(auth()->user()->role == 'employee')
                                                <!-- Delete button for employees -->
                                                <button type="submit" class="btn btn-sm btn-danger">HAPUS</button>
                                                @endif
                                            </form>
                                            @if(auth()->user()->role == 'manager' || auth()->user()->role == 'director')
                                            <!-- Modal for Approvement (for managers and directors) -->
                                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Approvement</button>
                                            @endif
                                            <a href="{{ route('tasks.show', $task->id) }}" class="btn btn-sm btn-info">SHOW</a>
                                            @if(auth()->user()->role == 'employee')
                                            <!-- Edit button for employees -->
                                            <a href="{{ route('tasks.edit', $task->id) }}"
                                                class="btn btn-sm btn-warning">EDIT</a>
                                            @endif
                                        </td>
                                    </tr>
                                @empty
                                    <div class="alert alert-danger">
                                        Data Task belum Tersedia.
                                    </div>
                                @endforelse
                            </tbody>
                        </table>
                        <!-- Pagination -->
                        {{ $tasks->links() }}
                    </div>
                </div>
            </div>
        </div>
        <!-- Back button -->
        <a class="btn btn-primary" href="{{ url('/') }}" role="button">Back</a>
    </div>

    <!-- JavaScript libraries -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <!-- Toastr script -->
    <script>
        // Toastr message based on session
        @if (session()->has('success'))
            toastr.success('{{ session('success') }}', 'Success!');
        @elseif (session()->has('error'))
            toastr.error('{{ session('error') }}', 'Error!');
        @endif
    </script>

</body>

</html>
