<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class powerController extends Controller
{
    public function index()
    {
        //  عملية تعريف مصفوفة
        $cars = [
            "index1" => "GMC",
            "index2" => "C300",
            "index3" => "helux"
        ];
        $cars['index4'] = 'aliluay';
        $cars['index5'] = 'haland'; // اضافة عناصر للمصفوفة
        array_push($cars, "odegard"); // اضافة عنصر الى مصفوفة بطريقة اخرى
        // #########################################################
        $players = ["hazard", "Mpappe", "jovic"]; // مصفوفة ثانية
        // ########################################################
        $random = array_rand($players, 1); //  يجيب اندكس عشواءي
        $random = $players[$random];   // هنا اخذنة الاندكس العشواءي ورجعنا للمصفوفة وطلعنا القيمة مالته
        //  return $random;
        // ####################################################
        $split = array_chunk($cars, 2); // هاي فاكشن راح اقسم المصفوفة الى مصفوفات  متكونة من عنصرين
        // return $split;
        // [["GMC","C300"],["helux","aliluay"],["haland","odegard"]]   الناتج
        // ######################################################
        // $fname = array("Peter", "Ben", "Joe");
        // $age = array("35", "37", "43");
        // $c = array_combine($fname, $age); فاكشن تدمج المصفوفتين تعتبر اول وحدة الاندكس والثانية الفاليو
        // print_r($c);
        // Array ( [Peter] => 35 [Ben] => 37 [Joe] => 43 )   ناتج
        //#####################################################
        // $age = array("Peter" => "35", "Ben" => "37", "Joe" => "43");
        // print_r(array_change_key_case($age, CASE_UPPER)); فاكشن تحول للاحرف كبيرة او صغيرة
        // ##########################################################
        //  $add = ["ali", "ali", "luay", "khaal"];
        //   $value = array_count_values($add); تعطيك كم مرة متكرر العنصر بلمصفوفة
        // {"ali":2,"luay":1,"khaal":1}  ناتج
        // ##########################################################
        // $a1 = array("a" => "red", "b" => "green", "c" => "blue", "d" => "yellow");
        // $a2 = array("e" => "red", "f" => "green", "g" => "blue");
        // $result = array_diff($a1, $a2); فاكشن نخلي بيها مصفوفتين  وتطلع الاختلاف بين مصفوفتين
        // print_r($result);
        // Array ( [d] => yellow )  ناتج
        // $a1 = array("a" => "red", "b" => "green", "c" => "blue");
        // $a2 = array("a" => "red", "c" => "blue", "d" => "pink");

        // $result = array_diff_key($a1, $a2);  هم تطلع المختلف
        // print_r($result);
        // #################################################
        // البحث في مصفوفة
        // if (array_key_exists('new_image', $request)) {
        //     $request['picture_passport'] = $this->uploadPicture($request['new_image'], '/image/');
        // } elseif (!array_key_exists('picture_passport', $request)) {
        //     $request['picture_passport'] = null;
        // } elseif (array_key_exists('picture_passport', $request)) {
        //     $request['picture_passport'] =  $request['picture_passport'];
        // }
        //############################################################
        // $a = array("red", "green", "blue", "yellow", "brown");
        // print_r(array_slice($a, 2));  اخليها تبدي من ثاني اندكس
        //array_slice(array, start, length, preserve) طريقة الكتابة
        //Array ( [0] => blue [1] => yellow [2] => brown )  ناتج
        // #################################################
        // $a = array(5, 15, 25);
        // echo array_sum($a);
        // $a = array(5, 7, 2);
        // echo (array_product($a)); عملية ضرب عناصر المصفوفة
        // 70 ناتج
        // ##########################################################
        array_push($players, $cars); // اضافة مصفوفة بداخل مصفوفة
        // ##########################################################
        $new = [];
        // جلب عناصر مصفوفة الثانية ودمجها مع عناصر المصفوفة الاولى
        foreach ($players as $index) {
            array_push($cars, $index);
        }

        //  عملية استخدام المصفوفة الي بداخل الفاكشن

        function getArray()
        {
            return array("ali", "luay", "php");
        }
        $secondElement = getArray()[1];  // الطباعة

        //حذف عناصر من المصفوفة
        unset($players[0]); // راح يحذف  اول عنصر من مصفوفة
        unset($cars["index1"]); // حتى يحذفة  اذا جنت معرف اندكس للعنصر  لازم انطي الاندكس
        // بالمختصر حذف من المصفوفة عن طريق الاندكس
        $a = array_values($players); // return جلب قيمة المصفوفة حالها حال ال
        $count = count($cars);  //ارجاع عدد عناصر المصفوفة
        for ($i = 0; $i <= $count; $i++) {
            array_push($new, $i);
        }

        //  dd($cars);
        return $count;
    }
}