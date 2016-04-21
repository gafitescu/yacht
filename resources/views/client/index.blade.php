@extends('layouts.master')

@section('content')

    <h4>Client listing</h4>
    <table  id="clients" class="table-bordered table-striped table">
        <thead>
        <tr>
            <td class="col-md-1"><strong>Id</strong></td>
            <td class="col-md-1"><strong>First name</strong></td>
            <td class="col-md-1"><strong>Last name</strong></td>
            <td class="col-md-2"><strong>Email</strong></td>
            <td class="col-md-2"><strong>Phone</strong></td>
            <td class="col-md-2"><strong>Added on</strong></td>
            <td class="col-md-2"><strong>Last update</strong></td>
        </tr>
        </thead>
        <tbody>
        @foreach($paginator as $data)
            <tr>
                <td>{{$data->id}}</td>
                <td>{{$data->first_name}}</td>
                <td>{{$data->last_name}}</td>
                <td><a href="mailto:{{$data->email}}">{{$data->email}}</a></td>
                <td>{{$data->phone}}</td>
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
