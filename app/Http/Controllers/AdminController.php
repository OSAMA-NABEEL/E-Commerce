<?php

namespace App\Http\Controllers;

use App\models\Category;
use App\models\Product;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    //
    public function dashboard(){

        $categories = Category::all();
        return view("admin.dashboard",compact("categories"));
    }
    public function dashboard_products()
    {
        $products = Product::where("status","=",0)->paginate(6);
//        dd($products);
        return view("admin.dashboard",compact("products"));
    }
    public function dashboard_products_one(Category $category)
    {
        $products = Product::where("category_id","=",$category->id)->paginate(6);
//        dd($products);
        $categoryOne = Product::where("category_id","=",$category->id)->paginate(6);
//        return $category->Products;
        return view("admin.dashboard",compact("categoryOne"));
    }
}
