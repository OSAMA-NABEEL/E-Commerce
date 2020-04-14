<?php

namespace App\Http\Controllers;

use App\models\Product;
use App\models\ShoppingCart;
use Illuminate\Http\Request;

class ShoppingCartController extends Controller
{
    //
    public function addToCart(Product $product,int $QTY)
    {
        if(!auth()->check())
        {
            return redirect()->route('login');
        }

        $found = ShoppingCart::where([
            ["products_id" , "=" , $product->id],
            ["users_id" , "=" , auth()->user()->id]

        ])->get()->count();
        if($found!= 0)
        {
            return redirect()->back()->withErrors("This is Alredy in bag");
        }
        $cart = new ShoppingCart();
        $cart->quantity = $QTY;
        $cart->products_id = $product->id;
        $cart->users_id = auth()->user()->id;
        $cart->save();
        $product->QTY -= $QTY;
        $product->save();

        return redirect()->back()->withMessage("Message");
    }
}
