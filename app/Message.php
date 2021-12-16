<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $guarded = [];

    public function product()
    {
        return $this->belongsTo('App\Product');
    }

    public function fromUser()
    {
        return $this->belongsTo('App\User', 'from');
    }

    public function replies()
    {
        return $this->hasMany('App\Message', 'parent_id');
    }
}
