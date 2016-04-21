@extends('layouts.master')

@section('content')
    <h4>Add new job/request</h4>


    <form method="POST" action="{{route('jobs.save')}}">
        <div class="form-group">
            <label for="yacht_id">Client</label>
            <select name="yacht_id">
            @foreach($yachts as $yacht)
                <option value="{{$yacht->id}}">{{$yacht->name}} - {{$yacht->registration_code}}</option>
            @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="client_notes">Client notes</label>
            <textarea name="client_notes" class="form-control" id="client_notes"></textarea>
        </div>

        <button type="submit" class="btn btn-primary">Create</button>
    </form>

@stop
