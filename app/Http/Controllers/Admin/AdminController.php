<?php

namespace App\Http\Controllers\Admin;

use App\Admin;
use App\Area;
use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\VendorProducerCategory;
use App\VendorStoreCategory;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\DataTables;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {

            $admins = Admin::whereRole(0)->get();

            return DataTables::of($admins)->addIndexColumn()
            ->addColumn('actionone', function($row){$btn = '<a href="'.route("admins.edit", [$row->user_name, 'type' => 1]).'" class="edit btn btn-primary btn-sm">تعديل</a>';return $btn;})
            ->addColumn('actiontwo', function($row){$btn = '<a href="'.route("admins.delete", [$row->user_name]).'" class="delete btn btn-danger btn-sm">حذف</a>';return $btn;})
            ->rawColumns(['actionone','actiontwo'])
            ->addIndexColumn()
            ->make(true);

        }

        return view('admin.admins.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.admins.add', ['type' => request()->type, 'producers_categories' => Category::whereCategoryId(53)->get(), 'stores_categories' => Category::whereCategoryId(54)->get(), 'areas' => Area::whereParentId(15)->get()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), ['user_name' => 'required', 'email' => 'required|email']);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->with(['message' => 'من فضلك قم بمراجعة تلك الأخطاء', 'alert' => 'alert-danger']);
        }

        $request->merge(['password' => bcrypt($request->password), 'img' => 'profile-45x45.png']);

        if($request->type == 0) $request->merge(['role' => 1]);

        if($request->has('training')){
            $request->merge(['training' => $request->training]);
        }

        if($request->has('services')){
            $request->merge(['services' => $request->services]);
        }

        if($request->has('transporting')){
            $request->merge(['transporting' => $request->transporting]);
        }

        $admin = Admin::create($request->except('mobile','type','producers_categories','stores_categories'));

        if($request->has('producers_categories')){
            foreach ($request->producers_categories as $key => $value) {
                VendorProducerCategory::create(['admin_id' => $admin->id, 'producer_category_id' => $key]);
            }
        }


        if($request->has('stores_categories')){
            foreach ($request->stores_categories as $key => $value) {
                VendorStoreCategory::create(['admin_id' => $admin->id, 'store_category_id' => $key]);
            }
        }


        

        
        return  $request->type == 1 ? redirect('admin/admins') : redirect('admin/the_vendors');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function show(Admin $admin)
    {
        return view('admin.admins.show', compact('admin'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function edit(Admin $admin)
    {

        $vendor_producers = VendorProducerCategory::whereAdminId($admin->id)->get('producer_category_id')->toArray();

        $vendor_producers = array_column($vendor_producers, 'producer_category_id');

        $vendor_stores = VendorStoreCategory::whereAdminId($admin->id)->get('store_category_id')->toArray();

        $vendor_stores = array_column($vendor_stores, 'store_category_id');


        //$theArea = Area::whereId($admin->area_id)->first();
        //$theAreaParentName = Area::whereId($theArea->parent_id)->first();
        //'areas' => Area::whereParentId(15)->get() , 'theArea' => $theArea, 'theAreaParentName' => $theAreaParentName

        return view('admin.admins.edit', ['admin' => $admin, 'type' => request()->type, 'producers_categories' => Category::whereCategoryId(53)->get(), 'stores_categories' => Category::whereCategoryId(54)->get(), 'vendor_producers' => $vendor_producers, 'vendor_stores' => $vendor_stores]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Admin $admin)
    {

        $validator = Validator::make($request->all(), ['user_name' => 'required', 'email' => 'required|email']);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->with(['message' => 'من فضلك قم بمراجعة تلك الأخطاء', 'alert' => 'alert-danger']);
        }



        if($request->has('training')){
            $request->merge(['training' => $request->training]);
        }

        if($request->has('services')){
            $request->merge(['services' => $request->services]);
        }

        if($request->has('transporting')){
            $request->merge(['transporting' => $request->transporting]);
        }


        $request->has('password') ? $except = ['type','password','producers_categories','stores_categories'] : $except = ['type','producers_categories','stores_categories'];

        $admin->update($request->except($except));


        if($request->has('producers_categories')){
            VendorProducerCategory::whereAdminId($admin->id)->delete();
            foreach ($request->producers_categories as $key => $value) {
                VendorProducerCategory::create(['admin_id' => $admin->id, 'producer_category_id' => $key]);
            }
        }


        if($request->has('stores_categories')){
            VendorStoreCategory::whereAdminId($admin->id)->delete();
            foreach ($request->stores_categories as $key => $value) {
                VendorStoreCategory::create(['admin_id' => $admin->id, 'store_category_id' => $key]);
            }
        }

        return  $request->type == 1 ? redirect('admin/admins') : redirect('admin/the_vendors');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function destroy(Admin $admin)
    {
        $admin->delete();
        return redirect('admin/admins');
    }
}