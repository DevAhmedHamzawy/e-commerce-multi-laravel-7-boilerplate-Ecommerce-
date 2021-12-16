<?php

namespace App\Http\Controllers;

use App\Area;

class AreaController extends Controller
{
    public function show(Area $area)
    {
        return Area::whereParentId($area->id)->get();
    }
}