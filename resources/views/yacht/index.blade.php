@extends('layouts.master')

@section('content')
    <h4>Yacht management</h4>
    <table id="yacht" class="table-bordered table-striped table">
        <thead>
        <tr>
            <td class="col-md-1"><strong>Id</strong></td>
            <td class="col-md-2"><strong>Name</strong></td>
            <td class="col-md-2"><strong>Registration code</strong></td>
            <td class="col-md-2"><strong>Next maintenance date</strong></td>
            <td class="col-md-1"><strong>Status</strong></td>
            <td class="col-md-2"><strong>Added on</strong></td>
            <td class="col-md-2"><strong>Last update</strong></td>
        </tr>
        </thead>
        <tbody>
        @foreach($paginator as $data)
            <tr>
                <td>{{$data->id}}</td>
                <td>{{$data->name}}</td>
                <td>{{$data->registration_code}}</td>
                <td>{{$data->next_maintenance_date}}</td>
                <td>{{ucfirst(strtolower($data->status))}}</td>
                <td>{{$data->created_at->toDateTimeString()}}</td>
                <td>{{$data->updated_at->diffForHumans()}}</td>
                <td><a class="btn btn-success" href="{{route('yachts.history', ['yacht' => $data->id])}}">History</a></td>
            </tr>
        @endforeach
        </tbody>
        <tfoot>
        <tr>
            <td colspan="6">
                <div class="text-center">
                    {!! $paginator->render() !!}
                </div>
            </td>
            <td>
                <a class="btn btn-danger" href="{{route('yachts.add')}}">Add new yacht</a>
            </td>
        </tr>
        </tfoot>
    </table>
@stop
