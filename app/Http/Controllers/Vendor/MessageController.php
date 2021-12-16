<?php

namespace App\Http\Controllers\Vendor;

use App\Http\Controllers\Controller;
use App\Message;
use App\Product;
use Yajra\DataTables\DataTables;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, Product $product)
    {
        if ($request->ajax()) {
        
            $messages = Message::where('to', auth()->user()->id ?? 1)->whereParentId(null)->with(['fromUser','product'])->get();

            return DataTables::of($messages)->addIndexColumn() 
            ->addColumn('user_name', function($row) { return $row->fromUser->name; })
            ->addColumn('action', function($row){
                $btn = '<a href="'.route("v_product_messages.show", [$row->id, 0]).'" class="delete btn btn-primary btn-sm">عرض</a>';return $btn;
            })
            ->make(true);

        }

        return view('vendor.messages.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Message::create($request->all());

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function show(Message $v_product_message)
    {
        $v_product_message = $v_product_message->with(['replies','fromUser','product'])->first();

        return view('vendor.messages.show', ['message' => $v_product_message]);
    }
}