<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $departments = Department::all();
        return view('admin.departments.index', compact('departments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $department = new Department();

        return view('admin.departments.create', compact('department'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (isset($request['id']) && $request['id'] != null) {
            $this->validate($request, [
                'name' => 'required|unique:departments,name,' . $request['id'],
            ]);

            $department = Department::find($request['id']);
            $department->name = $request->input('name');
            $department->remarks = $request->input('remarks');

            $department->save();
        } else {
            $this->validate($request, [
                'name' => 'required|unique:departments,name'
            ]);

            $department = Department::create([
                'name' => $request->input('name'),
                'remarks' => $request->input('remarks')
            ]);
        }

        return redirect(route('view-departments'))->with('message', 'Data has been saved successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $department = Department::findOrFail($id);

        return view('admin.departments.create', compact('department'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $department = Department::findOrFail($id);

        if ($department) {
            $department->delete($id);
        }

        return redirect()->route('view-departments');
    }
}
