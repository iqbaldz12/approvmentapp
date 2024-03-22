<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tasks</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    
    
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
          <a class="navbar-brand" href="#">Navbar</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="{{ url('/') }}">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" href="{{ url('/tasks') }}">Task</a>
              </li>
              <li class="nav-item">
                @if ( Auth::user()->role == 'admin' )
                <a  class="nav-link active"  href="{{ url('/users') }}">User</a>
                             
                 @endif
              </li>
          </div>
        </div>
      </nav>
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
                        <a href="{{ route('tasks.create') }}" class="btn btn-md btn-success mb-3">New Task</a>
                        @endif
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
                                            <a href="{{ url('/storage/tasks/' . $task->file) }}" 
                                                target="_blank">file</a>
                                        </td>
                                        <td>
                                            @if ($task->approvement()->latest()->first() && $task->approvement()->latest()->first()->status)
                                                    @if ( $task->approvement()->latest()->first()->status == 'approved')
                                                        <strong style="color: #0c82d6">{{ ucfirst( $task->approvement()->latest()->first()->status) }}</strong><strong> by {{ ucfirst($task->approvement()->latest()->first()->user->username) }}</strong>
                                                    @elseif ( $task->approvement()->latest()->first()->status == 'rejected')
                                                        <strong style="color: #d27070">{{ ucfirst($task->approvement()->latest()->first()->status) }}</strong><strong> by {{ ucfirst($task->approvement()->latest()->first()->user->username) }}</strong>
                                                    @elseif ( $task->approvement()->latest()->first()->status == 'finished')
                                                        <strong style="color: #7cd274">{{ ucfirst( $task->approvement()->latest()->first()->status) }}</strong><strong> by {{ ucfirst($task->approvement()->latest()->first()->user->username) }}</strong>
                                                    @else
                                                        <strong>{{ ucfirst( $task->approvement()->latest()->first()->status) }}<strong> null</strong></strong>
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
                                                
                                                @if(auth()->user()->role == 'manager')
                                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal{{$task->id}}">approvement </button>
                                                @if(@$task->approvement()->latest()->first()->approved_by_id ===  auth()->user()->where('role', 'employee')->first()->id && @$task->approvement()->latest()->first()->status ===  'rejected')
                                                <a href="{{ route('tasks.edit', $task->id) }}"
                                                    class="btn btn-sm btn-warning">EDIT</a>
                                                    @csrf
                                                @elseif(@$task->approvement()->latest()->first()->approved_by_id ===  auth()->user()->where('role', 'director')->first()->id && @$task->approvement()->latest()->first()->status ===  'rejected')
                                                <a href="{{ route('tasks.edit', $task->id) }}"
                                                    class="btn btn-sm btn-warning">EDIT</a>
                                                    @csrf
                                                @endif
                                                @endif
                                                @if(auth()->user()->role == 'director')
                                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal{{$task->id}}">approvement </button>
                                                @endif
                                                @if(auth()->user()->role == 'employee')
                                                @if(@$task->approvement()->latest()->first()->approved_by_id ===  auth()->user()->where('role', 'manager')->first()->id)
                                                <a href="{{ route('tasks.edit', $task->id) }}"
                                                    class="btn btn-sm btn-warning">EDIT</a>
                                                    @csrf
                                                @endif
                                                @if (!@$task->approvement()->latest()->first()->status)
                                                <a href="{{ route('tasks.edit', $task->id) }}"
                                                    class="btn btn-sm btn-warning">EDIT</a>
                                                    @csrf
                                                    <button type="submit" class="btn btn-sm btn-danger">HAPUS</button>
                                                    @method('DELETE')
                                                    @endif
                                                    @endif
                                                    <a href="{{ route('tasks.show', $task->id) }}" class="btn btn-sm btn-info">SHOW</a>
                                            </form>
                                                <div class="modal fade" id="exampleModal{{$task->id}}" tabindex="-1" aria-labelledby="approvement{{ $task->id }}" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">

                                                                <h5 class="modal-title" id="approvement {{ $task->id }}">Approvement</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form action="{{ route('tasks.approvement', $task->id) }}" method="POST">
                                                                    @csrf
                                                                    <select class="form-control" name="status" id="status">
                                                                        <option value="">Choose Status</option>
                                                                        @if(auth()->user()->role == 'manager')
                                                                        <option value="approved">Approved</option>
                                                                        @endif
                                                                        <option value="rejected">Rejected</option>
                                                                        @if(auth()->user()->role == 'director')
                                                                        <option value="finished">Finished</option>
                                                                        @endif
                                                                    </select>
                                                            </div>
                                                            
                                                            <div class="modal-body" id="noteSection" style="display: none;">
                                                                <textarea class="form-control"  name="note" placeholder="Add note"></textarea>
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
            <script>
                document.getElementById('status').addEventListener('change', function() {
                    var status = this.value;
                    var noteSection = document.getElementById('noteSection');
                    if (status === 'rejected') {
                        noteSection.style.display = 'block';
                    } else {
                        noteSection.style.display = 'none';
                    }
                });
            </script>

        </div>
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
