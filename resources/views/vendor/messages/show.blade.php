@extends('admin.layouts.app')

@section('content')


{{--@foreach ($message->replies as $message)
    <p>{{ $message->message }}</p>
@endforeach--}}


<div style="padding: 20px 20% 0 20%;">
    <div class="chat_list">
        <ul class="list-group">
         
            <li class="list-group-item">
                <div class="pull-left hidden-xs">
                    <div>
                        <img class="img-circle" title="User1" alt="User1" data-src="holder.js/40x40/lava">                    
                    </div>
                </div>
                <small class="pull-right text-muted">{{ $message->created_at}}</small>
                <br>
                <div>
                    <small class="list-group-item-heading text-muted text-primary">{{ $message->fromUser->name }}</small>
                    <p class="list-group-item-text">
                       {!! $message->message !!}
                    </p>
                </div>
            </li>
         
         
            
            @foreach ($message->replies as $reply)
            <li class="list-group-item">
                <div class="pull-left hidden-xs">
                    <div>
                        <img class="img-circle" title="You" alt="You" data-src="holder.js/40x40/industrial">                    
                    </div>
                </div>
                <small class="pull-right text-muted">{{ $reply->created_at }}</small>
                <div>
                    <br>
                    <small class="list-group-item-heading text-muted">
                        {{ $reply->from != auth()->user()->id ? \App\User::whereId($reply->from)->first()->name ?? 'غير معرف' :  \App\Admin::whereId($reply->to)->first()->user_name ?? 'غير معرف' }}
                    </small>
                    <p class="list-group-item-text">
                        {!! $reply->message !!}
                    </p>
                </div>

            </li>
            @endforeach
           
            <li class="list-group-item">

            
                <form class="form-group" method="post" action="{{ route('v_product_messages.store') }}">
                    @csrf
                    <input type="hidden" name="parent_id" value="{{ $message->id }}">
                    <input type="hidden" name="from" value="{{ $message->to }}">
                    <input type="hidden" name="to" value="{{ $message->from }}">
                    <input type="hidden" name="product_id" value="{{ $message->product_id }}">
                    <textarea name="message" class="form-control" cols="30" rows="10" placeholder="محتوى الرسالة"></textarea>
                    <br>
                    <button type="submit" class="btn btn-primary col-md-12">إرسال</button>
                </form>


            </li>
          
        </ul>
    </div>
</div>

@endsection