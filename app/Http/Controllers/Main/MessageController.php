<?php

namespace App\Http\Controllers\Controller\Main;

use App\Http\Controllers\Controller;
use App\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $messages = Message::where('from', auth()->user()->id ?? 1)->whereParentId(null)->get();
        
        //$messagesTo = Message::where('to', auth()->user()->id ?? 1)->whereParentId(null)->get();

        //$messages = collect();

        //$messages->add($messagesFrom);
        //$messages->add($messagesTo);

        return view('main.messages.index', ['messages' => $messages]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->merge(['from' => auth()->user()->id ?? 1]);

        Message::create($request->all());

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function show(Message $message)
    {
        $messages = $message->whereProductId($message->product_id)->orderBy('created_at')->get();

        return view('main.messages.show', ['messages' => $messages]);
    }

}
