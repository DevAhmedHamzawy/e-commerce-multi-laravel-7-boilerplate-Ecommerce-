<?php

namespace App\Http\Controllers\Main;

use App\Admin;

class VendorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('main.vendors.index')->withVendors(Admin::whereRole(1)->get());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function show(Admin $the_all_vendor)
    {
        return view('main.vendors.show')->withVendor($the_all_vendor);
    }

    public function page(Admin $vendor_page)
    {
        switch (request()->type) {
                case 'groups':
                    $vendor_page->products = $vendor_page->products->filter(function($item) { return $item->groups == 1; });
                break;

                case 'offers':
                    $vendor_page->products = $vendor_page->products->filter(function($item) { return $item->offers == 1; });
                break;

                case 'distributions':
                    $vendor_page->products = $vendor_page->products->filter(function($item) { return $item->distributions == 1; });
                break;

                case 'discounts':
                    $vendor_page->products = $vendor_page->products->filter(function($item) { return $item->discount > 0; });
                break;
        }

        return view('main.vendors.page')->withVendor($vendor_page);
    }

    public function onMap()
    {
        $locations = Admin::whereRole(1)->get();
    	return view('main.vendors.map.show',compact('locations'));
    }
}
