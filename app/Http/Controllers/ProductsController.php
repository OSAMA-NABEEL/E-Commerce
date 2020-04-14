<?php

namespace App\Http\Controllers;

use App\models\Product;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    //
    public function deleteProduct(Product $product)
    {
        return redirect()->back();
    }
    public function updateProduct(Product $product)
    {
        $isUpdate = true;
        return view("admin.product",compact('product','isUpdate'));
    }
    public function createProduct()
    {

        return view("admin.product");
    }

}
