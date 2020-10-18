<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class coronaController extends Controller
{
    public function index(){
        $res= Http::get('https://api.covid19api.com/summary')->json();
    //    return $res;
          return view('corona',compact('res'));
    }
}
