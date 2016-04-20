<?php

namespace App\Http\Controllers;

use App\Yacht;

class DashboardController extends Controller
{
    public function inProgress(Yacht $yacht)
    {
        $paginator = $yacht->onMaintenance()->paginate(env('ROWS_PER_PAGE', 10));
        return view('dashboard', compact('paginator'));
    }
}
