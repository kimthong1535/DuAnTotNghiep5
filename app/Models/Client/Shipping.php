<?php

namespace App\Models\Client;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shipping extends Model
{
    public $timestamps = true;
    protected $fillable = [
        'fullname','phone','email','address','note','payment'
    ]; 

    protected $primaryKey = 'shipping_id';
    protected $table = 'shipping';

}
