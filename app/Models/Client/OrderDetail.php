<?php

namespace App\Models\Client;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
      public $timestamps = true;
    protected $fillable = [
        'order_code','product_sales_quantity	','product_id','product_name','product_price','product_coupo','product_feeship','product_images'
    ]; 

    protected $primaryKey = 'order_detail_id';
    protected $table = 'tbl_order_detail';
    public function product(){
      return $this->belongsTo('App\Models\Backend\Product','product_id');
    }
}
