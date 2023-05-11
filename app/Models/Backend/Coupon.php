<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'name','coupon_code','number','quantity'
    ]; 

    protected $primaryKey = 'id';
    protected $table = 'coupon';
}
