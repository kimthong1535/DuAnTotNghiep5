<?php

namespace App\Models\Client;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    public $timestamps = false;
    protected $table = 'Customer';

   public function Oder_list(){
       return $this->hasMany(Orders::class,'customer_id','id');
   }
}