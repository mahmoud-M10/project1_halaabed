@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <h1>Task list App</h1>

        <div class="offset-md-2 col-md-8">
            <div class="card">
                <div class="card-header">
                    @if (isset($task))
                        Update Task
                    @else
                        New Task
                    @endif
                </div>
                <div class="card-body">
                    <!-- New Task or Update Task Form -->
                    @if (isset($task))
                        <form action="{{ url('/update') }}" method="POST">
                            @csrf

                            <input type="hidden" name="id" value="{{ $task->id }}">
                            <div class="mb-3">
                                <label for="task-name" class="form-label">Task</label>
                                <input type="text" name="name" id="task-name" class="form-control" value="{{ $task->name }}">
                            </div>
                            <div>
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-plus me-2"></i>Update
                                </button>
                            </div>
                        </form>
                    @else
                        <form action="/create" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="task-name" class="form-label">Task</label>
                                <input type="text" name="name" id="task-name" class="form-control" value="">
                            </div>
                            <div>
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-plus me-2"></i>Add Task
                                </button>
                            </div>
                        </form>
                    @endif
                </div>
            </div>

            <!-- Current Tasks -->
            <div class="card mt-4">
                <div class="card-header">
                    Current Tasks
                </div>
                <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Task</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($tasks as $taskItem)
                            <tr>
                                <td>{{ $taskItem->name }}</td>
                                <td>
                                    <form action="/delete/{{ $taskItem->id }}" method="POST" class="d-inline">
                                        @csrf
                                        <button type="submit" class="btn btn-danger">
                                            <i class="fa fa-trash me-2"></i>Delete
                                        </button>
                                    </form>
                                    <form action="/edit/{{ $taskItem->id }}" method="POST" class="d-inline">
                                        @csrf
                                        <button type="submit" class="btn btn-info">
                                            <i class="fa fa-pencil me-2"></i>Edit
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
