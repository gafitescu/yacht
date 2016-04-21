@extends('layouts.master')

@section('content')
    <h4>Add new job/request</h4>

    <div class="alert alert-warning alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <strong>Customer notes: </strong> {{$job->client_notes}}
    </div>
    <form method="POST" action="{{route('jobs.handle')}}">
        <div class="form-group">
            <label for="yacht_id">Task: </label>
            <select name="task_id">
                @foreach($tasks as $task)
                    <option value="{{$task->id}}">{{$task->code}} - {{$task->name}}</option>
                @endforeach
            </select>
        </div>
        <input type="hidden" name="job_id" value="{{$job->id}}" />
        <input type="submit" name="handle" class="btn btn-primary" value="Handle task" />
    </form>

@stop
