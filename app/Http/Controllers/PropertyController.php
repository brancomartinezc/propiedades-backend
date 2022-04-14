<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Property;
use App\Models\City;
use App\Models\User;
use App\Models\Photo;
use GuzzleHttp\Handler\Proxy;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class PropertyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $properties = DB::table('properties')
            ->join('cities', 'properties.city_id', '=', 'cities.id')
            ->select('properties.*','cities.name as city_name','cities.state as city_state','cities.country_code as city_country_code')
            ->orderBy('id', 'asc')
            ->paginate(10);

        return view('properties.index')->with('properties',$properties);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cities = City::all();

        return view('properties.create')->with('cities',$cities);
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
            'address' => 'required|max:255',
            'type' => 'required',
            'area' => 'required|integer',
            'price' => 'required|integer',
            'sale_rent' => 'required',
            'rooms' => 'required|integer',
            'beds' => 'required|integer',
            'baths' => 'required|integer',
            'descrption' => 'nullable|max:5000',
        ]);

        $property = new Property();

        $property->address = $request->get('address');
        $property->type = $request->get('type');
        $property->area = $request->get('area');
        $property->price = $request->get('price');
        $property->sale_rent = $request->get('sale_rent');
        $property->rooms = $request->get('rooms');
        $property->beds = $request->get('beds');
        $property->baths = $request->get('baths');
        $property->description = $request->get('description');
        $property->city_id = $request->get('city_id');
        $property->agent_id = Auth::id();

        $property->save();

        return redirect('/properties');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $property = Property::find($id);
        $city = City::find($property->city_id);
        $agent = User::find($property->agent_id);

        return view('properties.show')
            ->with('property',$property)
            ->with('city',$city)
            ->with('agent',$agent);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $property = Property::find($id);
        $cities = City::all();

        return view('properties.edit')
            ->with('property',$property)
            ->with('cities',$cities);
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
            'address' => 'required|max:255',
            'type' => 'required',
            'area' => 'required|integer',
            'price' => 'required|integer',
            'sale_rent' => 'required',
            'rooms' => 'required|integer',
            'beds' => 'required|integer',
            'baths' => 'required|integer',
            'descrption' => 'nullable|max:5000',
        ]);

        $property = Property::find($id);

        $property->address = $request->get('address');
        $property->type = $request->get('type');
        $property->area = $request->get('area');
        $property->price = $request->get('price');
        $property->sale_rent = $request->get('sale_rent');
        $property->rooms = $request->get('rooms');
        $property->beds = $request->get('beds');
        $property->baths = $request->get('baths');
        $property->description = $request->get('description');
        $property->city_id = $request->get('city_id');

        $property->save();

        return redirect('/properties');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $property = Property::find($id);
        $photos = Photo::where('property_id',$id)->get();

        foreach($photos as $photo){
            Photo::destroy($photo->id);
        }

        $property->delete();

        return redirect('/properties');
    }

    public function photos($id){

        $property = Property::find($id);
        $photos = Photo::where('property_id',$id)->get();

        return view('properties.photos')
            ->with('property',$property)
            ->with('photos',$photos);
    }
}
