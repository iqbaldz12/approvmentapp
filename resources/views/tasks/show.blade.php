<<<<<<< HEAD
<x-default-layout>

=======
<<<<<<< HEAD
<x-default-layout>

=======
<div>
>>>>>>> 5a59e6c4d843fc0ba5b4d569831e8e3ed33330a1
>>>>>>> 8c8decbd13737634609000997c3c5fddf960d7c8
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Detail Tugas</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    </head>

    <body style="background: lightgray">

        <div class="container mt-5 mb-5">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card border-0 shadow-sm rounded">
                        <div class="card-body">
                            <hr>
<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> 8c8decbd13737634609000997c3c5fddf960d7c8
                            <h5> Name Task</h5>
                                <p class="tmt-3">{{ $task->tasks_name }}</p>
                            <h5> Description</h5>
                                <p class="tmt-3">{{ $task->description }}</p>
                            <h5> Attachment</h5>
<<<<<<< HEAD
                            <a href="{{ url('/storage/tasks/' . $task->file) }}" 
=======
                            <a href="{{ url('/storage/tasks/' . $task->file) }}"
=======
                            <h5> name Task</h5>
                                <p class="tmt-3">{{ $task->tasks_name }}</p>
                            
                            <h5> Description</h5>
                            <p class="tmt-3">
                                {{ $task->description }}
                            </p>
                            <h5> Attachment</h5>
                            <a href="{{ url('/storage/tasks/' . $task->file) }}" 
>>>>>>> 5a59e6c4d843fc0ba5b4d569831e8e3ed33330a1
>>>>>>> 8c8decbd13737634609000997c3c5fddf960d7c8
                                target="_blank">file</a>

                            <div class="mt-3">
                                <h5>Status:</h5>
                                <p class="tmt-3">
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
                                </p>
<<<<<<< HEAD
=======
<<<<<<< HEAD
=======
                                
>>>>>>> 5a59e6c4d843fc0ba5b4d569831e8e3ed33330a1
>>>>>>> 8c8decbd13737634609000997c3c5fddf960d7c8
                            </div>

                            <div class="mt-3">
                                <h5>Note:</h5>
                                <textarea class="form-control" readonly>{{ $approvement->notes??'' }}</textarea>
<<<<<<< HEAD
                            </div>  
                            <hr>
                            <a class="btn btn-primary" href="{{ url('/tasks') }}" role="button">Back</a> 
                        </div>
                    </div>
=======
<<<<<<< HEAD
                            </div>
=======
                            </div>    
>>>>>>> 5a59e6c4d843fc0ba5b4d569831e8e3ed33330a1
                            <div class="mt-3">
                                <h5>Log Entries:</h5>
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>status</th>
                                            <th>Approved By</th>
                                            <th>Update by</th>
                                            <th>Create at</th>
                                            <th>step</th>
                                            <th>Notes</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($logs as $log)
                                            <tr>
                                                <td>{{ $log->status }}</td>
                                                {{-- <td>{{ ucfirst($task->approvement()->latest()->first()->user->username) }}</td> --}}
                                                <td>{{ $log->approved_by_id}}</td>
                                                <td>{{ $log->updated_at }}</td>
                                                <td>{{ $log->created_at }}</td>
                                                <td>{{ $log->step }}</td>
                                                <td>{{ $log->notes }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
<<<<<<< HEAD
                            <hr>
                            <a class="btn btn-primary" href="{{ url('/tasks') }}" role="button">Back</a>
                        </div>
                    </div>
=======
      
                    </div>
                    <a class="btn btn-primary" href="{{ url('/tasks') }}" role="button">Back</a> 
>>>>>>> 5a59e6c4d843fc0ba5b4d569831e8e3ed33330a1
>>>>>>> 8c8decbd13737634609000997c3c5fddf960d7c8
                </div>
            </div>
        </div>
    </div>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    </body>

    </html>
<<<<<<< HEAD

</x-default-layout>
=======
<<<<<<< HEAD

</x-default-layout>
=======
>>>>>>> 5a59e6c4d843fc0ba5b4d569831e8e3ed33330a1
>>>>>>> 8c8decbd13737634609000997c3c5fddf960d7c8
