<?php

namespace App\Models\Client;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;
    protected $table = 'cart';
    protected $fillable = [
      'product_id','user_id','name','images','price','quantity','status','_token'
    ];
    protected $primaryKey = 'id';
}
