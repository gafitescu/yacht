<?php

namespace App\Http\Controllers;

use App\Client;

class ClientController extends Controller
{
    public function index(Client $client)
    {
        $paginator = $client->descending()
            ->paginate(env('ROWS_PER_PAGE', 10));
        return view('client.index', compact('paginator'));
    }
}
