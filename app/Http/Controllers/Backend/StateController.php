<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\StateStoreRequest;
use App\Models\Country;
use App\Models\State;
use Illuminate\Http\Request;

class StateController extends Controller
{
    public function index(Request $request)
    {
        $state = State::all();
        if ($request->has('search')) {
            $state = State::where('name', 'like', "%{$request->search}%")->get();
        }
        return view('state.index', compact('state'));
    }

    public function create()
    {
        $counties = Country::all();
        return view('state.create', compact('counties'));
    }

    public function store(StateStoreRequest $request)
    {
        State::create($request->validated());

        return redirect()->route('state.index')->with('message', 'State Created Succesfully');
    }

    public function edit(State $State)
    {
        $counties = Country::all();
        return view('state.edit', compact('State', 'counties'));
    }

    public function update(StateStoreRequest $request, State $State)
    {
        $State->update($request->validated());
        return redirect()->route('state.index')->with('message', 'State Updated Succesfully');
    }

    public function destroy(State $State)
    {
        $State->delete();
        return redirect()->route('state.index')->with('message', 'State Deleted Succesfully');
    }
}
