<?php

namespace App\Http\Controllers\Client;
use Carbon\Carbon;
use App\Models\Client\Order;
use App\Models\Client\OrderDetail;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ManageController extends Controller
{
    public function account(){
      return view('frontend.manager.account');
    }
    public function orders(){
      $order = Order::join('tbl_order_detail','tbl_order.order_code','=','tbl_order_detail.order_code')->where('user_id',auth()->user()->id)->get();
      $dt = Carbon::now('Asia/Ho_Chi_Minh');
      return view('frontend.manager.order',compact('order','dt'));
    }
    public function addresses(){
       return view('frontend.manager.addresses');
    }
    public function order_detail($code){
       $order = Order::join('tbl_order_detail','tbl_order.order_code','=','tbl_order_detail.order_code')->where('tbl_order.order_code',$code)->where('user_id',auth()->user()->id)->join('shipping','tbl_order.shipping_id','=','shipping.shipping_id')->first();
       $dt = Carbon::now('Asia/Ho_Chi_Minh');
       $total = 0;
       $detail = OrderDetail::where('order_code',$code)->get();
      return view('frontend.manager.order_detail',compact('order','dt','detail'));
    }
    public function alear(){
      return view('frontend.manager.alear');
    }
}
