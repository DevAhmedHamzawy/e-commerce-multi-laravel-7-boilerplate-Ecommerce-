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
                        {{ \App\User::whereId($reply->from)->first()->name ?? \App\Admin::whereId($reply->to)->first()->user_name }}
                    </small>
                    <p class="list-group-item-text">
                        {!! $reply->message !!}
                    </p>
                </div>

            </li>
            @endforeach
           
        </ul>
    </div>
</div>

@endsection