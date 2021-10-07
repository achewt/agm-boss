<?php

namespace App\Http\Controllers;

use App\Models\Designation;
use Illuminate\Http\Request;

class DesignationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $designations = Designation::all();
        return view('admin.designations.index', compact('designations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $designation = new Designation();

        return view('admin.designations.create', compact('designation'));
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
                'name' => 'required|unique:designations,name,' . $request['id'],
            ]);

            $designation = Designation::find($request['id']);
            $designation->name = $request->input('name');
            $designation->remarks = $request->input('remarks');

            $designation->save();
        } else {
            $this->validate($request, [
                'name' => 'required|unique:designations,name'
            ]);

            $designation = Designation::create([
                'name' => $request->input('name'),
                'remarks' => $request->input('remarks')
            ]);
        }

        return redirect(route('view-designations'))->with('message', 'Data has been saved successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Designation  $designation
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $designation = Designation::findOrFail($id);

        return view('admin.designations.create', compact('designation'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Designation  $designation
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $designation = Designation::findOrFail($id);

        if ($designation) {
            $designation->delete($id);
        }

        return redirect()->route('view-designations');
    }
}
