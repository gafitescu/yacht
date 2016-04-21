<?php

namespace App\Http\Controllers;

use App\Task;

class TaskController extends Controller
{
    public function index(Task $task)
    {
        $paginator = $task
            ->paginate(env('ROWS_PER_PAGE', 10));

        return view('task.index', compact('paginator'));
    }
}
