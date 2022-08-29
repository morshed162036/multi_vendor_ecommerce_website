<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;

class admin extends Authenticatable
{
    use HasFactory;
    protected $quard = 'admin';

    public function vendorBank(){
        return $this->belongsTo('App\Models\VendersBankDetail','vendor_id');
    }
    public function vendorPersonal(){
        return $this->belongsTo('App\Models\vendor','vendor_id');
    }
    public function vendorBusiness(){
        return $this->belongsTo('App\Models\VendersBusinessDetail','vendor_id');
    }
}
