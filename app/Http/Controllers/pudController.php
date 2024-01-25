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

    public function getDrinkWithType(){

        $drinks = DB::table( "drinks")->
            select(
                "drinks.drink as Ital",
                "drinks.amount as Mennyiség",
                "types.type as Típus"
            )->join(
                "types", "drinks.type_id", "=", "types.id"
            )->get();

        return $drinks;
    }

    public function getLeftDrink(){

        $drinks = DB::table( "drinks" )->
        select(
            "drinks.drink as Ital",
            "drinks.amount as Mennyiség",
            "types.type as Típus"
        )->
        leftJoin(
            "types", "drinks.type_id", "=", "types.id"
        )->
        get();

        return $drinks;
    }

    public function getrightDrink(){

        $drinks = DB::table( "drinks" )->
        select(
            "drinks.drink as Ital",
            "drinks.amount as Mennyiség",
            "types.type as Típus"
        )->
        rightJoin(
            "types", "drinks.type_id", "=", "types.id"
        )->
        get();

        return $drinks;
    }

    public function getAllableData(){


        $drinks = DB::table( "drinks")->
        select(
            "drinks.drink as Ital",
            "drinks.amount as Mennyiség",
            "types.type as Típus",
            "packages.package as Kiszerelés"
        )->join(
            "types", "drinks.type_id", "=", "types.id"
        )->join(
            "packages", "drinks.package_id", "=", "packages.id"
        )->get();

    return $drinks;
 

    }

    public function getLastId(){
        $id = DB::table("types")->insertGetId([
            "type" => "Zacskos"
        ]
        );

        return $id;
    }

    public function deleteDrink(){
        DB::table( "drinks" )->where( "drink", "Kóla" )->delete(); 
    }


    public function deleteType(){
        DB::table( "types" )->where( "type", "Zacskos" )->delete(); 

        return "ok";
    }

}
