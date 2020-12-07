<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Place;
use App\Models\City;
use Validator;
use Str;
use File;

class PlaceController extends Controller
{   
    public function rules($id = false){
        return [
            'name' => 'required',
            'address' => 'required',
            'picture' => 'required',
            'city_id' => 'required',
            'description' => 'required',
        ];
    }
    public function index() {
        $data['data'] = Place::get();
        return view('backend.pages.place', $data);
    }
    
    public function form(Place $place = null) {
        $data['data'] = $place;
        $data['citys'] = City::get();
        return view('backend.pages.place-form', $data);
    }

    public function store(Request $request, Place $place = null) {
        $data = $this->validate($request, $this->rules());
        if($place == null){
            $data['picture'] = $this->upload_image($request->file('picture'));
            Place::create($data);
            $message = $request->name.' Place Created';
        }else {
            $data['picture'] = $this->upload_image($request->file('picture'), $place->picture);
            $place->update($data);
            $message = $request->name.' Place Update';

        }

        $data['data'] = $place;
        return redirect()->route('place')->withSuccess($message);
    }

    public function destroy(Place $place)
    {   
        try{
            $this->delete_image($place->picture);
            $place->delete();
            return redirect()->back()->withSuccess($place->name.' Place Deleted');
        }catch(Exception $e) {
            return redirect()->back()->withError($e);
        }
    }

    private function upload_image($image,$old_image = null){
        $path = base_path('public/images/place/');
        $path_old_image = $path.$old_image;
        if($old_image && file_exists($path_old_image) && ($old_image != 'default.jpg')){
            unlink($path_old_image);
        }
        $image_name = Str::random(30).'.'.$image->getClientOriginalExtension();
        $image->move($path, $image_name);
        return $image_name;
    }

    private function delete_image($image){
        $image_path = "images/place/".$image;
        
        if(File::exists($image_path)){
            File::delete($image_path);
        }
    }
}
