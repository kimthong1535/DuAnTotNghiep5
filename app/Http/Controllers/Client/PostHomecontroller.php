<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\Models\Backend\Post;

class PostHomecontroller extends Controller
{
    public function index(){
      $post = Post::orderby('post_id','DESC')->get();
      return view('frontend.post.index',compact('post'));
    }
    public function detail($id){
      $post_detail = Post::where('post_id',$id)->first();
      
        $category_id = $post_detail->category_post_id;
      
      $releted = Post::join('tbl_category_post','tbl_post.category_post_id','=','tbl_category_post.category_post_id')->where('tbl_post.category_post_id',$category_id)->limit(6)->get();
      $category  = DB::table('tbl_category_post')->where('category_post_id',$category_id)->first();
      return view('frontend.post.detail',compact('post_detail','releted','category'));
    }
}
