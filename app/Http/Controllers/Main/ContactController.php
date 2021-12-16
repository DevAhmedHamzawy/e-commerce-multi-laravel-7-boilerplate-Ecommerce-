<?php

namespace App\Http\Controllers\Main;

use App\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function store(Request $request)
    {
        Contact::create($request->all());
        return 'ok';
    }

    public function show()
    {
        return view('main.contact');
    }
}
