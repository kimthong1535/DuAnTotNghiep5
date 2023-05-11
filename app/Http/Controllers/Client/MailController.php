<?php

namespace App\Http\Controllers\Client;
use App\Mail\TestMail;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
class MailController extends Controller
{
    public function sendEmail(){
      $details = [
        'title' => 'email gửi đến khách hàng',
        'body' => ' email xác nhận đơn hàng'
      ];
      Mail::to("duonghoangduc170699@gmail.com")->send( new TestMail($details));
      return "Gửi Email";
    }
}
