<?php

namespace App\Http\Controllers\Backend;
use App\Models\Client\Order;
use App\Models\Client\OrderDetail;
use App\Models\Client\Shipping;
use App\Models\Backend\Feeship;
use App\Models\Backend\Product;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function huy_don_hang(Request $request){
      $data = $request->all();
     
      $order = order::where('order_code',$data['order_code'])->update([
        'oder_destroy' => $data['lydo'],
        'order_status' => 4,
       
      ]);
      // $order->order_destroy = $data['lydo'];
      // $order->order_status = 4 ;
      // $order->save();
    }
    public function update_order(Request $request){
      // update ordr
      $data = $request->all();
      $order = Order::find($data['order_id']);
      $order->order_status = $data['order_status'];
      $order->save();
      if( $order->order_status == 2){
        foreach($data['order_product_id'] as $key => $product_id){
          $product  = Product::find($product_id);
          $product_quantity  = $product->product_quantity;
          $product_sold      = $product->product_sold;
            foreach($data['quantity'] as $key2 => $qty){
              if($key == $key2){
                $product_remain = $product_quantity - $qty;
                $product->product_quantity = $product_remain;
                $product->product_sold = $product_sold + $qty;
                $product->save();
              }
            }
        }
      }elseif( $order->order_status != 2 && $order->order_status != 3){  
          foreach($data['order_product_id'] as $key => $product_id){
              $product  = Product::find($product_id);
              $product_quantity  = $product->product_quantity;
              $product_sold      = $product->product_sold;
            foreach($data['quantity'] as $key2 => $qty){
                if($key == $key2){
                    $product_remain = $product_quantity + $qty;
                    $product->product_quantity = $product_remain;
                    $product->product_sold = $product_sold - $qty;
                    $product->save();
                  }
              } 
        }
      }
    }
    public function detail($code){
    
      $order = Order::where('order_code',$code)->get();
      foreach($order as $value){
        $shipping_id = $value->shipping_id;
      }
      $shipping = Shipping::where('shipping_id',$shipping_id)->first();
      $detail = OrderDetail::with('product')->where('order_code',$code)->get();
      
      return view('Backend.order.detail',compact('detail','shipping','order'));
    }
    public function index(){
      $order = Order::orderby('order_id','DESC')->get();
      return view('Backend.order.index',compact('order'));
    }
}
