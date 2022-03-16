<?php


namespace App\Http\Controllers;


class HomeController extends Controller
{
    public function show()
    {
        return view('home', ['data' => self::findBuildDate()]);
    }

    public static function findBuildDate()
    {

        $arr = self::createGomrokArray("anbar");
//        $arr = self::createGomrokArray("baskool");


        $gomrokat = [];
        foreach ($arr as $key => $value) {
            $count = count($gomrokat);
            $gomrokat[$count]["name"] = $key;
            $gomrokat[$count]["ip"] = $value;
        }


        $result = array();

        set_time_limit(200);
        foreach ($gomrokat as $item) {
            $item["buildDate"] = @file_get_contents("http://" . $item["ip"] . "/buildDate");
            array_push($result, $item);
        }

        usort($result, "\\App\\Http\\Controllers\\HomeController::cmp");

        return $result;
    }

    private static function createGomrokArray($module)
    {
        if ($module == "anbar") {
            $file = file('C:\Z\work\laravelProject\fetchBuildDate\storage\app\anbar.txt');
            return self::convertFileToArray($file);
        } else if ($module == "baskool") {
            $file = file('C:\Z\work\laravelProject\fetchBuildDate\storage\app\baskool.txt');
            return self::convertFileToArray($file);
        }
    }

    private static function convertFileToArray($file)
    {
        $arr = [];
        foreach ($file as $key => $value) {
            $k = explode("=", $value)[0];
            $v = explode("=", $value)[1];
            $arr[$k] = str_replace("\n", "", $v);
        }
        return $arr;
    }

    private static function cmp($a, $b)
    {
        return strcmp($a["buildDate"], $b["buildDate"]);
    }
}
