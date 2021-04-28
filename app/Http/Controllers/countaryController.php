<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use App\Models\Countary;
use App\Models\User;
use App\Models\profail_user;
use GuzzleHttp\Promise\Create;
use Illuminate\Support\Facades\Cookie;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

class countaryController extends Controller
{
    public function getcountary()
    {
        return view('countary');
    }
    public function addcountary(Request $request)
    {
        $countary = Countary::create($request->all());
        return back();
    }

    public function search($text)
    {

        $users = User::where('name', 'like', '%' . $text . '%')->get();
        // هنا استخدمت use ($text)  حتى تتعرف التيكست داخل الفاكشن 
        $countarys = User::wherehas('countaries', function ($q) use ($text) {
            return $q->where('code', $text);
        })->get();
        dd($users, $countarys);
    }

    public function getusercountary()
    {
        // $get=User::find(2)->countaries;
        // return $get;
        // $get=User::with('countaries')->get();
        // return $get;

        $get = Countary::with('users')->find(1);
        // return view('setting',compact('get'));
        return $getuser = $get->users;
        //  foreach($getuser as $fetch)
        //  {
        //     return  $fetch->name;
        //  }
    }

    public function profil()
    {
        // $getauth=auth::user();
        // $id= $getauth->id;
        $id = auth::id();
        // $getprofil=User::findorfail($id);
        // return $getprofil->profail_user;


        $getprofil = User::select('id', 'name', 'email')->with(['profail_user' => function ($q) {
            $q->select('province', 'bio', 'gender', 'url', 'user_id');
        }])->get();

        // return $getprofil;
        return view('setting', compact('getprofil'));
    }
    public function addinfo(Request $request)
    {
        Cookie::queue(Cookie::make('name', 'ali luay', 1));
        return  Cookie::get('name');
        // $adduser=User::create([
        //     'name'=>$request->name,
        //     'email'=>$request->email,
        //     'password'=>Hash::make($request['password']),
        // ]);
        // $adduser->save();

        // return redirect()->back()->withInput();
    }

    public function wherehas()
    {
        return User::wherehas('profail_user')->get();
    }

    public function wherehasonly()
    {
        return User::whereHas('countaries', function ($q) {
            $q->where('code', 'KSA');
        })->get();
    }


    public function getaddres()
    {
        //    $get=Countary::with('users')->get();
        //    return $get;
        $get = User::select('countary_id', 'name', 'id')->with(['profail_user', 'countaries' => function ($q) {
            $q->select('name', 'id');
        }])->get();
        return view('allinfo', compact('get'));

        //   return    $get=User::select('countary_id','name','id')->with(['profail_user','countaries'=>function($q){
        //         $q->select('name','id');
        //     }])->find(1);
    }


    public function test()
    {
        // $users = User::where('id', $id)->get();

        // foreach ($users as $user) {
        //     echo $user->name .'<br>';
        // }

        // $users = User::all(); // هاي دالة all ترجعلك مصفوفة 
        // return $id;
        // return User::all(['id', 'name']); // retreve all records is data base only id and name => same select 
        // return  User::get()->map(function (User $user) {
        //     $user->name = Str::slug($user->name); // the slug function here the name Ali Luay retreve => ali-luay 
        //     return $user;
        // });
        // $array = [
        //     'name' => 'aliluay',
        //     'age' => 22
        // ];

        // dd(collect($array));  // هاي حتى ترجع كلكشن مو مصفوفة 

        $array = [
            ['name' => 'ali', 'exam' => 8],
            ['name' => 'israa', 'exam' => 10],
            ['name' => 'yousuf', 'exam' => 7],
            ['name' => 'huseen', 'exam' => 5],
            ['name' => 'rana', 'exam' => 3],
            ['name' => 'rana', 'exam' => 3],
            ['name' => 'rana', 'exam' => 3],
        ];
        // dd(collect($array)->avg('exam')); // خولت المصفوفة الى كولكشن وبعدين استخدمت الافرج لانها تتعامل مع كلكشن فقط ولان عندي مصفوفة كي وفاليو لازم احدد ياكي اريد اسوي عليه الافرج 
        // dd(collect($array)->chunk(3)); // هاي داله معناها اخذلي كل 3 سوة وحسب الرقم الي اريدة
        // $array = [
        //     [
        //         ['name' => 'ali', 'exam' => 8],
        //         ['name' => 'israa', 'exam' => 10],
        //         ['name' => 'yousuf', 'exam' => 7],
        //     ],
        //     [
        //         ['name' => 'huseen', 'exam' => 5],
        //         ['name' => 'rana', 'exam' => 3],
        //         ['name' => 'rana', 'exam' => 3],
        //     ],

        //     [
        //         ['name' => 'rana', 'exam' => 3],
        //         ['name' => 'rana', 'exam' => 3],
        //         ['name' => 'rana', 'exam' => 3],
        //     ]
        // ];
        // dd(collect($array)->collapse()); تجمع المصفوفات المنفصلة ب مصفوفة وحدة جبيرة 
        // return User::latest()->first()->full_name;
        // return User::all()->pluck('id'); // ترجعلك بس الايدي فقط 
        // return User::all(['id']); // هاي هم ترجع بس id
        // return strtr($string, array('۰' => '0', '۱' => '1', '۲' => '2', '۳' => '3', '٤' => '4', '۵' => '5', '٦' => '6', '۷' => '7', '۸' => '8', '۹' => '9'));

        $dd = Countary::paginate(5);
        dd($dd);
    }
    public function train($name)
    {
        return User::where('name', $name)->firstOrFail(); // retreve only first record in database 
    }
}