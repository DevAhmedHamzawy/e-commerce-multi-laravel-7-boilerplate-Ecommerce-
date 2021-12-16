<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Upload\Upload;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategoryTwoController extends Controller
{

    /**
     * NOTE :- The Views Folder Of This Controller IS :- Categories_two
     * NOTE :- The Routes Name Of This Controller IS :- stores_categories
    */

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {

            $categories = Category::whereCategoryId(54)->get();

            return DataTables::of($categories)->addIndexColumn()
            ->addColumn('actionone', function($row){$btn = '<a href="'.route("stores_categories.edit", [$row->slug]).'" class="edit btn btn-primary btn-sm">تعديل</a>';return $btn;})
            ->addColumn('actiontwo', function($row){$btn = '<a href="'.route("stores_categories.delete", [$row->slug]).'" class="delete btn btn-danger btn-sm">حذف</a>';return $btn;})
            ->addColumn('actionthree', function($row){$btn = '<a href="'.route("the_sliders.index", [$row->slug]).'" class="edit btn btn-primary btn-sm">إظهار العروض</a>';return $btn;})
            ->rawColumns(['actionone','actiontwo', 'actionthree'])
            ->addIndexColumn()
            ->make(true);

        }

        return view('admin.categories_two.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.categories_two.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        if($request->has('main_image'))
        {
            $request->merge(['image' => Upload::uploadImage($request->main_image, 'categories' , $request->name)]);
        }

        $validator = Validator::make($request->all(), ['name' => 'required']);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->with(['message' => 'من فضلك قم بمراجعة تلك الأخطاء', 'alert' => 'alert-danger']);
        }


        $request->merge(['slug' => Str::slug(request('name')).'_'.rand(0,9999), 'category_id' => 54]);
        $category = Category::create($request->except('main_image'));

        
        return redirect()->route('stores_categories.index')->with('status', 'Category Created Successfully');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $stores_category)
    {
        $category = $stores_category;

        return view('admin.categories_two.edit')->withCategory($category);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $stores_category)
    {

        $category = $stores_category;

        if($request->has('main_image'))
        {
            $request->merge(['image' => Upload::uploadImage($request->main_image, 'categories' , $request->name)]);
        }

        $validator = Validator::make($request->all(), ['name' => 'required']);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->with(['message' => 'من فضلك قم بمراجعة تلك الأخطاء', 'alert' => 'alert-danger']);
        }


        $request->merge(['slug' => Str::slug(request('name')).'_'.rand(0,9999)]);


        $category->update($request->except('main_image'));
        return redirect()->route('stores_categories.index')->with('status', 'Category Updated Successfully');   
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $stores_category)
    {
        $stores_category->delete();
        return redirect()->back()->with('status', 'Category Deleted Successfully');   
    }
}
