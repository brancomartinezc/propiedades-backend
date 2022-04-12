<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\City;
use Carbon\Carbon;

class CityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cities = City::orderBy('id', 'asc')->paginate(10);

        return view('cities.index')->with('cities',$cities);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cities.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'state' => 'required|max:255',
            'country' => 'required|max:255',
            'country_code' => 'required|max:255',
        ]);

        $city = new City();

        $city->name = $request->get('name');
        $city->state = $request->get('state');
        $city->country = $request->get('country');
        $city->country_code = $request->get('country_code');
        $city->timestamps=false;

        $city->save();

        return redirect('/cities');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $city = City::find($id);

        return view('cities.edit')->with('city',$city);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|max:255',
            'state' => 'required|max:255',
            'country' => 'required|max:255',
            'country_code' => 'required|max:255',
        ]);

        $city = City::find($id);

        $city->name = $request->get('name');
        $city->state = $request->get('state');
        $city->country = $request->get('country');
        $city->country_code = $request->get('country_code');
        $city->timestamps=false;

        $city->save();

        return redirect('/cities');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $city = City::find($id);

        $city->delete();

        return redirect('/cities');
    }
}
