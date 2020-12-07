<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Agent;
use App\Models\City;
use App\Models\Package;
use App\Models\Place;
use Validator;
use Str;
use File;

class AgentController extends Controller
{   
    public function rules($id = null){
        $rules = [
            'name' => 'required',
            'owner' => 'required',
            'address' => 'required',
            'province' => 'required',
            'city_id' => 'required',
            'description' => 'required',
            'price' => 'required',
            'phone' => 'required',
            'email' => 'required',
        ];
        
        if(!$id){
            $rules['instagram'] = 'required';
            $rules['facebook'] = 'required';
            $rules['profile'] = 'required';
            $rules['pictures'] = 'required';
        }
        return $rules;
    }
    public function index() {
        $data['data'] = Agent::get();
        return view('backend.pages.agent', $data);
    }
    
    public function form(Agent $agent = null) {
        $data['data'] = $agent;
        $data['citys'] = City::get();
        return view('backend.pages.agent-form', $data);
    }

    public function store(Request $request, Agent $agent = null) {
        if($agent == null){
            $data = $this->validate($request, $this->rules());
            $picture = "";
            $data['profile'] = $this->upload_image($request->file('profile'));
            foreach($request->file('pictures') as $item){  
                $picture = $this->upload_image($item).'|'.$picture;
            }
            $data['pictures'] = $picture;
            Agent::create($data);
            $message = $request->name.' Agent Created';
        }else {
            $data['profile'] = $agent->profile;
            $data['pictures'] = $agent->pictures;
            $data = $this->validate($request, $this->rules($agent->id));
            if($request->file('pictures') != null){
                foreach($request->file('pictures') as $item){
                    $data['pictures'] =  $this->upload_image($item).'|'.$data;
                }

                $img = explode("|", $agent->pictures);
                foreach($img as $item){
                    $this->delete_image($item);
                }
            }

            if($request->file('profile') != null){
                $data['profile'] = $this->upload_image($request->file('profile'), $agent->profile);
            }
            $agent->update($data);
            $message = $request->name.' Agent Update';
        }

        return redirect()->route('agent')->withSuccess($message);
    }

    public function destroy(Agent $agent)
    {   
        try{
            $this->delete_image($agent->picture);
            $agent->delete();
            return redirect()->back()->withSuccess($agent->name.' Agent Deleted');
        }catch(Exception $e) {
            return redirect()->back()->withError($e);
        }
    }

    //Package

    public function package(Agent $agent) {
        $data['data'] = $agent;
        $data['packages'] = Package::where('agent_id', $agent->id)->get();
        return view('backend.pages.package', $data);
    }
    
    public function packageForm($id, Package $package = null) {
        $data['data'] = $package;
        $data['citys'] = City::get();
        $data['places'] = Place::get();
        return view('backend.pages.package-form', $data);
    }

    public function packageStore(Request $request,$id, Package $package = null){
        $validation = [
            'place' => 'required',
            'agent_id' => 'required',
            'city_id' => 'required',
            'price' => 'required',
            'facilities' => 'required',
            'description' => 'required',
            'destination' => 'required',
        ];

        if ($package == null) {
            $validation['banner'] = 'required';
            $validation['pictures'] = 'required';
        }

        $data = $this->validate($request, $validation);
        
        if($package == null){
            $picture = "";
            $data['banner'] = $this->upload_image($request->file('banner'));
            foreach($request->file('pictures') as $item){  
                $picture = $this->upload_image($item).'|'.$picture;
            }
            $data['pictures'] = $picture;
            Package::create($data);
            $message = $request->place.' Package Created';
        }else {
            $picture = "";

            if($request->file('pictures') != null){
                foreach($request->file('pictures') as $item){
                    $picture =  $this->upload_image($item).'|'.$picture;
                }

                $img = explode("|", $package->pictures);
                foreach($img as $item){
                    $this->delete_image($item);
                }
            }
            if ($request->file('banner') != null) {
                $data['banner'] = $this->upload_image($request->file('banner'));
            }
            $data['pictures'] = $picture;
            $package->update($data);
            $message = $request->name.' Package Update';
        }

        return redirect()->route('agent-package',$request->agent_id)->withSuccess($message);
    }

    private function upload_image($image,$old_image = null){
        $path = base_path('public/images/agent/');
        $path_old_image = $path.$old_image;
        if($old_image && file_exists($path_old_image) && ($old_image != 'default.jpg')){
            unlink($path_old_image);
        }
        $image_name = Str::random(30).'.'.$image->getClientOriginalExtension();
        $image->move($path, $image_name);
        return $image_name;
    }

    public function packageDestroy(Package $package)
    {   
        try{
            $this->delete_image($package->banner);
            $img = explode("|", $package->pictures);
            foreach($img as $item){
                $this->delete_image($item);
            }
            $package->delete();
            return redirect()->back()->withSuccess($package->name.' Package Deleted');
        }catch(Exception $e) {
            return redirect()->back()->withError($e);
        }
    }

    private function delete_image($image){
        $image_path = "images/agent/".$image;
        
        if(File::exists($image_path)){
            File::delete($image_path);
        }
    }
}
