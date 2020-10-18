<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use App\Models\Countary;
use App\Models\User;
use App\Models\ profail_user;
use Illuminate\Support\Facades\Cookie;

use Illuminate\Http\Request;
class countaryController extends Controller
{
    public function getcountary()
    {
        return view('countary');
    }
    public function addcountary(Request $request)
    {
        
        Countary::create([
            'name'=>$request->name,
            'code'=>$request->code
        ]);
        return redirect()->back();
    }
    public function getusercountary()
    {
        // $get=User::find(2)->countaries;
        // return $get;
        // $get=User::with('countaries')->get();
        // return $get;

            $get=Countary::with('users')->find(1);
            // return view('setting',compact('get'));
          return $getuser= $get->users;
            //  foreach($getuser as $fetch)
            //  {
            //     return  $fetch->name;
            //  }
    }

    public function profil()
    {
        // $getauth=auth::user();
        // $id= $getauth->id;
        $id=auth::id();
        // $getprofil=User::findorfail($id);
        // return $getprofil->profail_user;


        $getprofil=User::select('id','name','email')->with(['profail_user'=>function($q){          
             $q->select('province','bio','gender','url','user_id');                                 
        }])->get();
        
        // return $getprofil;
        return view('setting',compact('getprofil'));
       
    }
    public function addinfo(Request $request)
    { 
        Cookie::queue(Cookie::make('name', 'ali luay',1  ));
        return  Cookie::get('name');
        // $adduser=User::create([
        //     'name'=>$request->name,
        //     'email'=>$request->email,
        //     'password'=>Hash::make($request['password']),
        // ]);
        // $adduser->save();
       
        // return redirect()->back()->withInput(); 
      }

       public function wherehas(){
           return User::wherehas('profail_user')->get();
       }

       public function wherehasonly(){
        return User::whereHas('countaries' , function($q){
            $q->where('code','KSA');
        })->get();
    }


       public function getaddres()
       {
        //    $get=Countary::with('users')->get();
        //    return $get;
              $get=User::select('countary_id','name','id')->with(['profail_user','countaries'=>function($q){
                  $q->select('name','id');
              }])->get();
              return view('allinfo',compact('get'));

        //   return    $get=User::select('countary_id','name','id')->with(['profail_user','countaries'=>function($q){
        //         $q->select('name','id');
        //     }])->find(1);
       }

       
  public function test(){
    // $users = User::where('countary_id','1')->get();

    // foreach ($users as $user) {
    //     echo $user->name .'<br>';
    // }

    // $users = User::all();

    



  }
}