<?php

namespace App\Http\Controllers\Admin;

use App\Area;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\DataTables;

class PlaceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {

            $areas = Area::whereParentId(15)->get();

            return DataTables::of($areas)->addIndexColumn()
            ->addcolumn('action', function($row){ $btn = '<a href="'.route("cities.index", [$row->name]).'" class="btn btn-primary">عرض</a>'; return $btn; })
            ->addColumn('actionone', function($row){$btn = '<a href="'.route("places.edit", [$row->name]).'" class="edit btn btn-primary btn-sm">تعديل</a>';return $btn;})
            ->addColumn('actiontwo', function($row){$btn = '<a href="'.route("places.delete", [$row->name]).'" class="delete btn btn-danger btn-sm">حذف</a>';return $btn;})
            ->rawColumns(['action','actionone','actiontwo'])
            ->addIndexColumn()
            ->make(true);

        }

        return view('admin.places.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.places.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), ['name' => 'required']);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->with(['message' => 'من فضلك قم بمراجعة تلك الأخطاء', 'alert' => 'alert-danger']);
        }

        $latlngArray = explode(',' , $request->input('latlng'));

        $request->merge(['parent_id' => 15, 'latitude' => $latlngArray[0] , 'longitude' => $latlngArray[1]]);


        Area::create($request->except('main_image','latlng'));
        return redirect()->route('places.index')->with('status', 'Category Created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Area  $area
     * @return \Illuminate\Http\Response
     */
    public function show(Area $place)
    {
        return view('admin.cities.show')->withCountry($place)->withCities(Area::getChildrenAreas($place->id));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Area  $area
     * @return \Illuminate\Http\Response
     */
    public function edit(Area $place)
    {
        return view('admin.places.edit')->withPlace($place);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Area  $area
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Area $place)
    {
        $validator = Validator::make($request->all(), ['name' => 'required']);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->with(['message' => 'من فضلك قم بمراجعة تلك الأخطاء', 'alert' => 'alert-danger']);
        }

        $latlngArray = explode(',' , $request->input('latlng'));
        $request->merge(['latitude' => $latlngArray[0] , 'longitude' => $latlngArray[1]]);

        $place->update($request->except('main_image','latlng'));
        return redirect()->route('places.index')->with('status', 'Country Updated Successfully');   
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Area  $area
     * @return \Illuminate\Http\Response
     */
    public function destroy(Area $place)
    {
        return $place->delete() ? redirect()->back()->with('status', 'Country Deleted Successfully') : abort(500);   
    }
}
