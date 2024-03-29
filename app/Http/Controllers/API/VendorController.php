<?php

namespace App\Http\Controllers\Controller\Main;

use App\Admin;
use App\Http\Resources\UserResource;
use Illuminate\Http\Request;

class VendorController extends Controller
{
    public function index()
    {
        return UserResource::collection(Admin::whereRole(1)->get());
    }
}
