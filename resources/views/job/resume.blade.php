@extends('layouts.master')

@section('content')
    <h4>Resume job/request</h4>

    <div class="alert alert-warning alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <strong>Customer notes: </strong> {{$job->client_notes}}
    </div>

    <ul class="list-group">
        <li class="list-group-item list-group-item-success"><strong>Tasks already done on the yacht</strong></li>
    @foreach($arHistory as $history)
        <li class="list-group-item">{{$history->task->code}} {{$history->task->name}} on {{$history->created_at->diffForHumans()}}</li>
    @endforeach
    </ul>
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
        <input type="submit" name="handle" class="btn btn-primary" value="Handle new task" />
    </form>
    <hr/>
    <form method="POST" action="{{route('jobs.complete')}}">
        <input type="hidden" name="job_id" value="{{$job->id}}" />
        <div class="form-group">
            <label for="next_maintenance_date">Next maintenance date</label>
            <span class="help-block">Leave the field empty if the next maintenance date stay the same.</span>
            <input type="text" name="next_maintenance_date" class="form-control" id="next_maintenance_date" placeholder="Next maintenance date">
         </div>

        <input type="submit" name="handle" class="btn btn-success" value="Complete" />
    </form>

@stop



@section('css')
    <link href="/css/bootstrap-datepicker.min.css" rel="stylesheet">
@stop

@section('js')
    <script src="/js/bootstrap-datepicker.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            $('#next_maintenance_date').datepicker({
                format: 'yyyy-mm-dd',
                startDate: '+1d'
            });
        });
    </script>
@stop
