<?php

namespace App\Http\Controllers;

use App\History;

class DashboardController extends Controller
{
    public function history(History $history)
    {
        $paginator = $history->descending()
            ->paginate(env('ROWS_PER_PAGE', 10));
        return view('dashboard', compact('paginator'));
    }
}
