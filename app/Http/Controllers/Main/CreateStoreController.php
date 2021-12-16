<?php

namespace App\Http\Controllers\Main;

use App\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Validator;

class CreateStoreController extends Controller
{
    public function show()
    {
        return view('main.vendors.create');
    }

    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'regex:/^[A-Za-z0-9_@.]+$/','email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->with(['message' => 'من فضلك قم بمراجعة تلك الأخطاء', 'alert' => 'alert-danger']);
        }

        $admin = Admin::create([
            'role' => 1,
            'verified' => 0,
            'user_name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        $details = [
            'title' => 'منصة مزارعنا',
            'body' => 'من فضلك قم بتأكيد البريد الإلكترونى',
            'link' => URL::route('verify_store', $admin->id), 
        ];

        Mail::to($admin->email)->send(new \App\Mail\VendorVerification($details));

        return view('main.thanks')->withAdmin($admin);
    }
}
