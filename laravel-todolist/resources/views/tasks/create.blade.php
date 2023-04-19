@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Add task') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <form method="post" action="{{url('/tasks/store')}}">
                            @csrf
                            <div class="form-group">
                                <label for="exampleFormControlInput1">Name</label>
                                <input type="text" class="form-control" id="exampleFormControlInput1"
                                       placeholder="task name" name="Name" required>

                                <div class="form-group">
                                    <label for="exampleFormControlSelect2">Priority</label>
                                    <select class="form-control" id="exampleFormControlSelect2" name="Priority" required>
                                        <option>Low</option>
                                        <option>Medium</option>
                                        <option>High</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="exampleFormControlSelect3">Completed</label>
                                    <select class="form-control" id="exampleFormControlSelect3" name="Completed" required>
                                        <option>True</option>
                                        <option>False</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="exampleFormControlTextarea4">Description</label>
                                    <textarea class="form-control" id="exampleFormControlTextarea4" rows="3" placeholder="task description" name="Description" required></textarea>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-success">Add task</button>
                            <a class="btn btn-danger" href="{{route('tasks.index')}}">Cancel task</a>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection


