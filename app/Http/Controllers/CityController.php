<?php

namespace App\Http\Controllers;

use App\Models\City;
use Illuminate\Http\Request;

class CityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cities = City::all();
        return view('admin.cities.index', compact('cities'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $city = new City();

        return view('admin.cities.create', compact('city'));
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
                'name' => 'required|unique:cities,name,' . $request['id'],
            ]);

            $city = City::find($request['id']);
            $city->name = $request->input('name');
            $city->remarks = $request->input('remarks');

            $city->save();
        } else {
            $this->validate($request, [
                'name' => 'required|unique:cities,name'
            ]);

            $city = City::create([
                'name' => $request->input('name'),
                'remarks' => $request->input('remarks')
            ]);
        }

        return redirect(route('view-cities'))->with('message', 'Data has been saved successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\City  $city
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $city = City::findOrFail($id);

        return view('admin.cities.create', compact('city'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\City  $city
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $city = City::findOrFail($id);

        if ($city) {
            $city->delete($id);
        }

        return redirect()->route('view-cities');
    }
}
