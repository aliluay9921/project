<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class testController extends Controller
{
    public function index(){
        return view('test');
    }
    public function store(Request $request){
// اكدر استخدم اكثر من طريقة بلرفع هنا طريقتين
        $validate=$request->validate([
            'images'=>'mimes:jpeg,png,jpg,gif'
        ]);
        if($request->hasFile('images')){
            foreach($request->images as $image){
                // $imagename=$image->getClientOriginalName();
                $imageExt=$image->getClientOriginalExtension();        
                // $newname=uniqid("",true).'.'.$imagename;               
                $nameimagenew=time().'.'.$imageExt;
                $image->move('images',$nameimagenew);
                
            }
        }
        return back()->with('success','uploded sucessfly');

    }
}
