@extends('layouts.master')

@section('content')

    <h4>Tasks listing</h4>
    <table  id="clients" class="table-bordered table-striped table">
        <thead>
        <tr>
            <td class="col-md-1"><strong>Id</strong></td>
            <td class="col-md-2"><strong>Code</strong></td>
            <td class="col-md-3"><strong>Name</strong></td>
            <td class="col-md-1"><strong>Average duration</strong></td>
            <td class="col-md-2"><strong>Added on</strong></td>
            <td class="col-md-2"><strong>Last update</strong></td>
        </tr>
        </thead>
        <tbody>
        @foreach($paginator as $data)
            <tr>
                <td>{{$data->id}}</td>
                <td>{{$data->code}}</td>
                <td>{{$data->name}}</td>
                <td>{{$data->average_duration}}</td>
                <td>{{$data->updated_at->toDateTimeString()}}</td>
                <td>{{$data->updated_at->diffForHumans()}}</td>
            </tr>
        @endforeach
        </tbody>
        <tfoot>
        <tr>
            <td colspan="7">
                <div class="text-center">
                    {!! $paginator->render() !!}
                </div>
            </td>
        </tr>
        </tfoot>
    </table>
@stop
