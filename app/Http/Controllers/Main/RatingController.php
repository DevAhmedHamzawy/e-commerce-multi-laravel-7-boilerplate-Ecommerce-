<?php

namespace App\Http\Controllers\Main;

use Illuminate\Http\Request;

class RatingController extends Controller
{
    public function store(Request $request)
    {
        !auth()->user()->ratings()->whereProductId($request->product_id)->exists() ? : auth()->user()->ratings()->whereProductId($request->product_id)->delete();
        auth()->user()->ratings()->create(['product_id' => $request->product_id, 'rating' => $request->star, 'comment' => $request->comment]);
        return redirect()->back();
    }
}
