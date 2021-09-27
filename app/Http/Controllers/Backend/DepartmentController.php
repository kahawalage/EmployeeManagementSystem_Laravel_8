<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\DepartmentStoreRequest;
use App\Models\Department;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    public function index(Request $request)
    {
        $department = Department::all();
        if ($request->has('search')) {
            $department = Department::where('name', 'like', "%{$request->search}%")->get();
        }
        return view('department.index', compact('department'));
    }

    public function create()
    {
        return view('department.create');
    }

    public function store(DepartmentStoreRequest $request)
    {
        Department::create($request->validated());

        return redirect()->route('department.index')->with('message', 'Department Created Succesfully');
    }

    public function edit(Department $department)
    {
        return view('department.edit', compact('department'));
    }

    public function update(DepartmentStoreRequest $request, Department $department)
    {
        $department->update($request->validated());
        return redirect()->route('department.index')->with('message', 'Department Updated Succesfully');
    }

    public function destroy(Department $department)
    {
        $department->delete();
        return redirect()->route('department.index')->with('message', 'Department Deleted Succesfully');
    }
}
