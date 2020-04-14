<?php

namespace App\Http\Controllers;

use App\models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    //
    public function getProducts(Category $category)
    {

        return view("user.category",compact('category'));
    }
    public function deleteCategory(Category $category)
    {
        $category->delete();
        return redirect()->back()->withErrors(["Item Deleted"]);
    }
    public function updateCategory(Category $category)
    {

        $isUpdate = true;
        return view ("admin.category",compact("category","isUpdate"));
    }
    public function createCategory()
    {
        return view("admin.category");
    }
}
