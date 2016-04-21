@extends('layouts.master')

@section('content')
    <h4>Review job/request</h4>

    <div class="alert alert-warning alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <p><strong>Yacht: </strong> {{$job->yacht->code}} - {{$job->yacht->name}}</p>
        <p><strong>Customer notes: </strong> {{$job->client_notes}}</p>
    </div>

    <ul class="list-group">
        <li class="list-group-item list-group-item-success"><strong>Tasks already done on the yacht</strong></li>
        @foreach($arHistory as $history)
            <li class="list-group-item">{{$history->task->code}} {{$history->task->name}} on {{$history->created_at->diffForHumans()}}</li>
        @endforeach
    </ul>
    <input type="hidden" name="job_id" value="{{$job->id}}" />
    <a class="btn btn-success" href="{{route('jobs.index')}}">Back</a>


@stop
