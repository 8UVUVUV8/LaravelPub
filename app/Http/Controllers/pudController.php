<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class pudController extends Controller
{
    public function getDrinks(){
        $drinks = DB::table( "drinks" )->get();

        return $drinks;
    }

    public function getOneDrink($drinkName){

        $drink= DB::table( "drinks" )->where("drink", $drinkName)->first();

        return $drink;
    }

    public function getLikeDrinks($likeText){
        $likeText = "%".$likeText."%";
       $drinks = DB::table("drinks")->where( "drink", "like", $likeText)->get();

       return $drinks;
    }

    public function getLess30($value1, $value2){ 

        $drinks = DB::table("drinks")->whereBetween( "amount", [$value1, $value2])->get();

        return $drinks;
    }

    public function addDrink(){
        $drink = DB::table( "drinks" )->insert([
            "drink" => "Sprite",
            "amount" => 54,
            "type_id" => 4,
            "package_id" => 1
        ]);

        return $drink;
    }
}
