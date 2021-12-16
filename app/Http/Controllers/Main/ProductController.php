<?php

namespace App\Http\Controllers\Main;

use App\Admin;
use App\Category;
use App\Http\Resources\ProductResource;
use App\Option;
use App\Product;
use App\VendorProducerCategory;
use App\VendorStoreCategory;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Category $category)
    {

        // main category 53 or 54 related to 'vendor_producer_categories' or 'vendor_store_categories'
        if($category->category_id == 53) 
        {    
    
            /*$category = Category::whereId($category->category_id)->with('subcategories')->firstOrFail();

            $ids = $category->subcategories->map(function ($s) {
                return collect($s->toArray())
                    ->only(['id'])
                    ->all();
            });*/

            // products here will refer to the vendors producers categories table
            $vendors =  VendorProducerCategory::where('producer_category_id', $category->id)->get();
        
            // then get their ids
            $ids = $vendors->map(function ($s) {
                return collect($s->toArray())
                    ->only(['admin_id'])
                    ->all();
            });

            $vendors = Admin::whereIn('id', $ids)->get();

            $products = Product::whereIn('user_id', $ids)->get();
            
            return view('main.vendors.index', compact('vendors','category','products'));

        }


        // main category 53 or 54 related to 'vendor_producer_categories' or 'vendor_store_categories'
        if($category->category_id == 54){

            /*$category = Category::whereId($category->category_id)->with('subcategories')->firstOrFail();

            $ids = $category->subcategories->map(function ($s) {
                return collect($s->toArray())
                    ->only(['id'])
                    ->all();
            });*/
            
            // products here will refer to the vendors producers categories table
            $vendors =  VendorStoreCategory::where('store_category_id', $category->id)->get();
            
            // then get their ids
            $ids = $vendors->map(function ($s) {
                return collect($s->toArray())
                    ->only(['admin_id'])
                    ->all();
            });

            $vendors = Admin::whereIn('id', $ids)->get();

            $products = Product::whereIn('user_id', $ids)->get();
            
            return view('main.vendors.index', compact('vendors','category','products'));

        }



        if($category->category_id == null) {
           
            $category = Category::whereId($category->id)->with('subcategories')->firstOrFail();

            $ids = $category->subcategories->map(function ($s) {
                return collect($s->toArray())
                    ->only(['id'])
                    ->all();
            });

            $products = Product::whereIn('category_id', $ids)->get();
            
            
            return view('main.products.index', compact('products','category'));
        }
        
        $category->subcategories = Category::whereCategoryId($category->category_id)->get();
        $products = Product::whereCategoryId($category->id)->get();

        return view('main.products.index', compact('products','category'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        
         // Get The Product Options
         $the_options = json_decode($product->options);
         
         // Initialize Array For The Only Available Checked Options
         $optionsArray = [];
 
         if($the_options != []){
             foreach ($the_options as $key => $value) {
               
                 // Get The Option's Whole Object
                 $option = Option::findOrFail($key);
 
                 // Put The Property Id As Array Value 
                 $optionsArray[$option->id] = [];
 
                 // get The Pure Original Options Of The Product
                 $the_pure_options = json_decode($option->options);
              
                 // Put Only The Selected Once As Available In The Array  
                 for ($i=0; $i < count($the_pure_options); $i++) { !isset($value[$i]) ? : !is_numeric($value[$i]) ? : array_push($optionsArray[$option->id],['name' => $option->name , 'value' => $the_pure_options[$i]]); }
 
             }
         }

        $options = $optionsArray; 
        $category = Category::findOrFail($product->category_id);
        $mainCategory = Category::findOrFail($category->category_id);

        $similarProducts = Product::whereCategoryId($category->id)->inRandomOrder()->limit(3)->get();
        return view('main.products.show', compact('product', 'category', 'mainCategory', 'options', 'similarProducts'));
    }

}