<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\CityStoreRequest;
use App\Models\City;
use App\Models\State;
use Illuminate\Http\Request;

class CityController extends Controller
{
    public function index(Request $request)
    {
        $City = City::all();
        if ($request->has('search')) {
            $City = City::where('name', 'like', "%{$request->search}%")->get();
        }
        return view('city.index', compact('City'));
    }

    public function create()
    {
        $State = State::all();
        return view('city.create', compact('State'));
    }

    public function store(CityStoreRequest $request)
    {
        City::create($request->validated());

        return redirect()->route('city.index')->with('message', 'City Created Succesfully');
    }

    public function edit(City $City)
    {
        $State = State::all();
        return view('city.edit', compact('City', 'State'));
    }

    public function update(CityStoreRequest $request, City $City)
    {
        $City->update($request->validated());
        return redirect()->route('city.index')->with('message', 'City Updated Succesfully');
    }

    public function destroy(City $City)
    {
        $City->delete();
        return redirect()->route('city.index')->with('message', 'City Deleted Succesfully');
    }
}
