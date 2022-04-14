<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Photo;
use Illuminate\Support\Facades\File;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;

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
            
            foreach($photos as $photo){

                $result = $photo->storeOnCloudinary('properties');

                $photo_db = new Photo();
                $photo_db->path = $result->getSecurePath();
                $photo_db->external_id = $result->getPublicId();
                $photo_db->property_id = $prop_id;
                $photo_db->timestamps=false;
                $photo_db->save();
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

        Cloudinary::destroy($photo->external_id);

        $photo->delete();

        return redirect('/properties/'.$prop_id.'/photos');
    }
}
