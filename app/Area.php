<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    protected $guarded = [];
    public $timestamps = false;

    public function getRouteKeyName()
    {
        return 'name';
    }

    public static function getMainAreas()
    {
        return self::whereParentId(1)->get();
    }

    public static function getChildrenAreas($id)
    {
        return self::whereParentId($id)->get();
    }

    
}
