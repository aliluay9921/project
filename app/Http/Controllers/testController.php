<?php

namespace App\Http\Controllers;

use App\Models\Countary;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class testController extends Controller
{
    public function index()
    {

        return view('test');
    }
    public function savenumber(Request $request)
    {

        return Countary::create([
            'name' => 'ali',
            'user_id' => 1,
            'code' => $request->number
        ]);
    }
    public function store(Request $request)
    {
        // اكدر استخدم اكثر من طريقة بلرفع هنا طريقتين
        // $validate = $request->validate([
        //     'images' => 'mimes:jpeg,png,jpg,gif'
        // ]);
        if ($request->hasFile('images')) {
            foreach ($request->images as $image) {
                $imageExt = $image->getClientOriginalExtension();
                $nameimagenew = time() . '.' . $imageExt;
                $image->move('images', $nameimagenew);
            }
        }
        return back()->with('success', 'uploded sucessfly');
    }
}