<?php

namespace App\Http\Controllers\Backend;
use App\Models\Backend\City;
use App\Models\Backend\Province;
use App\Models\Backend\Wards;
use App\Models\Backend\Feeship;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DeliveryController extends Controller
{
    public function index(){
      $city = City::orderby('matp','ASC')->get();
      return view('Backend.delivery.index',compact('city'));
    }
    public function update_feeship(Request $request){
      $data = $request->all();
      $feeship = Feeship::find($data['id']);
      $value = rtrim($data['value'],'.');
      $feeship->fee_feeship = $value;
      $feeship->save();
    }
    public function feeship(){
      $feeship = Feeship::orderby('id','DESC')->get();
      $output = '';
      $output .= '<div class = "table-responsive">
        <table class = "table table-bordered">
        <thread>
          <tr>
              <th>Tên Tỉnh/Thành Phố</th>
              <th>Tên Quận/Huyện</th>
              <th>Tên Xã/Phường</th>
              <th>phí vận chuyển</th>
          </tr>
        </thread>
        <tbody>';
        foreach($feeship as $value){
          $output .= '
            <tr>
              <td>'.$value->city->name.'</td>
              <td>'.$value->province->name.'</td>
              <td>'.$value->wards->name.'</td>
              <td class = "edit_feeship" contenteditable  data-feeship_id ="'.$value->id.'">'.number_format($value->fee_feeship,0,',','.').'</td>
          </tr>';
        }

          $output .= '
        </tbody>
        </table>
        </div>
      ';
      echo $output;
    }
    public function insert_delivery(Request $request){
      $data = $request->all();
      $feeship = new Feeship();
      $feeship->matp = $data['city'];
      $feeship->maqh = $data['province'];
      $feeship->xaid = $data['wards'];
      $feeship->fee_feeship = $data['feeship'];
      $feeship->save();
    }
    public function select_delivery(Request $request){
      $data = $request->all();
      
      if($data['action']){
        $output =  "";
        if($data['action'] == 'city'){
          $select_province = Province::where('matp',$data['ma_id'])->orderby('maqh','ASC')->get();
          $output .= '<option>--chọn Quận huyện--</option>'; 
          foreach($select_province as $province){
            $output .= '<option value = "'.$province->maqh.'">'.$province->name.'</option>'; 
            
          }   
        }else{
          $select_wards = Wards::where('maqh',$data['ma_id'])->orderby('xaid','ASC')->get();
          $output .= '<option>--chọn xã phường--</option>'; 
          foreach($select_wards as $wards){
            $output .= '<option value = "'.$wards->xaid.'">'.$wards->name.'</option>'; 
          }
        }
      }
      echo $output;
    }
}
