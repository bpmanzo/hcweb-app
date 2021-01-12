<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    //
    public function index(){
        // $products = [0=> ["name"=>"Iphone","category"=>"smart phones", "price"=>1000],
        //         1=> ["name"=>"Galaxy","category"=>"tablets", "price"=>2000],
        //         2=> ["name"=>"Sony","category"=>"TV", "price"=>3000]];
        
        $products = Product::all();
        
        return view("allproducts", compact("products"));

    }
}
