<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Message;
use Yajra\DataTables\DataTables;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        if ($request->ajax()) {
        
            $messages = Message::whereParentId(null)->with(['fromUser','product'])->get();

            return DataTables::of($messages)->addIndexColumn() 
            ->addColumn('user_name', function($row) { return $row->fromUser->name; })
            ->addColumn('action', function($row){
                $btn = '<a href="'.route("a_product_messages.show", [$row->id, 0]).'" class="delete btn btn-primary btn-sm">عرض</a>';return $btn;
            })
            ->make(true);

        }

        return view('admin.messages.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function show(Message $a_product_message)
    {
        $a_product_message = $a_product_message->with(['replies','fromUser','product'])->first();

        return view('admin.messages.show', ['message' => $a_product_message]);
    }
   
}
