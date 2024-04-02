<x-default-layout>

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
                            <h5> Name Task</h5>
                                <p class="tmt-3">{{ $task->tasks_name }}</p>
                            <h5> Description</h5>
                                <p class="tmt-3">{{ $task->description }}</p>
                            <h5> Attachment</h5>
                            <a href="{{ url('/storage/tasks/' . $task->file) }}" 
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
                            </div>

                            <div class="mt-3">
                                <h5>Note:</h5>
                                <textarea class="form-control" readonly>{{ $approvement->notes??'' }}</textarea>
                            </div>  
                            <hr>
                            <a class="btn btn-primary" href="{{ url('/tasks') }}" role="button">Back</a> 
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    </body>

    </html>

</x-default-layout>