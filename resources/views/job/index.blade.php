@extends('layouts.master')

@section('content')
    <h4>Jobs listing</h4>
    <table id="jobs" class="table-bordered table-striped table">

        <thead>
        <tr>
            <td class="col-md-1"><strong>Id</strong></td>
            <td class="col-md-2"><strong>Yacht Registration code</strong></td>
            <td class="col-md-2"><strong>Client notes</strong></td>
            <td class="col-md-1"><strong>Status</strong></td>
            <td class="col-md-2"><strong>Added on</strong></td>
            <td class="col-md-2"><strong>Last update</strong></td>
            <td class="col-md-2"><strong>Action</strong></td>
        </tr>
        </thead>

        <tbody>
        @foreach($paginator as $data)
            <tr>
                <td>{{$data->id}}</td>
                <td>{{$data->yacht->registration_code}}</td>
                <td>{{substr($data->client_notes,0, 200)}}</td>
                <td>{{ucfirst(strtolower($data->status))}}</td>
                <td>{{$data->created_at->toDateTimeString()}}</td>
                <td>{{$data->updated_at->diffForHumans()}}</td>
                <td>
                    @if ($data->status == App\Job::JOB_NEW)
                        <a class="btn btn-primary" href="{{route('jobs.assessment', ['job' => $data->id])}}">Make assessment</a>
                    @elseif  ($data->status == App\Job::JOB_IN_PROGRESS)
                        <a class="btn btn-primary" href="{{route('jobs.resume', ['job' => $data->id])}}">Resume</a>
                    @elseif ($data->status == App\Job::JOB_COMPLETED)
                        <a class="btn btn-success" href="{{route('jobs.review', ['job' => $data->id])}}">Review</a>
                    @endif
                </td>
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
                <a class="btn btn-danger" href="{{route('jobs.add')}}">Add new job</a>
            </td>
        </tr>
        </tfoot>
    </table>
@stop
