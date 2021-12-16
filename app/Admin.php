<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    protected $guarded = [];

    protected $casts =  ['training' => 'array', 'services' => 'array', 'transporting' => 'array'];

    protected $with = ['vendorStoreCategories'];

    public function getRouteKeyName()
    {
        return 'user_name';
    }

    public function getImgPathAttribute()
    {
        //return url('../storage/app/public/main/admins/'. $this->img);
        return $this->img == 'profile-45x45.png' ? asset('main/img/header-01.png') : asset('storage/main/admins/'. $this->img);
    }


    public function products()
    {
        return $this->hasMany(Product::class, 'user_id');
    }

    public function orders()
    {
        return $this->hasMany(Order::class, 'vendor_id');
    }

    public function theServices()
    {
        return $this->hasMany(Service::class, 'vendor_id');
    }

    public function ratings()
    {
        return $this->hasMany(Rating::class);
    }

    public function vendorStoreCategories()
    {
        return $this->hasMany(VendorStoreCategory::class);
    }

    /*public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = bcrypt($value);
    }*/
} 