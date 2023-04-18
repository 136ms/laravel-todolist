@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <a href="{{route('tasks.create')}}">
                    <button class="btn btn-success">Add task</button>
                </a>
                <div class="card">
                    <div class="card-header">{{ __('Task Dashboard') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">Name</th>
                                <th scope="col">Description</th>
                                <th scope="col">Priority</th>
                                <th scope="col">Created</th>
                                <th scope="col">Updated</th>
                                <th scope="col">Functions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($tasks as $task)
                                <tr>
                                    <td>{{ $task->name }}</td>
                                    <td>{{ $task->description }}</td>
                                    <td>{{ $task->priority }}</td>
                                    <td>{{ $task->created_at }}</td>
                                    <td>{{ $task->updated_at }}</td>
                                    <td>
                                        <div class="action_button float-end">
                                            <a href="{{route('tasks.edit', $task->id)}}" class="btn btn-sm btn-warning m-1" id="edit-btn">Edit</a>
                                            <form action="{{ route('tasks.destroy', $task->id) }}" method="POST"
                                                  id="delete-form">
                                                @csrf
                                                @method('DELETE')
                                                <input type="hidden" name="_method" value="DELETE">
                                                <button type="submit" class="btn btn-sm btn-danger m-1">Remove</button>
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
    <script>
        $(document).ready(function () {
            $('.form-check-input').on('change', function () {
                let taskId = $(this).val();
                let isCompleted = $(this).prop('checked');

                // Send an Ajax request to update the task's is_completed status
                $.ajax({
                    url: '/tasks/' + taskId + '/update-status',
                    type: 'POST',
                    data: {is_completed: isCompleted},
                    success: function (response) {
                        console.log(response);
                    },
                    error: function (xhr, status, error) {
                        console.log(xhr.responseText);
                    }
                });
            });
        });
    </script>

@endsection


