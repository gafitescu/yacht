@extends('layouts.master')

@section('content')
    <table  id="analytics" class="table-bordered table-striped table">
        <thead>
            <tr>
                <td class="col-md-1"><strong>Id</strong></td>
                <td class="col-md-4"><strong>Name</strong></td>
                <td class="col-md-3"><strong>Registration code</strong></td>
                <td class="col-md-2"><strong>Status</strong></td>
                <td class="col-md-2"><strong>Last update</strong></td>
            </tr>
        </thead>
        <tbody>
        @foreach($paginator as $data)
            <tr>
                <td>{{$data->id}}</td>
                <td>{{$data->name}}</td>
                <td>{{$data->registration_code}}</td>
                <td>{{ucfirst(strtolower($data->status))}}</td>
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
