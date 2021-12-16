<?php

namespace App\Http\Controllers\Vendor;

use App\Admin;
use App\Area;
use App\Category;
use App\Http\Controllers\Controller;
use App\Upload\Upload;
use App\VendorProducerCategory;
use App\VendorStoreCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SettingsController extends Controller
{

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Admin  $vendor
     * @return \Illuminate\Http\Response
     */
    public function edit(Admin $vendor)
    {
        if($vendor->id !== auth()->user()->id) { abort(403); }

        $vendor_producers = VendorProducerCategory::whereAdminId(auth()->user()->id)->get('producer_category_id')->toArray();

        $vendor_producers = array_column($vendor_producers, 'producer_category_id');

        $vendor_stores = VendorStoreCategory::whereAdminId(auth()->user()->id)->get('store_category_id')->toArray();

        $vendor_stores = array_column($vendor_stores, 'store_category_id');

        ///$theArea = Area::whereId($vendor->area_id)->first();
        //$theAreaParentName = Area::whereId($theArea->parent_id)->first();
        //'areas' => Area::whereParentId(15)->get() , 'theArea' => $theArea, 'theAreaParentName' => $theAreaParentName

        return view('vendor.settings.edit', ['vendor' => $vendor, 'producers_categories' => Category::whereCategoryId(53)->get(), 'stores_categories' => Category::whereCategoryId(54)->get(), 'vendor_producers' => $vendor_producers, 'vendor_stores' => $vendor_stores]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Admin  $vendor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Admin $vendor)
    {
        if($vendor->id !== auth()->user()->id) { abort(403); }

        //$validator = Validator::make($request->all(), ['user_name' => 'required', 'email' => 'required']);

        //if($validator->fails()){
        //    return redirect()->back()->withErrors($validator)->with(['message' => 'من فضلك قم بمراجعة تلك الأخطاء', 'alert' => 'alert-danger']);
        //

        if ($request->has('main_image')) {
            $request->merge(['img' => Upload::uploadImage($request->main_image, 'admins' , $vendor->id)]);
        }

        if ($request->has('password')) {
            $request->merge(['password' => bcrypt($request->password)]);
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


        if($request->has('latlng')){
            $latlngArray = explode(',' , $request->input('latlng'));
            if($latlngArray[0] != "") { $request->merge(['lat' => $latlngArray[0] , 'lng' => $latlngArray[1]]); }
        }

    
        $vendor->update($request->except('_token','_method','1','0', 'main_image','producers_categories','stores_categories','latlng'));


        if($request->has('producers_categories')){
            VendorProducerCategory::whereAdminId($vendor->id)->delete();
            foreach ($request->producers_categories as $key => $value) {
                VendorProducerCategory::create(['admin_id' => $vendor->id, 'producer_category_id' => $key]);
            }
        }


        if($request->has('stores_categories')){
            VendorStoreCategory::whereAdminId($vendor->id)->delete();
            foreach ($request->stores_categories as $key => $value) {
                VendorStoreCategory::create(['admin_id' => $vendor->id, 'store_category_id' => $key]);
            }
        }


        return redirect()->route('v_dashboard');
    }

}
