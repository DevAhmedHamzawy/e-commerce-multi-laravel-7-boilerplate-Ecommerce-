<?php

namespace App\Http\Controllers\Vendor;

use App\Area;
use App\Category;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProductFormRequest;
use App\Option;
use App\Upload\Upload;
use Yajra\DataTables\DataTables;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {

            $products = Product::whereUserId(auth()->user()->id)->get();

            return DataTables::of($products)->addIndexColumn()
          
            ->addColumn('actionone', function($row){$btn = '<a href="'.route("v_products.edit", [$row->slug]).'" class="edit btn btn-primary btn-sm">تعديل</a>';return $btn;})
            ->addColumn('actiontwo', function($row){$btn = '<a href="'.route("v_products.delete", [$row->slug]).'" class="delete btn btn-danger btn-sm">حذف</a>';return $btn;})
            ->rawColumns(['actionone','actiontwo'])
            ->addIndexColumn()
            ->make(true);

        }

        $products = Product::whereUserId(auth()->user()->id)->orderByDesc('id')->get();

        
       
        $options = Option::all();
        $categories = Category::whereCategoryId(null)->where('id' , '!=' , 53)->where('id', '!=' , 54)->get();

        $areas = Area::whereParentId(15)->get();

        foreach ($areas as $area) {
            $area->children = Area::whereParentId($area->id)->get();
        }

        $services = auth()->user()->theServices;

        return view('vendor.products.index', compact('products', 'options', 'categories', 'areas', 'services'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $options = Option::all();
        $categories = Category::whereCategoryId(null)->where('id' , '!=' , 53)->where('id', '!=' , 54)->get();

        $areas = Area::whereParentId(15)->get();

        foreach ($areas as $area) {
            $area->children = Area::whereParentId($area->id)->get();
        }

        $services = auth()->user()->theServices;

        return view('vendor.products.add', compact('options', 'categories', 'areas', 'services'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductFormRequest $request)
    {

        $request->merge(['image' => Upload::uploadImage($request->main_image[0], 'products' , rand(0,9999999))]);

        $request->merge(['other_images' => json_encode(Upload::uploadAttachments($request->main_image, 'products' , rand(0,9999999)))]);

        
        $the_other_options = $request->the_other_options;

        foreach($this->secure_iterable($the_other_options) as $key => $value) {
            $options = json_decode(Option::findOrFail($key)->options);

            $newOptions = [];

            foreach($this->secure_iterable($options) as $key1 => $value1){
                
                array_push($newOptions, array_search((string)$key1, $value));
            }

            $the_other_options[$key] = $newOptions;
        }

       !isset($request->groups) ?  : $request->merge(['groups' => 1]) ;
       !isset($request->offers) ?  : $request->merge(['offers' => 1]) ;
       !isset($request->distributions) ?  : $request->merge(['distributions' => 1]) ;


        $request->merge(['user_id' => auth()->user()->id, 'slug' => Str::slug(request('name')), 'options' => json_encode($the_other_options)]);
        $product = Product::create($request->except('the_other_options', 'main_image'));

        $product->code = auth()->user()->id.'-'.$request->category_id.'-'.$product->id;
        $product->update();
       

        return redirect()->route('v_products.index')->with('status', 'Product Created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $v_product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $v_product)
    {
        return view('vendor.products.show')->withProduct($v_product)->withSubproducts($v_product->subproducts());
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $v_product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $v_product)
    {
        $options = Option::all();
        $categories = Category::whereCategoryId(null)->where('id' , '!=' , 53)->where('id', '!=' , 54)->get();

        // Get Current Category Then SubCategory
        $subCategory = Category::where('id', $v_product->category_id)->first();
        $subCategory == null ? $category = null : $category = Category::where('id', $subCategory->category_id)->first()->id;
        $theCategory = $category;
        $theSubCategory = $subCategory;


        $selectedOptions = (array)json_decode($v_product->options);

        //dd($v_product->category->options->toArray());

        //dd($selectedOptions);
       
        $areas = Area::whereParentId(15)->get();

        foreach ($areas as $area) {
            $area->children = Area::whereParentId($area->id)->get();
        }

        $services = auth()->user()->theServices;

        return view('vendor.products.edit', compact('options', 'categories', 'v_product', 'theCategory', 'theSubCategory', 'selectedOptions', 'areas','services'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $v_product
     * @return \Illuminate\Http\Response
     */
    public function update(ProductFormRequest $request, Product $v_product)
    {
        if($request->has('main_image'))
        {
        
            /*if(isset($request->main_image[0])) {
            $request->merge(['image' => Upload::uploadImage($request->main_image[0], 'products' , $v_product->code)]);
            }else{
            $request->merge(['image' => Upload::uploadImage($request->main_image[1], 'products' , $v_product->code)]);  
            }*/

        
            $v_product->other_images = json_encode(Upload::uploadAttachments($request->main_image, $v_product->name));
            $request->merge(['other_images' => json_encode(Upload::mergeAttachments($v_product, json_decode($v_product->other_images)))]);
            
        
        }


        $the_other_options = $request->the_other_options;

        foreach($this->secure_iterable($the_other_options) as $key => $value) {
            $options = json_decode(Option::findOrFail($key)->options);

            $newOptions = [];

            foreach($this->secure_iterable($options) as $key1 => $value1){
                
                array_push($newOptions, array_search((string)$key1, $value));
            }

            $the_other_options[$key] = $newOptions;
        }


        !isset($request->groups) ?  : $request->merge(['groups' => 1]) ;
        !isset($request->offers) ?  : $request->merge(['offers' => 1]) ;
        !isset($request->distributions) ?  : $request->merge(['distributions' => 1]) ;
 

        $request->merge(['user_id' => auth()->user()->id, 'slug' => Str::slug(request('name')), 'options' => json_encode($the_other_options)]);
        $v_product->update($request->except('the_other_options', 'main_image'));

        return redirect()->route('v_products.index')->with('status', 'Product Updated Successfully');   
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $v_product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $v_product)
    {
        $v_product->delete();
        return redirect()->back()->with('status', 'Product Deleted Successfully');   
    }

    public function special(Product $v_product)
    {
        $v_product->special ^= 1 ;
        $v_product->update();

        return redirect()->back()->with(['message' => 'تم التعديل بنجاح', 'alert' => 'alert-success']);
    }

    function secure_iterable($var)
    {
        return is_iterable($var) ? $var : array();
    }

    public function deleteMany(Request $request)
    {
        product::whereIn('id', $request->checked[0])->delete();
        return true;
    }
}
