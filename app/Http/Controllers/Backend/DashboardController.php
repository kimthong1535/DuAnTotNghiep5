<?php

namespace App\Http\Controllers\Backend;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Middleware\AuthAdmin;
use App\Models\Backend\Product;
use App\Models\Backend\Post;
use App\Models\Client\Order;
use App\Models\User;

class DashboardController extends Controller
{

    // public function __construct(){
    //     $this->middleware('authadmin');
    // }

    public function index()
    {
        $product_count = product::count();
        $order_count = order::count();
        $post_count = post::count();
        $User_count = User::count();
        $orders = order::where('order_status',0)->get();
        // dd(auth()->user());
        return view('backend.dashboard.index', compact('product_count','order_count','post_count','orders','User_count'));
        
    }
}
;