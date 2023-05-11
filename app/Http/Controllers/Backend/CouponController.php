<?php

namespace App\Http\Controllers\Backend;
use App\Models\Backend\Coupon;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CouponController extends Controller
{
    public function index(){
      $coupon = Coupon::orderby('id','DESC')->get();

      return view('Backend.coupon.index',compact('coupon'));
    }
    public function create(){
      return view('Backend.coupon.create_coupon');
    }
    public function store(Request $request){
      // $data = $request->all();
      $coupon = new Coupon();
      
      $data = [
        'name' => $request->coupon_name,
        'coupon_code' => $request->coupon_code,
        'number' => $request->coupon_number,
        'quantity' => $request->coupon_quantity
      ];
    
      $coupon = Coupon::insert($data);
     
      return redirect()->to('admin/coupon');
    }
    public function update(Request $request ,$id){
      $data = $request->all();
      $coupon = Coupon::find($id);

       $data = [
        'name' => $request->coupon_name,
        'coupon_code' => $request->coupon_code,
        'number' => $request->coupon_number,
        'quantity' => $request->coupon_quantity
      ];
      $coupon->update($data);
      
      return redirect()->to('admin/coupon');
    }

    public function edit( $id){
      
      $coupon = Coupon::find($id);
      return view('Backend.coupon.edit',compact('coupon'));
    }
    public function delete($id){
      $coupon = Coupon::find($id);
      $coupon->delete();
      return redirect()->back();
    }
}
