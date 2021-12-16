<?php

namespace App\Http\Controllers\Main;

use App\Category;
use App\Product;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function index(Request $request)
    {

        $products = Product::where('name', 'LIKE', '%'.$request->name.'%');

        if($request->has('category_id')) { 

            if ($request->category_id != 'All Categories' && $request->category_id != 'جميع الأقسام') {
             
         
                $category = Category::whereId($request->category_id)->with('subcategories')->firstOrFail();

                $ids = $category->subcategories->map(function ($s) {
                    return collect($s->toArray())
                        ->only(['id'])
                        ->all();
                });

                $products->whereIn('category_id', $ids);
            }
        
        }

        return view('main.search.results', ['products' => $products->get(), 'n' => 0]);

    }
}
