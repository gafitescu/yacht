<?php

namespace App\Http\Controllers;

use App\History;
use App\Job;
use App\Task;
use App\Yacht;
use App\Events\Event;
use App\Events\JobInProgressEvent;
use App\Events\JobDoneEvent;

use Illuminate\Http\Request;

class JobController extends Controller
{
    public function index(Job $job)
    {
        $paginator = $job->latest()
            ->paginate(env('ROWS_PER_PAGE', 10));

        return view('job.index', compact('paginator'));
    }

    public function add()
    {
        $yachts = Yacht::all();
        return view('job.add', compact('yachts'));
    }

    public function save(Request $request)
    {
        $this->validate($request, [
            'yacht_id' => 'required|exists:yachts,id',
            'client_notes' => 'required'
        ]);

        $data = $request->all() + ['status' => Job::JOB_NEW];
        Job::create($data);

        return redirect()->route('jobs.index');
    }

    public function assessment($id)
    {
        $job = Job::findOrFail($id);
        $tasks = Task::all();
        return view('job.assessment', compact('job', 'tasks'));
    }

    public function handle(Request $request)
    {
        $job = Job::findOrFail($request->get('job_id'));
        $task = Task::findOrFail($request->get('task_id'));

        $job->status = Job::JOB_IN_PROGRESS;
        $job->save();

        $job->yacht->status = $task->status;
        $job->yacht->save();

        event(new JobInProgressEvent($job, $task));

        return redirect()->route('jobs.index');
    }

    public function resume(History $history, $id)
    {
        $job = Job::findOrFail($id);
        $tasks = Task::all();
        $arHistory = $history->forJob($id)->get();

        return view('job.resume', compact('job', 'tasks', 'arHistory'));
    }

    public function review(History $history, $id)
    {
        $job = Job::findOrFail($id);
        $arHistory = $history->forJob($id)->get();

        return view('job.review', compact('job', 'arHistory'));
    }

    public function complete(Request $request)
    {
        $id = $request->input('job_id');
        $job = Job::findOrFail($id);

        $job->status = Job::JOB_COMPLETED;
        $job->save();

        $next_maintenance_date = $request->input('next_maintenance_date');
        if (!empty($next_maintenance_date)) {
            $job->yacht->next_maintenance_date = $next_maintenance_date;
            $job->yacht->save();
        }

        event(new JobDoneEvent($job));
        return redirect()->route('jobs.index');
    }
}
