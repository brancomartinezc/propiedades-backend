<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Photo;
use Illuminate\Support\Facades\File;

class PhotoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $prop_id = $request->prop_id;

        if($request->has('photos')){
            $photos = $request->file('photos');
            $photo_number = 1;
            
            foreach($photos as $photo){
                $imageName = 'property-'.$prop_id.'-photo-'.$photo_number.'-'.time().'.'.$photo->extension();
                $photo->move(public_path('properties_images'),$imageName);

                $photo_db = new Photo();
                $photo_db->path = $imageName;
                $photo_db->property_id = $prop_id;
                $photo_db->timestamps=false;
                $photo_db->save();

                $photo_number++;
            }

        }

        return redirect('/properties/'.$prop_id.'/photos');
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $photo = Photo::find($id);
        $prop_id = $photo->property_id;
        $photo_path = 'properties_images/'.$photo->path;

        if(File::exists($photo_path)){
            File::delete($photo_path);
        }

        $photo->delete();

        return redirect('/properties/'.$prop_id.'/photos');
    }
}
