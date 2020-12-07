<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\City;
use App\Models\Package;
use App\Models\Agent;
use Validator;

class FrontController extends Controller
{   
    public function rules($id = false){
        return [
            'name' => 'required',
            'lon' => 'required',
            'lat' => 'required',
        ];
    }
    public function index() {
        $data['citys'] = City::get();
        return view('frontend.pages.index', $data);
    }

    public function agent($id) {
        $data['data'] = Agent::find($id);
        $data['packages'] = Package::where('agent_id',$id)->get();
        return view('frontend.pages.agent', $data);
    }

    public function package($id) {
        $data['data'] = Package::find($id);
        $data['agent'] = Agent::find($data['data']->agent_id);
        return view('frontend.pages.package', $data);
    }
    
    public function kota(){
        $data['citys'] = City::get();
        return view('frontend.pages.list-kota', $data);
    }

    public function agentList($id){
        $data['data'] = Agent::where('city_id', $id)->get();
        $data['city'] = City::find($id);
        return view('frontend.pages.list-agent', $data);
    }
}
