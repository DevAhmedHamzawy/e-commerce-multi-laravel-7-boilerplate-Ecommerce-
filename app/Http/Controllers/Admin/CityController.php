<?php

namespace App\Http\Controllers\Admin;

use App\Area;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\DataTables;

class CityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, Area $place)
    {
        if ($request->ajax()) {

            $areas = Area::getChildrenAreas($place->id);

            return DataTables::of($areas)->addIndexColumn()
            ->addColumn('actionone', function($row){$btn = '<a href="'.route("cities.edit", [Area::whereId($row->parent_id)->first()->name, $row->name]).'" class="edit btn btn-primary btn-sm">تعديل</a>';return $btn;})
            ->addColumn('actiontwo', function($row){$btn = '<a href="'.route("cities.delete", [Area::whereId($row->parent_id)->first()->name, $row->name]).'" class="delete btn btn-danger btn-sm">حذف</a>';return $btn;})
            ->rawColumns(['actionone','actiontwo'])
            ->addIndexColumn()
            ->make(true);

        }

        return view('admin.cities.index', compact('place'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Area $place)
    {
        return view('admin.cities.add', compact('place'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Area $place)
    {
        $validator = Validator::make($request->all(), ['name' => 'required']);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->with(['message' => 'من فضلك قم بمراجعة تلك الأخطاء', 'alert' => 'alert-danger']);
        }

        $request->merge(['parent_id' => $place->id]);

        Area::create($request->all());
        return redirect()->route('cities.index', $place->name)->with('message', 'Category Created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Area  $area
     * @return \Illuminate\Http\Response
     */
    public function show(Area $city)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Area  $area
     * @return \Illuminate\Http\Response
     */
    public function edit(Area $place, Area $city)
    {
        return view('admin.cities.edit', compact('place','city'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Area  $area
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Area $place, Area $city)
    {
        $validator = Validator::make($request->all(), ['name' => 'required']);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->with(['message' => 'من فضلك قم بمراجعة تلك الأخطاء', 'alert' => 'alert-danger']);
        }

        $city->update($request->all());
        return redirect()->route('cities.index' , [$place->name, $city->name])->with('message', 'City Updated Successfully');   
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Area  $area
     * @return \Illuminate\Http\Response
     */
    public function destroy(Area $place, Area $city)
    {
        return $city->delete() ? redirect()->back()->with('message', 'City Deleted Successfully') : abort(500);   
    }
}