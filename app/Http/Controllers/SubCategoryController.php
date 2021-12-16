<?php

namespace App\Http\Controllers;

use App\Category;


class SubCategoryController extends Controller
{
    public function list($id)
    {
        return Category::where('category_id',$id)->get();
    }
}
