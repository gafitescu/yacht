<?php

namespace App\Http\Controllers;

use App\Client;
use App\Yacht;
use Illuminate\Http\Request;

class YachtController extends Controller
{
    public function index(Yacht $yacht)
    {
        $paginator = $yacht->descending()
            ->paginate(env('ROWS_PER_PAGE', 10));

        return view('yacht.index', compact('paginator'));
    }

    public function add()
    {
        $clients = Client::all();
        return view('yacht.add', compact('clients'));
    }

    public function save(Request $request)
    {
        $this->validate($request, [
            'client_id' => 'required|exists:clients,id',
            'name' => 'required',
            'registration_code' => 'required',
            'next_maintenance_date' => 'required|date_format:Y-m-d|after:today'
        ]);

        /* initially set the Yacht as Sailing */
        $data = $request->all() + ['status' => Yacht::SAILING];
        Yacht::create($data);

        return redirect()->route('yachts.index');
    }

    public function history($id)
    {
        $yacht = Yacht::findOrFail($id);

        return view('yacht.history', compact('yacht'));
    }
}
