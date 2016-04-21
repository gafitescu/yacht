@extends('layouts.master')

@section('content')
    <h2>Latest activity</h2>
    <table  id="dashboard" class="table-bordered table-striped table">
        <thead>
            <tr>
                <td class="col-md-1"><strong>Id</strong></td>
                <td class="col-md-1"><strong>Yacht Name</strong></td>
                <td class="col-md-2"><strong>Yacht registration code</strong></td>
                <td class="col-md-1"><strong>Task code</strong></td>
                <td class="col-md-4"><strong>Task name</strong></td>
                <td class="col-md-3"><strong>Started</strong></td>
            </tr>
        </thead>
        <tbody>
        @foreach($paginator as $data)
            <tr>
                <td>{{$data->id}}</td>
                <td>{{$data->job->yacht->name}}</td>
                <td>{{$data->job->yacht->registration_code}}</td>
                <td>{{$data->task->code}}</td>
                <td>{{$data->task->name}}</td>
                <td>{{$data->created_at->diffForHumans()}}</td>
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
