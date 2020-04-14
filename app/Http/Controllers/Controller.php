<?php

namespace App\Http\Controllers;

use App\models\Category;
use App\User;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    public function index(){
        //dd(Category::first()->products[0]->category);
        $categories = Category::all();
//        dd($categories[0]->Products->last()->id);
        return view("user.home",[
            "categories" => $categories
        ]);
    }
    public function userHistory(User $user)
    {
        $shoppingCarts = true;
        return view("user.history",compact("user","shoppingCarts"));
    }
    public function userHistoryOrders(User $user)
    {
        $orders = true;
        return view("user.history",compact("user","orders"));

    }
}
