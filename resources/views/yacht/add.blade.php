@extends('layouts.master')

@section('content')
    <h4>Yacht management</h4>


    <form method="POST" action="{{route('yachts.save')}}">
        <div class="form-group">
            <label for="client_id">Client</label>
            <select name="client_id">
            @foreach($clients as $client)
                <option value="{{$client->id}}">{{$client->first_name}} {{$client->last_name}}</option>
            @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" class="form-control" id="name" placeholder="Name">
        </div>

        <div class="form-group">
            <label for="registration_code">Registration code</label>
            <input type="text" name="registration_code" class="form-control" id="registration_code" placeholder="Registration code">
        </div>

        <div class="form-group">
            <label for="next_maintenance_date">Next maintenance date</label>
            <input type="text" name="next_maintenance_date" class="form-control" id="next_maintenance_date" placeholder="Next maintenance date">
        </div>


        <button type="submit" class="btn btn-primary">Save</button>
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
