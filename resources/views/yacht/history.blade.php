@extends('layouts.master')

@section('content')
    <h4>History of the yacht</h4>

    <div class="alert alert-warning alert-dismissible" role="alert">
        <p><strong>Yacht: </strong> {{$yacht->registration_code}} - {{$yacht->name}}</p>
        <p><strong>Next maintenance date: </strong> {{$yacht->next_maintenance_date}}</p>
        <p><strong>Current status: </strong> {{$yacht->status}}</p>
    </div>

        @foreach($yacht->jobs as $job)
          <ul class="list-group">
          <li class="list-group-item list-group-item-success">
              <strong>Status : {{ucfirst(strtolower($job->status))}}</strong>
              <p>{{$job->client_notes}}</p> on {{$job->created_at->diffForHumans()}}
          </li>
            @foreach($job->history as $history)
                <li class="list-group-item">{{$history->task->code}} {{$history->task->name}} on {{$history->created_at->diffForHumans()}}</li>
            @endforeach
          </ul>
        @endforeach
    <a class="btn btn-success" href="{{route('jobs.index')}}">Back</a>
@stop
