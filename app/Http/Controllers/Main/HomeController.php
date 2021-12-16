<?php

namespace App\Http\Controllers\Main;

use App;
use App\Admin;
use App\Category;
use App\Order;
use App\Partner;
use App\Product;
use App\Settings;
use App\Slider;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
       // $this->middleware('auth')->except('welcome');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('main.home');
    }

    public function welcome()
    {
        return view('main.welcome')->withMainSliders(Slider::whereMainPage(1)->get())->withProducts(Product::take(10)->get())->withCategorySpecific(Category::findOrFail(54))->withSpecialProducts(Product::whereSpecial(1)->take(10)->get())->withLocations(Admin::whereRole(1)->get())->withProducersCategories(Category::whereCategoryId(53)->get())->withVendorsCategories(Category::whereCategoryId(54)->get());       
    }

    public function invoice(Order $order)
    {
        return view('invoice.show', compact('order'));
    }

    private function getSpecificCategories()
    {
        //$categoryIds = json_decode(Settings::findOrFail(1)->category_ids_main_page_app);

        $categoryIds = json_decode(Settings::whereParentId(null)->limit(5)->get());


        $categories = Category::whereIn('id', $categoryIds)->with('subcategories')->get();

        
        foreach ($categories as $category) {
    
            if(!empty($category->subcategories)){
                $ids = $category->subcategories->map(function ($s) {
                    return collect($s->toArray())
                        ->only(['id'])
                        ->all();
                });    


                $category->products = Product::whereIn('category_id', $ids)->get();
            }
        }
    }

    //dd($category->products);
}
