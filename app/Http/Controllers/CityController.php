<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\City;
use Validator;
use Str;

class CityController extends Controller
{   
    public function rules($id = false){
        return [
            'name' => 'required',
            'lon' => 'required',
            'lat' => 'required',
            'image' => 'required',
        ];
    }
    public function index() {
        $data['data'] = City::get();
        return view('backend.pages.city', $data);
    }
    
    public function form(City $city = null) {
        $data['data'] = $city;
        return view('backend.pages.city-form', $data);
    }

    public function store(Request $request, City $city = null) {
        $data = $this->validate($request, $this->rules());
        if($city == null){
            $data['image'] = $this->upload_image($request->file('image'));
            City::create($data);
            $message = $request->name.' City Created';
        }else {
            if($request->file('image') != null){
                $data['image'] = $this->upload_image($request->file('image'), $city->image);
            }
            $city->update($data);
            $message = $request->name.' City Update';
        }

        $data['data'] = $city;
        return redirect()->route('city')->withSuccess($message);
    }

    public function destroy(City $city)
    {   
        try{
            $this->delete_image($city->image);
            $city->delete();
            return redirect()->back()->withSuccess($city->name.' City Deleted');
        }catch(Exception $e) {
            return redirect()->back()->withError($e);
        }
    }

    private function upload_image($image,$old_image = null){
        $path = base_path('public/images/city/');
        $path_old_image = $path.$old_image;
        if($old_image && file_exists($path_old_image) && ($old_image != 'default.jpg')){
            unlink($path_old_image);
        }
        $image_name = Str::random(30).'.'.$image->getClientOriginalExtension();
        $image->move($path, $image_name);
        return $image_name;
    }

    private function delete_image($image){
        $image_path = "images/city/".$image;
        
        if(File::exists($image_path)){
            File::delete($image_path);
        }
    }
}
